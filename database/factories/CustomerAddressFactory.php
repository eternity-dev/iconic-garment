<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CustomerAddress>
 */
class CustomerAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $provinces = collect([
            'Badung',
            'Denpasar',
            'Gianyar',
            'Klungkung',
            'Karangasem',
            'Jembrana',
            'Buleleng',
            'Bangli',
            'Tabanan'
        ]);

        return [
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'province' => $provinces->random(),
            'country' => $this->faker->country(),
            'zip' => '123123'
        ];
    }
}
