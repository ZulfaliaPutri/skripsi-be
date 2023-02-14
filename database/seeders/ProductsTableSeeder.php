<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'seller_id' => 1,
                'name' => 'Babi Guling',
                'description' => 'Makanan ini berisi dengan babi yang diolah dengan nikmat',
                'price' => 17000,
                'quantity' => 1,
                'view_count' => 2,
                'category_id' => 1,
                'image_path' => '202302050602babiGulingHandayani.jpg',
                'created_at' => '2023-02-04 22:02:02',
                'updated_at' => '2023-02-11 12:16:32',
                'regency' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'seller_id' => 2,
                'name' => 'Nasi Babi Guling',
                'description' => 'Makanan babi ini berisi dengan nasi dan babi terorlah dan enak',
                'price' => 10000,
                'quantity' => 1,
                'view_count' => 0,
                'category_id' => 1,
                'image_path' => '202302050609nasiBabiMawar.jpg',
                'created_at' => '2023-02-04 22:09:22',
                'updated_at' => '2023-02-04 22:09:22',
                'regency' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'seller_id' => 3,
                'name' => 'Nasi Lawar Babi',
                'description' => 'Makanan ini berisi nasi dengan olahan lawar babi',
                'price' => 20000,
                'quantity' => 1,
                'view_count' => 3,
                'category_id' => 1,
                'image_path' => '202302050612nasiLawarPakJoni.jpg',
                'created_at' => '2023-02-04 22:12:34',
                'updated_at' => '2023-02-11 14:18:16',
                'regency' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'seller_id' => 4,
                'name' => 'Babi Guling',
                'description' => 'Makanan babi ini berisi dengan nasi dan babi terorlah dan enak',
                'price' => 15000,
                'quantity' => 1,
                'view_count' => 4,
                'category_id' => 1,
                'image_path' => '202302050615babiGulingBintangTina.png',
                'created_at' => '2023-02-04 22:15:26',
                'updated_at' => '2023-02-11 14:29:31',
                'regency' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'seller_id' => 5,
                'name' => 'Nasi Babi Guling Spesial',
                'description' => 'Makanan ini berisi nasi dengan babi yang diolah dengan nikmat',
                'price' => 30000,
                'quantity' => 1,
                'view_count' => 5,
                'category_id' => 1,
                'image_path' => '202302050623babiGulingBuManis.png',
                'created_at' => '2023-02-04 22:23:10',
                'updated_at' => '2023-02-11 12:23:37',
                'regency' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'seller_id' => 6,
                'name' => 'Indomie 5 Bungkus',
                'description' => 'Makanan ini hampir mendekati expired karena itu pemilki berbagi kepada yang lain agar tidak terbuang',
                'price' => 12000,
                'quantity' => 5,
                'view_count' => 3,
                'category_id' => 2,
                'image_path' => '202302050653indomie5bungkusSinta.png',
                'created_at' => '2023-02-04 22:53:33',
                'updated_at' => '2023-02-10 14:18:03',
                'regency' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'seller_id' => 7,
                'name' => 'Potato Bee 120 Gram',
                'description' => 'Makanan ini hampir mendekati expired karena itu pemilki berbagi kepada yang lain agar tidak terbuang',
                'price' => 15000,
                'quantity' => 1,
                'view_count' => 3,
                'category_id' => 2,
                'image_path' => '202302050655potatoBeeAndre.png',
                'created_at' => '2023-02-04 22:55:49',
                'updated_at' => '2023-02-11 14:10:58',
                'regency' => 5,
            ),
            7 => 
            array (
                'id' => 8,
                'seller_id' => 8,
                'name' => 'Marshmallows Plain',
                'description' => 'Makanan instant ini hampir mendekati expired karena itu pemilki berbagi kepada yang lain agar tidak terbuang',
                'price' => 10000,
                'quantity' => 1,
                'view_count' => 7,
                'category_id' => 2,
                'image_path' => '202302050658marshmellowCantika.png',
                'created_at' => '2023-02-04 22:58:00',
                'updated_at' => '2023-02-11 14:22:24',
                'regency' => 2,
            ),
            8 => 
            array (
                'id' => 9,
                'seller_id' => 9,
                'name' => 'Nextar Cookies & Cream',
                'description' => 'Makanan instant ini hampir mendekati expired karena itu pemilki berbagi kepada yang lain agar tidak terbuang',
                'price' => 7500,
                'quantity' => 1,
                'view_count' => 5,
                'category_id' => 2,
                'image_path' => '202302050700nextarCookiesGungAlit.png',
                'created_at' => '2023-02-04 23:00:27',
                'updated_at' => '2023-02-11 14:15:39',
                'regency' => 8,
            ),
            9 => 
            array (
                'id' => 10,
                'seller_id' => 10,
                'name' => 'Good Time Cookies Classic',
                'description' => 'Makanan instant ini hampir mendekati expired karena itu pemilki berbagi kepada yang lain agar tidak terbuang',
                'price' => 8500,
                'quantity' => 1,
                'view_count' => 3,
                'category_id' => 2,
                'image_path' => '202302050702goodTimeRoni.png',
                'created_at' => '2023-02-04 23:02:12',
                'updated_at' => '2023-02-11 14:22:19',
                'regency' => 2,
            ),
            10 => 
            array (
                'id' => 11,
                'seller_id' => 11,
                'name' => 'Shirt Polkadot Pink Local Brand',
                'description' => 'Kemeja dengan lengan pendek yang bisa digunakan saat berpergian ataupun kuliah',
                'price' => 50000,
                'quantity' => 1,
                'view_count' => 0,
                'category_id' => 4,
                'image_path' => '202302050719ShirtPolkadot.jpg',
                'created_at' => '2023-02-04 23:19:16',
                'updated_at' => '2023-02-04 23:19:16',
                'regency' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'seller_id' => 12,
                'name' => 'T-shirt Disney Size XL',
                'description' => 'Baju kaos dengan desain yang manis dan bahannya juga adem',
                'price' => 50000,
                'quantity' => 1,
                'view_count' => 3,
                'category_id' => 3,
                'image_path' => '202302050722disney.jpg',
                'created_at' => '2023-02-04 23:22:08',
                'updated_at' => '2023-02-11 14:14:56',
                'regency' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'seller_id' => 13,
                'name' => 'Blazer Abu-abu',
                'description' => 'Pakaian ini cocok untuk wanita karier ataupun yang sedang berkuliah',
                'price' => 85000,
                'quantity' => 1,
                'view_count' => 3,
                'category_id' => 3,
                'image_path' => '202302050726blazerabu2.jpg',
                'created_at' => '2023-02-04 23:26:09',
                'updated_at' => '2023-02-11 14:24:02',
                'regency' => 4,
            ),
            13 => 
            array (
                'id' => 14,
                'seller_id' => 14,
                'name' => 'Jaket Abu-Abu Nike',
                'description' => 'Jaket Nike yang sangat cocok untuk melindungi dari panas ataupun dingin',
                'price' => 185000,
                'quantity' => 1,
                'view_count' => 3,
                'category_id' => 4,
                'image_path' => '202302050728jaketNikeReuser.png',
                'created_at' => '2023-02-04 23:28:54',
                'updated_at' => '2023-02-11 14:29:46',
                'regency' => 1,
            ),
            14 => 
            array (
                'id' => 15,
                'seller_id' => 15,
                'name' => 'Sweater Flower',
                'description' => 'Sweater yang trendy bisa digunakan untuk jalan-jalan',
                'price' => 65000,
                'quantity' => 1,
                'view_count' => 0,
                'category_id' => 3,
                'image_path' => '202302050744flower kardigan.jpg',
                'created_at' => '2023-02-04 23:44:25',
                'updated_at' => '2023-02-04 23:44:25',
                'regency' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'seller_id' => 16,
                'name' => 'T-shirt Twilight The movie Boot',
                'description' => 'Baju kaos dengan desain yang manis dan bahannya juga adem',
                'price' => 50000,
                'quantity' => 1,
                'view_count' => 3,
                'category_id' => 3,
                'image_path' => '202302050746twilight.jpg',
                'created_at' => '2023-02-04 23:46:50',
                'updated_at' => '2023-02-11 12:26:10',
                'regency' => 1,
            ),
            16 => 
            array (
                'id' => 17,
                'seller_id' => 17,
                'name' => 'T-shirt Amerika Warna Abu',
                'description' => 'Baju kaos dengan bahan yang adem',
                'price' => 40000,
                'quantity' => 1,
                'view_count' => 3,
                'category_id' => 4,
                'image_path' => '202302050751tshirt amerika.jpg',
                'created_at' => '2023-02-04 23:51:41',
                'updated_at' => '2023-02-11 13:42:07',
                'regency' => 8,
            ),
            17 => 
            array (
                'id' => 18,
                'seller_id' => 18,
                'name' => 'Kemeja Daun',
                'description' => 'Kemeja dengan lengan pendek yang bisa digunakan saat berpergian ataupun kuliah',
                'price' => 150000,
                'quantity' => 1,
                'view_count' => 0,
                'category_id' => 4,
                'image_path' => '202302050754kemejadaun.jpg',
                'created_at' => '2023-02-04 23:54:34',
                'updated_at' => '2023-02-04 23:54:34',
                'regency' => 1,
            ),
            18 => 
            array (
                'id' => 19,
                'seller_id' => 19,
                'name' => 'Hoodie GAP merah',
                'description' => 'Hoodie ini dapat digunakan untuk berpergian ataupun melindungi dari kepanasan serta kedinginan',
                'price' => 120000,
                'quantity' => 1,
                'view_count' => 4,
                'category_id' => 4,
                'image_path' => '202302050756Hoodie gap1.jpg',
                'created_at' => '2023-02-04 23:56:25',
                'updated_at' => '2023-02-11 14:29:56',
                'regency' => 8,
            ),
            19 => 
            array (
                'id' => 20,
                'seller_id' => 20,
                'name' => 'Polo Ralph Lauren',
                'description' => 'Baju ini bisa digunakan sebagai luaran untuk bekerja ataupun sebagai outfit yang cocok untuk berpergian namun pakaian ini merupakan preloved clothes dari pemilik',
                'price' => 50000,
                'quantity' => 1,
                'view_count' => 0,
                'category_id' => 3,
                'image_path' => '202302050758polo cewek.jpg',
                'created_at' => '2023-02-04 23:58:45',
                'updated_at' => '2023-02-04 23:58:45',
                'regency' => 2,
            ),
            20 => 
            array (
                'id' => 21,
                'seller_id' => 6,
                'name' => 'Maxzycon',
                'description' => 'okee',
                'price' => 25000,
                'quantity' => 1,
                'view_count' => 5,
                'category_id' => 1,
                'image_path' => '202302111312PHOTO-2023-02-08-20-29-37.jpg',
                'created_at' => '2023-02-11 13:12:30',
                'updated_at' => '2023-02-11 14:11:30',
                'regency' => 5,
            ),
        ));
        
        
    }
}