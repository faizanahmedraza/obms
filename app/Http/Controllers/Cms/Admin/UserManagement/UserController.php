<?php

namespace App\Http\Controllers\Cms\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Wrappers\CloudinaryService;
use App\Jobs\SendUserAccountVerificationEmailJob;
use App\Mail\Verification;
use App\Models\Customer;
use App\Models\User;
use App\Models\Vendor;
use App\Models\VendorService;
use App\Models\Venue;
use App\Models\VenueService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    private $module;

    public function __construct()
    {
        $this->module = 'user_management';
        $ULP = '|' . $this->module . '_all|access_all'; //UPPER LEVEL PERMISSIONS
        $this->middleware('permission:' . $this->module . '_read' . $ULP, ['only' => ['adminUsers', 'vendorUsers', 'venueUsers', 'customers', 'show']]);
        $this->middleware('permission:' . $this->module . '_create' . $ULP, ['only' => ['create', 'store']]);
        $this->middleware('permission:' . $this->module . '_update' . $ULP, ['only' => ['edit', 'update']]);
        $this->middleware('permission:' . $this->module . '_delete' . $ULP, ['only' => ['destroy']]);
        $this->middleware('permission:' . $this->module . '_blocked' . $ULP, ['only' => ['blocked']]);
    }

    public function adminUsers()
    {
        $users = User::with('roles')->whereHas('roles', function ($q) {
            $q->whereIn('name', ['Super Admin', 'Admin']);
        })->latest()->get();
        $pageTitle = "Administrator Users";
        return view('cms.admin.user-management.users.index', compact('users', 'pageTitle'));
    }

    public function vendorUsers()
    {
        $users = User::with('roles')->whereHas('roles', function ($q) {
            $q->where('name', 'Vendor');
        })->latest()->get();
        $pageTitle = "Vendor Users";
        return view('cms.admin.user-management.users.index', compact('users', 'pageTitle'));
    }

    public function venueUsers()
    {
        $users = User::with('roles')->whereHas('roles', function ($q) {
            $q->where('name', 'Venue');
        })->latest()->get();
        $pageTitle = "Venue Users";
        return view('cms.admin.user-management.users.index', compact('users', 'pageTitle'));
    }

    public function customers()
    {
        $users = User::with('roles')->whereHas('roles', function ($q) {
            $q->where('name', 'Customer');
        })->latest()->get();
        $pageTitle = "Customers";
        return view('cms.admin.user-management.users.index', compact('users', 'pageTitle'));
    }

    public function create()
    {
        $roles = Role::where('name', '!=', 'Super Admin')->get();
        $vendors = Vendor::VENDOR_TYPES;
        $venues = Venue::VENUE_TYPES;
        if (oldUrlAccessMatch('venue', 2) == "venue") {
            $pageTitle = "Create New Venue User";
        } elseif (oldUrlAccessMatch('vendor', 2) == "vendor") {
            $pageTitle = "Create New Vendor User";
        } else {
            $pageTitle = "Create New Administrator User";
        }
        return view('cms.admin.user-management.users.create', compact('roles', 'venues', 'vendors', 'pageTitle'));
    }

    public function store(Request $request)
    {
        $rules = [
            'first_name' => 'required|max:55',
            'last_name' => 'required|max:55',
            'avatar' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|dimensions:min_width=50,min_height=60|max:100000', //max:1MB
            'email' => ['required', 'max:255', 'unique:users,email'],
            'gender' => 'sometimes|nullable|in:male,female,other|max:10',
            'dob' => 'sometimes|nullable|date',
            'role' => 'required|in:' . implode(',', Role::pluck('id')->toArray()),
            'service_name' => 'nullable|required_if:role,Vendor|string|max:150',
            'service_type' => 'nullable|required_if:role,Vendor|in:' . implode(',', Vendor::VENDOR_TYPES),
            'venue_name' => 'nullable|required_if:role,Venue|string|max:150',
            'venue_type' => 'nullable|required_if:role,Venue|in:' . implode(',', Venue::VENUE_TYPES),
        ];

        $messages = [
            'service_name.required_if' => 'The service name field is required when role is vendor.',
            'service_type.required_if' => 'The service type field is required when role is vendor.',
            'venue_name.required_if' => 'The service name field is required when role is vendor.',
            'venue_type.required_if' => 'The service type field is required when role is vendor.',
        ];

        $userData = [];

        $validator = Validator::make(request()->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        if (!empty($request->file('avatar'))) {
            $userData['avatar'] = CloudinaryService::upload($request->file('avatar')->getRealPath())->secureUrl;;
        }

        $userData['name'] = $request->first_name . ' ' . $request->last_name;
        $userData['email'] = request()->email;
        $userData['dob'] = request()->dob;
        $userData['gender'] = trim(request()->gender);
        $userData['password'] = Str::random('30');
        $userData['verification_token'] = Str::random('50');

        $user = User::create($userData);

        $role = Role::where('id', (int)$request->role)->first();

        if ($role->name === 'Vendor') {
            $user->assignRole('Vendor');
            $vendor = $user->vendor()->create([]);
            VendorService::create(['vendor_id' => $vendor->user_id, 'service_name' => $request->service_name, 'service_type' => $request->service_type, 'slug' => Str::slug($request->service_name)]);
            $route = 'admin.vendor.users';
        } else if ($role->name === 'Customer') {
            $user->assignRole('Customer');
            $user->customer()->create([]);
            $route = 'admin.customers';
        } else if ($role->name === 'Venue') {
            $user->assignRole('Venue');
            $venue = $user->venue()->create([]);
            VenueService::create(['venue_id' => $venue->user_id, 'venue_name' => $request->venue_name, 'venue_type' => $request->venue_type, 'slug' => Str::slug($request->venue_name)]);
            $route = 'admin.venue.users';
        } else {
            $user->assignRole($request->role);
            $route = 'admin.users';
        }

        $tryError = '';
        try {
            $emailData = new \stdClass();
            if (in_array($role->name, ['Vendor', 'Customer', 'Venue'])) {
                $emailData->verification_link = config('app.url') . "/verification/" . $user->verification_token;
            } else {
                $emailData->verification_link = config('app.url') . "/admin/verification/" . $user->verification_token;
            }
            Mail::to($user->email)->send(new Verification($emailData));
        } catch (\Exception $e) {
            $tryError = ' but ' . $e->getMessage();
        }
        DB::commit();
        return redirect()->route($route)->with('success', 'User successfully added.' . $tryError);
    }

    public function show($id)
    {
        $user = User::with(['roles', 'vendor', 'customer', 'venue'])->findOrFail($id);
        if (oldUrlAccessMatch('venue', 2) == "venue") {
            $pageTitle = "Details Venue User";
        } elseif (oldUrlAccessMatch('vendor', 2) == "vendor") {
            $pageTitle = "Details Vendor User";
        } else {
            $pageTitle = "Details Administrator User";
        }
        return view('cms.admin.user-management.users.show', compact('user', 'pageTitle'));
    }

    public function edit($id)
    {
        $user = User::where('id', '!=', Auth::id())->with(['roles', 'vendor', 'customer', 'venue'])->findOrFail($id);
        $vendors = Vendor::VENDOR_TYPES;
        $venues = Venue::VENUE_TYPES;
        $roles = Role::where('name', '!=', 'Super Admin')->get();
        if (oldUrlAccessMatch('venue', 2) == "venue") {
            $pageTitle = "Update Venue User";
        } elseif (oldUrlAccessMatch('vendor', 2) == "vendor") {
            $pageTitle = "Update Vendor User";
        } else {
            $pageTitle = "Update Administrator User";
        }
        return view('cms.admin.user-management.users.edit', compact('user', 'roles', 'vendors', 'venues', 'pageTitle'));
    }

    public function update($id, Request $request)
    {
        $user = User::where('id', '!=', Auth::id())->with(['roles', 'vendor', 'customer', 'venue'])->findOrFail($id);
        $rules = [
            'name' => 'required|max:55',
            'avatar' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|dimensions:min_width=50,min_height=60|max:100000', //max:1MB
            'email' => ['required', 'max:255', 'unique:users,email,' . $user->id],
            'gender' => 'sometimes|nullable|in:male,female|max:10',
            'dob' => 'sometimes|nullable|date',
            'role' => 'required|in:' . implode(',', Role::pluck('id')->toArray()),
            'service_name' => 'nullable|required_if:role,Vendor|string|max:150',
            'service_type' => 'nullable|required_if:role,Vendor|in:' . implode(',', Vendor::VENDOR_TYPES),
            'venue_name' => 'nullable|required_if:role,Venue|string|max:150',
            'venue_type' => 'nullable|required_if:role,Venue|in:' . implode(',', Venue::VENUE_TYPES),
        ];

        $messages = [
            'service_name.required_if' => 'The service name field is required when role is vendor.',
            'service_type.required_if' => 'The service type field is required when role is vendor.',
            'venue_name.required_if' => 'The service name field is required when role is vendor.',
            'venue_type.required_if' => 'The service type field is required when role is vendor.',
        ];

        $userData = [];

        $validator = Validator::make(request()->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (!empty(request()->avatar)) {
            $file = request()->file('avatar');
            $ext = $file->getclientoriginalextension();
            $userData['avatar'] = $file->storeAs('avatars', 'avatar-' . now()->timestamp . '.' . $ext);
        }
        $userData['name'] = $request->name;
        $userData['email'] = request()->email;
        $userData['dob'] = request()->dob;
        $userData['gender'] = trim(request()->gender);

        $role = Role::where('id', (int)$request->role)->firstOrFail();

        if ($user->roles->first()->name === 'Vendor') {
            $vendor = Vendor::where('user_id', $user->id)->first();
            $vendor->delete();
        } else if ($user->roles->first()->name === 'Customer') {
            $customer = Customer::where('user_id', $user->id)->first();
            $customer->delete();
        } else if ($user->roles->first()->name === 'Venue') {
            $venue = Venue::where('user_id', $user->id)->first();
            $venue->delete();
        }

        $user->update($userData);


        if ($role->name === 'Vendor') {
            $user->assignRole('Vendor');
            $vendor = $user->vendor()->create([]);
            VendorService::create(['vendor_id' => $vendor->user_id, 'service_name' => $request->service_name, 'service_type' => $request->service_type, 'slug' => Str::slug($request->service_name)]);
            $route = 'admin.vendor.users';
        } else if ($role->name === 'Customer') {
            $user->assignRole('Customer');
            $user->customer()->create([]);
            $route = 'admin.customers';
        } else if ($role->name === 'Venue') {
            $user->assignRole('Venue');
            $venue = $user->venue()->create([]);
            VenueService::create(['venue_id' => $venue->user_id, 'venue_name' => $request->venue_name, 'venue_type' => $request->venue_type, 'slug' => Str::slug($request->venue_name)]);
            $route = 'admin.venue.users';
        } else {
            $user->syncRoles($request->role);
            $route = 'admin.users';
        }

        return redirect()->route($route)->with('success', 'User successfully updated.');
    }

    public function destroy($id)
    {
        $msg = "Successfully Deleted.";
        $code = 200;
        $user = User::where('id', '!=', Auth::id())->where('id', $id)->first();
        if (empty($user)) {
            $msg = "User not found!";
            $code = 404;
        }
        $user->delete();
        return response()->json(['msg' => $msg], $code);
    }

    public function blocked(User $user)
    {
        $msg = 'Something went wrong.';
        $code = 400;
        $user = User::find($user->id);

        if (!empty($user)) {
            $msgText = $user->blocked_until ? "unblocked" : "blocked";
            $user->update(['blocked_until' => $user->blocked_until ? null : now()->toDateTimeString()]);
            $msg = "User successfully {$msgText}!";
            $code = 200;
        }

        return response()->json(['msg' => $msg], $code);
    }
}
