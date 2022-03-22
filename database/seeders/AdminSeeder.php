<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use mysql_xdevapi\Exception;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::updateOrCreate(['name' => 'Super Admin', 'guard_name' => 'web']);
        Role::updateOrCreate(['name' => 'Admin', 'guard_name' => 'web']);

        $faizan = User::create([
            'name' => 'Faizan Ahmed Raza',
            'email' => 'faizan@admin.com',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now()->toDateTimeString(),
            'remember_token' => Str::random(60)
        ]);

        $hur = User::create([
            'name' => 'Syed Hur Abbas',
            'email' => 'hur@admin.com',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now()->toDateTimeString(),
            'remember_token' => Str::random(60)
        ]);

        $wajiha = User::create([
            'name' => 'Wajiha Zahid',
            'email' => 'wajiha@admin.com',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now()->toDateTimeString(),
            'remember_token' => Str::random(60)
        ]);

        $faizan->assignRole('Super Admin');
        $hur->assignRole('Admin');
        $wajiha->assignRole('Admin');
    }
}
