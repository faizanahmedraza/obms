<?php

namespace Database\Factories;

use App\Models\Vendor;
use App\Models\VendorService;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendorServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vendor_id' => 1,
            'service_type' => $this->faker->randomElement(Vendor::VENDOR_TYPES),
            'service_name' => $this->faker->unique()->name(),
            'slug' => $this->faker->slug(),
        ];
    }
}
