<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaseSeeder extends Seeder
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
    }
}
