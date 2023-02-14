<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Makanan Olahan',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Makanan Instant',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Pakaian Wanita',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Pakaian Pria',
            ),
        ));
        
        
    }
}