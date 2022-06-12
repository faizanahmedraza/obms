<?php

namespace Database\Seeders;

use App\Models\VenueService;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::updateOrCreate(['name' => 'Venue', 'guard_name' => 'web']);

        $users = \App\Models\User::factory(5)->create();

        foreach ($users as $user) {
            $user->assignRole('Venue');
            $venue = $user->venue()->create([]);
            VenueService::factory()->create([
                'venue_id' => $venue->user_id
            ]);
        }
    }
}
