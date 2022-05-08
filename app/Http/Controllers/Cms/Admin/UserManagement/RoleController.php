<?php

namespace App\Http\Controllers\Cms\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\PermissionHeader;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    private $module;

    public function __construct()
    {
        $this->module = 'roles';
        $ULP = '|' . $this->module . '_all|access_all'; //UPPER LEVEL PERMISSIONS
        $this->middleware('permission:' . $this->module . '_read' . $ULP, ['only' => ['index', 'show']]);
        $this->middleware('permission:' . $this->module . '_create' . $ULP, ['only' => ['create','store']]);
        $this->middleware('permission:' . $this->module . '_update' . $ULP, ['only' => ['edit','update']]);
        $this->middleware('permission:' . $this->module . '_delete' . $ULP, ['only' => ['destroy']]);
    }

    public function index()
    {
        $roles = Role::orderBy('name', 'asc')->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required|unique:roles,name',
            'permissions' => 'required',
            'permissions.*' => 'required|in:' . implode(',', Permission::pluck('id')->toArray())
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $role = Role::create(['name' => request()->name]);
        $role->syncPermissions(request()->permissions);

        return redirect()->route('admin.roles.index')->with('success', 'Role successfully added.');
    }

    public function edit(Role $role)
    {
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $role->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('admin.roles.edit', compact('role', 'rolePermissions'));
    }

    public function update(Role $role)
    {
        abort_if(in_array($role->name, User::PRIVATE_ROLES), 403, 'You are not allowed to update this role.');

        $validator = Validator::make(request()->all(), [
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'required',
            'permissions.*' => 'required|in:' . implode(',', Permission::pluck('id')->toArray())
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $role->update(['name' => request()->name]);

        $role->syncPermissions(request()->permissions);

        return redirect()->route('admin.roles.index')->with('success', 'Role successfully updated.');
    }

    public function show(Role $role)
    {
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $role->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('admin.roles.show', compact('role', 'rolePermissions'));
    }

    public function destroy(Role $role)
    {
        abort_if(in_array($role->name, User::PRIVATE_ROLES), 403, 'You are not allowed to delete this role.');

        DB::table("role_has_permissions")->where('role_id', $role->id)->delete();
        DB::table("roles")->where('id', $role->id)->delete();
        return back()->with(['message' => 'Role successfully deleted.']);
    }
}
