<?php

namespace App\Http\Controllers\Cms\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Wrappers\CloudinaryService;
use App\Jobs\SendUserAccountVerificationEmailJob;
use App\Mail\Verification;
use App\Models\User;
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
        $users = User::where('id', '!=', Auth::id())->with('roles')->whereHas('roles', function ($q) {
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
        if (oldUrlAccessMatch('venue', 2) == "venue") {
            $pageTitle = "Create New Venue User";
        } elseif (oldUrlAccessMatch('vendor', 2) == "vendor") {
            $pageTitle = "Create New Vendor User";
        } else {
            $pageTitle = "Create New Administrator User";
        }
        return view('cms.admin.user-management.users.create', compact('roles','pageTitle'));
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
        ];

        $userData = [];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        if (!empty($request->file('avatar'))) {
//            $file = request()->file('avatar');
//            $ext = $file->getclientoriginalextension();
//            $userData['avatar'] = $file->storeAs('avatars', 'avatar-' . now()->timestamp . '.' . $ext);
            $userData['avatar'] = CloudinaryService::upload($request->file('avatar')->getRealPath())->secureUrl;
            ;
        }

        $userData['name'] = $request->first_name . ' ' . $request->last_name;
        $userData['email'] = request()->email;
        $userData['dob'] = request()->dob;
        $userData['gender'] = request()->gender;
        $userData['password'] = Str::random('30');
        $userData['verification_token'] = Str::random('50');

        $user = User::create($userData);
        $user->assignRole(request()->roles);

        $tryError = '';
        try {
            $emailData = new \stdClass();
            $emailData->verification_link = config('app.url')."/verification/".$user->verification_token;
            Mail::to($user->email)->send(new Verification($emailData));
        } catch (\Exception $e) {
            $tryError = ' but ' . $e->getMessage();
        }
        DB::commit();
        return redirect()->route('admin.users')->with('success', 'User successfully added.' . $tryError);
    }

    public function show(User $user)
    {
        $user = User::where('id', '!=', Auth::id())->with('roles')->findOrFail($user->id);
        if (oldUrlAccessMatch('venue', 2) == "venue") {
            $pageTitle = "Create New Venue User";
        } elseif (oldUrlAccessMatch('vendor', 2) == "vendor") {
            $pageTitle = "Create New Vendor User";
        } else {
            $pageTitle = "Create New Administrator User";
        }
        return view('admin.users.show', compact('user','pageTitle'));
    }

    public function edit(User $user)
    {
        $user = User::where('id', '!=', Auth::id())->with('roles')->findOrFail($user->id);
        $roles = Role::where('name', '!=', 'Super Admin')->get();
        if (oldUrlAccessMatch('venue', 2) == "venue") {
            $pageTitle = "Create New Venue User";
        } elseif (oldUrlAccessMatch('vendor', 2) == "vendor") {
            $pageTitle = "Create New Vendor User";
        } else {
            $pageTitle = "Create New Administrator User";
        }
        return view('admin.users.edit', compact('user', 'roles','pageTitle'));
    }

    public function update(User $user)
    {
        $rules = [
            'first_name' => 'required|max:55',
            'last_name' => 'required|max:55',
            'username' => 'required|alpha_num|max:255|unique:users,username,' . $user->id,
            'avatar' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|dimensions:min_width=50,min_height=60|max:100000', //max:1MB
            'email' => ['required', 'max:255', 'unique:users,email,' . $user->id],
            'gender' => 'sometimes|nullable|in:male,female,other|max:10',
            'dob' => 'sometimes|nullable|date',
            'roles' => 'required',
            'roles.*' => 'required|in:' . implode(',', Role::pluck('id')->toArray())
        ];

        $userData = [];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (in_array('Super Admin', request()->roles)) {
            return redirect()
                ->back()
                ->withErrors(['errors' => 'Super Admin role is not allowed.'])
                ->withInput();
        }

        if (!empty(request()->avatar)) {
            $file = request()->file('avatar');
            $ext = $file->getclientoriginalextension();
            $userData['avatar'] = $file->storeAs('avatars', 'avatar-' . now()->timestamp . '.' . $ext);
        }

        $userData['first_name'] = request()->first_name;
        $userData['last_name'] = request()->last_name;
        $userData['username'] = request()->username;
        $userData['email'] = request()->email;
        $userData['dob'] = request()->dob;
        $userData['gender'] = request()->gender;

        $user->update($userData);
        $user->syncRoles(request()->roles);

        return redirect()->route('admin.users.index')->with('success', 'User successfully updated.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['msg' => 'Successfully Delete.']);
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
