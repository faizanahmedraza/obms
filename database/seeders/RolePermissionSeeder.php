<?php

namespace Database\Seeders;

use App\Models\PermissionHeader;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        DB::beginTransaction();

        $arrayOfPermissionHeaderNames = array_values(config('obms.permission_headers'));

        $permissionHeaders = collect($arrayOfPermissionHeaderNames)->map(function ($header) {
            return ['name' => $header, 'created_at' => Carbon::now()->toDateTimeString()];
        });

        if (!is_null(PermissionHeader::first())) {
            PermissionHeader::truncate();
        }

        PermissionHeader::insert($permissionHeaders->toArray());

        $arrayOfPermissionNames = array_merge(config('obms.admin_permissions'), config('obms.vendor_permissions'), config('obms.venue_permissions'),config('obms.common_permissions'));

        $headerId = 1;
        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) use ($headerId) {
            $headers = PermissionHeader::get();
            foreach ($headers as $val) {
                if (str_contains($permission,explode('_all',$val->name)[0])) {
                    $headerId = $val->id;
                    break;
                }
            }
            return ['name' => $permission, 'guard_name' => 'web', 'created_at' => Carbon::now()->toDateTimeString(), 'header_id' => $headerId];
        });

        if (!is_null(Permission::first())) {
            Permission::truncate();
        }

        Permission::insert($permissions->toArray());

        $adminRole = Role::firstOrCreate(['name' => config('obms.private_roles')[1]]);
        $adminRole->syncPermissions($arrayOfPermissionNames);

        $vendorRole = Role::firstOrCreate(['name' => config('obms.private_roles')[2]]);
        $vendorRole->syncPermissions(array_merge(config('obms.vendor_permissions'),config('obms.common_permissions')));

        $venueRole = Role::firstOrCreate(['name' => config('obms.private_roles')[3]]);
        $venueRole->syncPermissions(array_merge(config('obms.venue_permissions'),config('obms.common_permissions')));

        $customerRole = Role::firstOrCreate(['name' => config('obms.private_roles')[4]]);
        $customerRole->syncPermissions(config('obms.common_permissions'));

        DB::commit();
    }
}
