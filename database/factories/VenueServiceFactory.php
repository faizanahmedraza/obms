<?php

namespace Database\Factories;

use App\Models\Venue;
use Illuminate\Database\Eloquent\Factories\Factory;

class VenueServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'venue_id' => 1,
            'venue_type' => $this->faker->randomElement(Venue::VENUE_TYPES),
            'venue_name' => $this->faker->unique()->name(),
            'slug' => $this->faker->slug(),
        ];
    }
}
