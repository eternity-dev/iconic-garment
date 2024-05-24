<?php

namespace Database\Factories;

use App\Models\Garment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $garments = Garment::all();

        return [
            'garment_id' => $garments->random()->id,
            'name' => $this->faker->safeColorName(),
            'description' => implode('\n', $this->faker->paragraphs()),
            'price' => $this->faker->numberBetween(100000, 1000000)
        ];
    }
}
