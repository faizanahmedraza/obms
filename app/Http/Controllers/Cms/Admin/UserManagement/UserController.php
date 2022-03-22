<?php

namespace App\Http\Controllers\Cms\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Jobs\SendUserAccountVerificationEmailJob;
use App\Models\User;
use App\Rules\EmailFormat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:admin.users.index|admin.users.create|admin.users.edit|admin.users.show|admin.users.destroy|admin.users.blocked', ['only' => ['index']]);
        $this->middleware('permission:admin.users.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:admin.users.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:admin.users.show', ['only' => ['show']]);
        $this->middleware('permission:admin.users.destroy', ['only' => ['destroy']]);
        $this->middleware('permission:admin.users.blocked', ['only' => ['blocked']]);
    }

    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->with('roles')->whereHas('roles', function ($query) {
            $query->where('name', '!=', 'super-admin');
        })->latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::where('name', '!=', 'Super Admin')->get();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $rules = [
            'first_name' => 'required|max:55',
            'last_name' => 'required|max:55',
            'username' => 'required|alpha_num|max:255|unique:users',
            'avatar' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|dimensions:min_width=50,min_height=60|max:100000', //max:1MB
            'email' => ['required', 'max:255', 'unique:users', new EmailFormat()],
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
        $userData['name'] = $request->first_name.' '.$request->last_name;
        $userData['username'] = request()->username;
        $userData['email'] = request()->email;
        $userData['dob'] = request()->dob;
        $userData['gender'] = request()->gender;
        $userData['password'] = Str::random('30');
        $userData['verification_token'] = Str::random('50');
        $userData['profile_link'] = Str::slug(request()->first_name . request()->last_name . '00' . Str::random(10));

        $user = User::create($userData);
        $user->assignRole(request()->roles);

        $tryError = '';
        try {
            SendUserAccountVerificationEmailJob::dispatch($user, env('APP_URL') . '/admin/verification/' . $user->verification_token);
        } catch (\Exception $e) {
            $tryError = ' but ' . $e->getMessage();
        }

        return redirect()->route('admin.users.index')->with('success', 'User successfully added.'.$tryError);
    }

    public function show(User $user)
    {
        $user = User::with('roles')->findOrFail($user->id);
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $user = User::with('roles')->findOrFail($user->id);
        $roles = Role::where('name', '!=', 'Super Admin')->get();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(User $user)
    {
        $rules = [
            'first_name' => 'required|max:55',
            'last_name' => 'required|max:55',
            'username' => 'required|alpha_num|max:255|unique:users,username,' . $user->id,
            'avatar' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|dimensions:min_width=50,min_height=60|max:100000', //max:1MB
            'email' => ['required', 'max:255', 'unique:users,email,' . $user->id, new EmailFormat()],
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
            $user->update(['blocked_until' => $user->blocked_until ? null : now()->toDateTimeString() ]);
            $msg = "User successfully {$msgText}!";
            $code = 200;
        }

        return response()->json(['msg' => $msg], $code);
    }
}
