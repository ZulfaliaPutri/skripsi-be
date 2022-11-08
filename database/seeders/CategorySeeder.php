<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
    }
}
