<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Rating;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create user
        $user = User::create([
            'name' => 'Andre',
            'email' => 'Andresuryana17@gmail.com',
            'password' => 'hashed-password',
            'phone' => '0812308109230912',
            'address' => 'Surga'
        ]);

        // Create seller
        $seller = Seller::create([
            'user_id' => $user->id,
            'store_name' => 'MiStore'
        ]);

        // Products
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'seller_id' => $seller->id,
                'name' => "Product $i",
                'description' => "Product $i description",
                'price' => random_int(10000, 50000),
                'view_count' => random_int(10, 100),
                'category_id' => random_int(1, 4)
            ]);
        }

        // Ratings
        for ($i = 1; $i <= 20; $i++) {
            Rating::create([
                'product_id' => random_int(1, 5),
                'user_id' => random_int(1, 6),
                'rating' => random_int(1, 5)
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => "User $i",
                'email' => "User$i@gmail.com",
                'password' => 'hashed-password',
                'phone' => '0812308109230912',
                'address' => 'Surga'
            ]);
        }
    }
}
