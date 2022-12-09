<?php

namespace Database\Seeders;

use App\Models\Clothes;
use App\Models\Food;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)
            ->has(Seller::factory()->has(Product::factory()
                ->has(Rating::factory()
                    ->count(10))
                ->has(Food::factory())
                ->has(Clothes::factory())
                ->count(5)))
            ->create();
    }
}
