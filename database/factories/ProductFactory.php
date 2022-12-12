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
            "category_id" => fake()->numberBetween(1, 4),
            "image_path" => fake()->randomElement([
                "https://upload.wikimedia.org/wikipedia/commons/0/08/Babi_guling.jpg",
                "https://images.tokopedia.net/img/cache/700/VqbcmM/2021/1/20/92a276f2-2509-4699-8072-35b1ffcb4a90.jpg",
                "https://awsimages.detik.net.id/community/media/visual/2020/12/19/5-babi-guling-enak-di-bali-banyak-penggemarnya_169.png?w=1200",
                "https://googleberita.com/wp-content/uploads/2022/06/Babi-Guling-Candra.jpg"
            ]),
            "created_at" => time(),
            "updated_at" => time(),
        ];
    }
}
