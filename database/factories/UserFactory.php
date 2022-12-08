<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => fake()->name(),
            "email" => fake()->unique()->email(),
            "password" => fake()->password(),
            "phone" => fake()->phoneNumber(),
            "age" => fake()->numberBetween(18, 80),
            "gender" => fake()->numberBetween(0, 1),
            "address" => fake()->address(),
            "role_id" => Role::factory(),
            "created_at" => time(),
            "updated_at" => time(),
        ];
    }
}
