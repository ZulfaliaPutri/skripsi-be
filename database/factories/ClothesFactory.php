<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clothes>
 */
class ClothesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "material" => fake()->randomElement(['kasa', 'sutra', 'cotton', 'barang kawe']),
            "size" => fake()->randomElement(["S", "M", "L", "XL", "XXL"]),
            "sleeve_type" => fake()->text(10)
        ];
    }
}
