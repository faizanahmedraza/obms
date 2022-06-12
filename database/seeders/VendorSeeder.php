<?php

namespace Database\Seeders;

use App\Models\VendorService;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::updateOrCreate(['name' => 'Vendor', 'guard_name' => 'web']);

        $users = \App\Models\User::factory(5)->create();

        foreach ($users as $user) {
            $user->assignRole('Vendor');
            $vendor = $user->vendor()->create([]);
            VendorService::factory()->create([
                'vendor_id' => $vendor->user_id
            ]);
        }
    }
}
