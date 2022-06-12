<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::updateOrCreate(['name' => 'Customer', 'guard_name' => 'web']);

        $users = \App\Models\User::factory(5)->create();

        foreach ($users as $user) {
            $user->assignRole('Customer');
            $user->customer()->create([]);
        }
    }
}
