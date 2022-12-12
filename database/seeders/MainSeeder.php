<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Clothes;
use App\Models\Food;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Role;
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
        Category::insert([
            ['id' => 1, 'name' => 'Makanan Olahan'],
            ['id' => 2, 'name' => 'Makanan Instant'],
            ['id' => 3, 'name' => 'Pakaian Wanita'],
            ['id' => 4, 'name' => 'Pakaian Pria'],
        ]);

        Role::insert([
            ['id' => 1, 'name' => 'User'],
            ['id' => 2, 'name' => 'Seller'],
            ['id' => 3, 'name' => 'Admin'],
        ]);

        User::factory(5)
            ->has(Seller::factory()->count(1)->has(Product::factory()
                ->has(Rating::factory()
                    ->count(10))
                ->has(Food::factory()->count(1))
                ->count(5)))
            ->create();

        User::factory(5)
            ->has(Seller::factory()->count(1)->has(Product::factory()
                ->has(Rating::factory()
                    ->count(10))
                ->has(Clothes::factory()->count(1))
                ->count(5)))
            ->create();
    }
}
