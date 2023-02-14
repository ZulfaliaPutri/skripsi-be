<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ratings')->delete();
        
        \DB::table('ratings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'rating' => 4,
                'product_id' => 8,
                'user_id' => 37,
                'created_at' => '2023-02-05 00:07:42',
                'updated_at' => '2023-02-05 00:07:42',
            ),
            1 => 
            array (
                'id' => 2,
                'rating' => 3,
                'product_id' => 12,
                'user_id' => 37,
                'created_at' => '2023-02-05 00:08:06',
                'updated_at' => '2023-02-05 00:08:06',
            ),
            2 => 
            array (
                'id' => 3,
                'rating' => 5,
                'product_id' => 9,
                'user_id' => 37,
                'created_at' => '2023-02-05 00:08:16',
                'updated_at' => '2023-02-05 00:08:16',
            ),
            3 => 
            array (
                'id' => 4,
                'rating' => 3,
                'product_id' => 6,
                'user_id' => 37,
                'created_at' => '2023-02-05 00:08:41',
                'updated_at' => '2023-02-05 00:08:41',
            ),
            4 => 
            array (
                'id' => 5,
                'rating' => 5,
                'product_id' => 19,
                'user_id' => 36,
                'created_at' => '2023-02-05 00:10:44',
                'updated_at' => '2023-02-05 00:10:44',
            ),
            5 => 
            array (
                'id' => 6,
                'rating' => 5,
                'product_id' => 19,
                'user_id' => 36,
                'created_at' => '2023-02-05 01:07:05',
                'updated_at' => '2023-02-05 01:07:05',
            ),
            6 => 
            array (
                'id' => 7,
                'rating' => 5,
                'product_id' => 17,
                'user_id' => 36,
                'created_at' => '2023-02-05 01:07:15',
                'updated_at' => '2023-02-05 01:07:15',
            ),
            7 => 
            array (
                'id' => 8,
                'rating' => 5,
                'product_id' => 13,
                'user_id' => 35,
                'created_at' => '2023-02-05 01:08:55',
                'updated_at' => '2023-02-05 01:08:55',
            ),
            8 => 
            array (
                'id' => 9,
                'rating' => 4,
                'product_id' => 10,
                'user_id' => 35,
                'created_at' => '2023-02-05 01:09:10',
                'updated_at' => '2023-02-05 01:09:10',
            ),
            9 => 
            array (
                'id' => 10,
                'rating' => 3,
                'product_id' => 6,
                'user_id' => 35,
                'created_at' => '2023-02-05 01:09:28',
                'updated_at' => '2023-02-05 01:09:28',
            ),
            10 => 
            array (
                'id' => 11,
                'rating' => 5,
                'product_id' => 6,
                'user_id' => 35,
                'created_at' => '2023-02-05 01:09:30',
                'updated_at' => '2023-02-05 01:09:30',
            ),
            11 => 
            array (
                'id' => 12,
                'rating' => 4,
                'product_id' => 3,
                'user_id' => 35,
                'created_at' => '2023-02-05 01:09:58',
                'updated_at' => '2023-02-05 01:09:58',
            ),
            12 => 
            array (
                'id' => 13,
                'rating' => 5,
                'product_id' => 9,
                'user_id' => 36,
                'created_at' => '2023-02-05 01:15:48',
                'updated_at' => '2023-02-05 01:15:48',
            ),
            13 => 
            array (
                'id' => 14,
                'rating' => 4,
                'product_id' => 17,
                'user_id' => 36,
                'created_at' => '2023-02-05 01:16:19',
                'updated_at' => '2023-02-05 01:16:19',
            ),
            14 => 
            array (
                'id' => 15,
                'rating' => 2,
                'product_id' => 8,
                'user_id' => 31,
                'created_at' => '2023-02-05 01:19:22',
                'updated_at' => '2023-02-05 01:19:22',
            ),
            15 => 
            array (
                'id' => 16,
                'rating' => 5,
                'product_id' => 14,
                'user_id' => 31,
                'created_at' => '2023-02-05 01:21:07',
                'updated_at' => '2023-02-05 01:21:07',
            ),
            16 => 
            array (
                'id' => 17,
                'rating' => 3,
                'product_id' => 5,
                'user_id' => 31,
                'created_at' => '2023-02-05 01:21:16',
                'updated_at' => '2023-02-05 01:21:16',
            ),
            17 => 
            array (
                'id' => 18,
                'rating' => 5,
                'product_id' => 4,
                'user_id' => 31,
                'created_at' => '2023-02-05 01:21:43',
                'updated_at' => '2023-02-05 01:21:43',
            ),
            18 => 
            array (
                'id' => 19,
                'rating' => 5,
                'product_id' => 16,
                'user_id' => 31,
                'created_at' => '2023-02-05 01:22:01',
                'updated_at' => '2023-02-05 01:22:01',
            ),
            19 => 
            array (
                'id' => 21,
                'rating' => 5,
                'product_id' => 8,
                'user_id' => 32,
                'created_at' => '2023-02-05 01:22:53',
                'updated_at' => '2023-02-05 01:22:53',
            ),
            20 => 
            array (
                'id' => 24,
                'rating' => 5,
                'product_id' => 10,
                'user_id' => 39,
                'created_at' => '2023-02-07 16:34:57',
                'updated_at' => '2023-02-07 16:34:57',
            ),
            21 => 
            array (
                'id' => 25,
                'rating' => 5,
                'product_id' => 8,
                'user_id' => 39,
                'created_at' => '2023-02-07 16:35:42',
                'updated_at' => '2023-02-07 16:35:42',
            ),
            22 => 
            array (
                'id' => 26,
                'rating' => 5,
                'product_id' => 8,
                'user_id' => 39,
                'created_at' => '2023-02-08 01:23:34',
                'updated_at' => '2023-02-08 01:23:34',
            ),
        ));
        
        
    }
}