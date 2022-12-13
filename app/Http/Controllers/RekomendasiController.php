<?php

namespace App\Http\Controllers;

use App\Facades\LoggerFacade;
use Exception;
use App\Models\Rating;
use Illuminate\Http\Request;
use PHPJuice\Slopeone\Algorithm;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jacobemerick\KMeans\KMeans;
use Phpml\Math\Distance\Euclidean;

class RekomendasiController extends Controller
{
    public function index(Request $request)
    {

        $products = Product::inRandomOrder()->with(['Category', 'Rating']);

        $categories = array();
        for ($i = 1; $i <= 4; $i++) {
            if (!empty($request->get("category-" . $i))) {
                array_push($categories, $i);
            }
        }



        if (count($categories) > 0) {
            $products = $products->whereIn("category_id", $categories);
        }

        if (!empty($request->get("minPrice"))) {
            $minPrice = $request->get("minPrice");
            $products = $products->where("price", ">=", $minPrice);
        }

        if (!empty($request->get("maxPrice"))) {
            $maxPrice = $request->get("maxPrice");
            $products = $products->where("price", "<=", $maxPrice);
        }

        // if (!empty($request->get("ratings"))) {
        //     $ratingsStr = $request->get("ratings");
        //     $ratings = explode($ratingsStr, ",");
        // }

        $products = $products->get();

        return view('rekomendasi.index', [
            'title' => 'Rekomendasi',
            "products" => $products
        ]);
    }

    public function search()
    {
        LoggerFacade::writeln("ANJENGG");
    }

    public function test()
    {
        /**
         * ALGORITMA SLOPE ONE -> ini digunakan untuk memprediksi nilai rating item yang tidak meilii rating atau 0
         * 1. cari rata-rata selisih rating
         * 2. nilai prediksi -> mencari nilai sel matriks yang kosong
         */
        $ratingDataset = $this->getRatingDataset();
        // $slopeOnePrediction = $this->predictRating($ratingDataset, 3);
        $slopeOneResult = $this->produceSlopeOneResult();
        dd($slopeOneResult);

        /**
         * METODE ICHM
         * 1. Punya dataset Rating Item dan konten item (harga dan jumlah view)
         */
        $ratingItemDataset = $this->getRatingItemDataset();
        $contentItemDataset = $this->getContentItemDataset();
        // dd($ratingItemDataset, $contentItemDataset);

        /**
         * 2. Group Rating
         *  A. normalisasi nilai konten produk item 
         *  B. K mean clustering
         *      a. penglompokkan berdasarkan kedekatan antar item gunain K-MEANS CLUSTERING
         *      b. kemudian terdapat eucladean distance -> ini menemukan cluster
         *      c. iterasi pertama mendapatkan nilai centroid baru. ini digunakan terus menerus sampe tidak ada berubah
         *      d. metode elbow dengan SSE
         *      e. probabilitas item cluster
         */
        $normResult = $this->getNormalizationContentItem($contentItemDataset);
        $groupRating = $this->getKmeans($normResult, 4); /* Number cluster : 4 (Can be changed later!) */
        // dd($normResult);
        // dd($kmeansClustering);


        /**
         * 3. Similarity Item-rating 
         * -> ini masukan dari rating produk yang sudah di lakukan di algoritma slope one (Pearson correlation based similarity)
         */
        // TODO: Checkpoint!!!
        $simItemRating = $this->getItemRatingSimilarity($slopeOneResult);

        /**
         * 4. Similarity Group Rating 
         * -> adjusted cosine similarity menggunakan masuan group rating
         */


        /**
         * 5. Kombinasi Linear Similarity 
         * -> masukan dari proses 3 dan proses 4
         */


        /**
         * 6. Prediksi Rating 
         * -> menggunakan weighted average of deviation yang masukkannya dari item raing dan kombinasi linear similarity
         */
    }

    private function getRatingDataset(): array
    {
        // Generate rating dataset dari model/tabel menjadi array sesuai dokumentasi library
        $ratingDataset = [];

        // Loop through user ratings
        foreach (User::all() as $user) {
            $userRating = [];
            foreach ($user->ratings as $rating) {
                $userRating[strtolower(str_replace(' ', '_', $rating->product->name))] = (int) $rating->rating;
            }
            array_push($ratingDataset, $userRating);
        }

        return $ratingDataset;
    }

    private function predictRating($ratingDataset, $userId): array
    {
        // Init result array
        $result = [];

        // Inisialisasi model slopeone
        $slopeone = new Algorithm();
        $slopeone->clear();

        // Input rating dataset ke model
        $slopeone->update($ratingDataset);

        // Cari rating terakhir yang dimiliki authenticated user (current user)
        // $user = Auth::user(); /* TODO: Unhide this code (temporary) */
        $user = User::find($userId);
        $latestRatingIndex = count($user->ratings) - 1;

        if ($latestRatingIndex >= 0) {
            // Get latest rating done by user
            $latestRating = $user->ratings[$latestRatingIndex];
            $productId = strtolower(str_replace(' ', '_', $latestRating->product->name));
            $productRating = $latestRating->rating;

            // Kalkulasi model untuk mendapatkan hasil
            $slopeone->predict([
                $productId => $productRating
            ]);
            $result = $slopeone->getModel();

            // Convert result into absolute value
            return $this->absoluteValue($result[$productId]);
        } else {
            throw new Exception("User belum memilki rating!");
        }

        return $result;
    }

    /**
     * Turn array of decimal value into an absolute value (no negative value)
     */
    private function absoluteValue($arr): array
    {
        $result = [];

        foreach ($arr as $key => $item) {
            $result[$key] = abs($item);
        }

        return $result;
    }

    private function produceSlopeOneResult(): array
    {
        $result = [];

        // Get rating dataset
        $ratingDataset = $this->getRatingDataset();

        // Loop through all user
        foreach (User::all() as $user) {
            $predictions = $this->predictRating($ratingDataset, $user->id);
            foreach ($predictions as $key => $p) {
                $findRating = Rating::where('user_id', 99)->where('product_id', str_replace('product_', '', $key))->orderByDesc('rating')->get();
                $userRating = sizeof($findRating) > 0 ? $findRating[0] : null;
                $predictions[$key] = $userRating ?: $p;
            }
            $result['user_' . $user->id] = $predictions;
        }

        return $result;
    }

    private function getRatingItemDataset(): array
    {
        // Result => user_id, product_id, rating
        $result = [];

        // Loop through user ratings table
        foreach (Rating::all() as $item) {
            array_push($result, [
                'user_id' => $item->user_id,
                'product_id' => $item->product_id,
                'rating' => $item->rating
            ]);
        }

        return $result;
    }

    private function getContentItemDataset(): array
    {
        // Result => product_id, view_count, price
        $result = [];

        // Loop through products table
        foreach (Product::all() as $item) {
            array_push($result, [
                'product_id' => $item->id,
                'view_count' => $item->view_count,
                'price' => $item->price
            ]);
        }

        return $result;
    }

    private function getNormalizationContentItem($arr): array
    {
        $result = [];

        // Get min & max value
        $minViewCount = $this->getMin($arr, 'view_count');
        $maxViewCount = $this->getMax($arr, 'view_count');
        $minPrice = $this->getMin($arr, 'price');
        $maxPrice = $this->getMax($arr, 'price');

        foreach ($arr as $item) {
            // View count
            $productId = $item['product_id'];
            $viewCount = ($item['view_count'] > 0) ? ($item['view_count'] - $minViewCount) / ($maxViewCount - $minViewCount) : 0;
            $price = ($item['price'] > 0) ? ($item['price'] - $minPrice) / ($maxPrice - $minPrice) : 0;

            array_push($result, [
                'product_id' => $productId,
                'view_count' => $viewCount,
                'price' => $price
            ]);
        }

        return $result;
    }

    private function getMin($arr, $key)
    {
        $min = null;
        foreach ($arr as $item) {
            if ($min == null or $item[$key] < $min)
                $min = $item[$key];
        }
        return $min;
    }

    private function getMax($arr, $key)
    {
        $max = 0;
        foreach ($arr as $item) {
            if ($item[$key] > $max)
                $max = $item[$key];
        }
        return $max;
    }

    private function getKmeans($data, $clusterNum): array
    {
        // Init kmeans
        $kmeans = new KMeans($clusterNum);

        // Format data
        $formatted = [];
        foreach ($data as $item) {
            // Index 0 => view_count, index 1 => price
            $formatted['product_' . $item['product_id']][0] = $item['view_count'];
            $formatted['product_' . $item['product_id']][1] = $item['price'];
        }

        // Run kmeans clustering
        return $kmeans->cluster($formatted);
    }

    private function getItemRatingSimilarity($data): array
    {
        $result = [];

        // TODO: Get similarity here!
        dd($data);

        return $result;
    }
}

    //ALGORITMA SLOPE ONE -> ini digunakan untuk memprediksi nilai rating item yang tidak meilii rating atau 0

    //1. cari rata-rata selisih rating
    //2. nilai prediksi -> mencari nilai sel matriks yang kosong

    // METODE ICHM

    //1. Punya dataset Rating Item dan konten item (harga dan jumlah view)

    //2.Group Rating 
        //A.normalisasi nilai konten produk item 
            //a. mengubah nilai yang blm seimbang ke rentang nilai yang sama
            //b. menggunakan metode min-max dengan nilai bawah 1 dan nilai atas 10
        //B. K mean clustering
            //a. penglompokkan berdasarkan kedekatan antar item gunain K-MEANS CLUSTERING
            //b.Kemudian terdapat eucladean distance -> ini menemukan cluster
            //c. iterasi pertama mendapatkan nilai centroid baru. ini digunakan terus menerus sampe tidak ada berubah
            //d.metode elbow dengan SSE
            //e. probabilitas item cluster

    //3. Similarity Item-rating -> ini masukan dari rating produk yang sudah di lakukan di algoritma slope one (Pearson correlation based similarity)

    //4. Similarity Group Rating -> adjusted cosine similarity menggunakan masuan group rating

    //5. Kombinasi Linear Similarity -> masukan dari proses 3 dan proses 4

    //6. Prediksi Rating -> menggunakan weighted average of deviation yang masukkannya dari item raing dan kombinasi linear similarity
