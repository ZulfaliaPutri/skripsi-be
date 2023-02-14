<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SellersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sellers')->delete();
        
        \DB::table('sellers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'store_name' => 'Bu Handayani\'s store',
                'created_at' => '2023-02-04 22:02:02',
                'updated_at' => '2023-02-04 22:02:02',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'store_name' => 'Bu Mawar\'s store',
                'created_at' => '2023-02-04 22:09:22',
                'updated_at' => '2023-02-04 22:09:22',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 3,
                'store_name' => 'Warung Makan Pak Joni\'s store',
                'created_at' => '2023-02-04 22:12:34',
                'updated_at' => '2023-02-04 22:12:34',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 4,
                'store_name' => 'Warung Babi Guling Cahaya Bintang Tina\'s store',
                'created_at' => '2023-02-04 22:15:26',
                'updated_at' => '2023-02-04 22:15:26',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 5,
                'store_name' => 'Warung Bu Makan Babi Guling Bu Manis\'s store',
                'created_at' => '2023-02-04 22:23:10',
                'updated_at' => '2023-02-04 22:23:10',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 11,
                'store_name' => 'Sinta Trisnajayanti\'s store',
                'created_at' => '2023-02-04 22:53:33',
                'updated_at' => '2023-02-04 22:53:33',
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 12,
                'store_name' => 'Kadek Andre Suryana\'s store',
                'created_at' => '2023-02-04 22:55:49',
                'updated_at' => '2023-02-04 22:55:49',
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => 13,
                'store_name' => 'Alisya Putri\'s store',
                'created_at' => '2023-02-04 22:58:00',
                'updated_at' => '2023-02-04 22:58:00',
            ),
            8 => 
            array (
                'id' => 9,
                'user_id' => 14,
                'store_name' => 'Agung Alit\'s store',
                'created_at' => '2023-02-04 23:00:27',
                'updated_at' => '2023-02-04 23:00:27',
            ),
            9 => 
            array (
                'id' => 10,
                'user_id' => 15,
                'store_name' => 'Roni Sudarmawan\'s store',
                'created_at' => '2023-02-04 23:02:12',
                'updated_at' => '2023-02-04 23:02:12',
            ),
            10 => 
            array (
                'id' => 11,
                'user_id' => 17,
                'store_name' => 'Bali Thrift Shop\'s store',
                'created_at' => '2023-02-04 23:19:16',
                'updated_at' => '2023-02-04 23:19:16',
            ),
            11 => 
            array (
                'id' => 12,
                'user_id' => 18,
                'store_name' => 'Shine Hold Denim Store\'s store',
                'created_at' => '2023-02-04 23:22:08',
                'updated_at' => '2023-02-04 23:22:08',
            ),
            12 => 
            array (
                'id' => 13,
                'user_id' => 19,
                'store_name' => 'Secondmate Thrift Shop\'s store',
                'created_at' => '2023-02-04 23:26:09',
                'updated_at' => '2023-02-04 23:26:09',
            ),
            13 => 
            array (
                'id' => 14,
                'user_id' => 20,
                'store_name' => 'Reuser Stuff\'s store',
                'created_at' => '2023-02-04 23:28:54',
                'updated_at' => '2023-02-04 23:28:54',
            ),
            14 => 
            array (
                'id' => 15,
                'user_id' => 24,
                'store_name' => 'Kimmy Thrift\'s store',
                'created_at' => '2023-02-04 23:44:25',
                'updated_at' => '2023-02-04 23:44:25',
            ),
            15 => 
            array (
                'id' => 16,
                'user_id' => 25,
                'store_name' => '30rabs Thrift Store\'s store',
                'created_at' => '2023-02-04 23:46:50',
                'updated_at' => '2023-02-04 23:46:50',
            ),
            16 => 
            array (
                'id' => 17,
                'user_id' => 27,
                'store_name' => 'Preloved tri\'s store',
                'created_at' => '2023-02-04 23:51:41',
                'updated_at' => '2023-02-04 23:51:41',
            ),
            17 => 
            array (
                'id' => 18,
                'user_id' => 28,
                'store_name' => 'Mokastuffs\'s store',
                'created_at' => '2023-02-04 23:54:34',
                'updated_at' => '2023-02-04 23:54:34',
            ),
            18 => 
            array (
                'id' => 19,
                'user_id' => 29,
                'store_name' => 'Thrift Garage\'s store',
                'created_at' => '2023-02-04 23:56:25',
                'updated_at' => '2023-02-04 23:56:25',
            ),
            19 => 
            array (
                'id' => 20,
                'user_id' => 30,
                'store_name' => 'Bali Thrift Zone\'s store',
                'created_at' => '2023-02-04 23:58:45',
                'updated_at' => '2023-02-04 23:58:45',
            ),
        ));
        
        
    }
}