<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
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
    public function definition()
    {
        return [
            "seller_id" => User::factory(),
            "name" => fake()->text(20),
            "description" => fake()->text(),
            "price" => fake()->numberBetween(10000, 100000),
            "quantity" => fake()->numberBetween(0, 100),
            "view_count" => fake()->numberBetween(0, 100000),
            "category_id" => Category::factory(),
            "image_path" => "",
            "created_at" => time(),
            "updated_at" => time(),
        ];
    }
}
