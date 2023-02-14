<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClothesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('clothes')->delete();
        
        \DB::table('clothes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'material' => 'Katun',
                'size' => 'M',
                'sleeve_type' => 'Pendek',
                'product_id' => 11,
            ),
            1 => 
            array (
                'id' => 2,
                'material' => 'Katun',
                'size' => 'XL',
                'sleeve_type' => 'Pendek',
                'product_id' => 12,
            ),
            2 => 
            array (
                'id' => 3,
                'material' => 'Polyester',
                'size' => 'M',
                'sleeve_type' => 'Panjang',
                'product_id' => 13,
            ),
            3 => 
            array (
                'id' => 4,
                'material' => 'Freelance',
                'size' => 'XL',
                'sleeve_type' => 'Panjang',
                'product_id' => 14,
            ),
            4 => 
            array (
                'id' => 5,
                'material' => 'Knitt',
                'size' => 'XXL',
                'sleeve_type' => 'Panjang',
                'product_id' => 15,
            ),
            5 => 
            array (
                'id' => 6,
                'material' => 'Katun',
                'size' => 'S',
                'sleeve_type' => 'Pendek',
                'product_id' => 16,
            ),
            6 => 
            array (
                'id' => 7,
                'material' => 'Katun',
                'size' => 'L',
                'sleeve_type' => 'Pendek',
                'product_id' => 17,
            ),
            7 => 
            array (
                'id' => 8,
                'material' => 'Flanel',
                'size' => 'L',
                'sleeve_type' => 'Pendek',
                'product_id' => 18,
            ),
            8 => 
            array (
                'id' => 9,
                'material' => 'Freelance',
                'size' => 'XL',
                'sleeve_type' => 'Panjang',
                'product_id' => 19,
            ),
            9 => 
            array (
                'id' => 10,
                'material' => 'Katun',
                'size' => 'XL',
                'sleeve_type' => 'Pendek',
                'product_id' => 20,
            ),
        ));
        
        
    }
}