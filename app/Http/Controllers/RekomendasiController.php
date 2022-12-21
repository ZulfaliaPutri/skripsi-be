<?php

namespace App\Http\Controllers;

use App\Facades\LoggerFacade;
use Exception;
use App\Helpers\Helpers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use PHPJuice\Slopeone\Algorithm;
use Illuminate\Support\Facades\Auth;
use Jacobemerick\KMeans\KMeans;
use Phpml\Math\Distance\Euclidean;

class RekomendasiController extends Controller
{



    public function index(Request $request)
    {

        $products = Product::inRandomOrder()->with(['Category', 'Rating']);
        $noFilter = true;

        $categories = array();
        for ($i = 1; $i <= 4; $i++) {
            if (!empty($request->get("category-" . $i))) {
                array_push($categories, $i);
                $noFilter = false;
            }
        }

        $ratings = array();
        $ratingFound = false;
        for ($i = 1; $i <= 5; $i++) {
            if (!empty($request->get("rating-" . $i))) {
                $ratings[$i] = 1;
                $ratingFound = true;
                $noFilter = false;
            }
        }

        if (count($categories) > 0) {
            $products = $products->whereIn("category_id", $categories);
            $noFilter = false;
        }

        if (!empty($request->get("minPrice"))) {
            $minPrice = $request->get("minPrice");
            $products = $products->where("price", ">=", $minPrice);
            $noFilter = false;
        }

        if (!empty($request->get("maxPrice"))) {
            $maxPrice = $request->get("maxPrice");
            $products = $products->where("price", "<=", $maxPrice);
            $noFilter = false;
        }

        if ($noFilter) {
            $ratedItems = Rating::where("user_id", Auth::user()->id)->get();
            if ($ratedItems->isEmpty()) {
                // todo: fallback
                return;
            }
            $ratedItemsIds = array();
            foreach ($ratedItems as $ratedItem) {
                array_push($ratedItemsIds, $ratedItem->product_id);
            }

            $toRecommendProducts = Rating::whereNot("user_id", Auth::user()->id)->get();
            $toShowProducts = array();
            foreach ($toRecommendProducts as $toRecommend) {
                $itemScore = array();
                $averageItemScore = array();

                // naturally this gets all user that has rated the to recommend other than
                // the user seeking recommendation since he/she have not rated it yet
                $otherUserHasRated = Rating::where("product_id", $toRecommend->id)->get();
                $usersHasRatedIdWithRating = array();
                foreach ($otherUserHasRated as $otherUser) {
                    $usersHasRatedIdWithRating[$otherUser->user_id] = $otherUser->rating;
                }

                $ratedItemsByOtherUser = Rating::whereIn("product_id", $ratedItemsIds)->whereNot("user_id", Auth::user()->id)->get();
                foreach ($ratedItemsByOtherUser as $othersRated) {
                    if (!array_key_exists($othersRated->user_id, $usersHasRatedIdWithRating)) {
                        continue;
                    }
                    if (!array_key_exists($othersRated->product_id, $itemScore)) {
                        $itemScore[$othersRated->product_id] = array();
                    }
                    array_push($itemScore[$othersRated->product_id], $usersHasRatedIdWithRating[$othersRated->user_id] - $othersRated->rating);
                    // $itemsScore[$othersRated->id] = $usersHasRatedIdWithRating[$othersRated->user_id] - $othersRated->rating;
                }

                // we want to find the average now
                foreach ($itemScore as $key => $score) {
                    $len = sizeof($score);
                    $sum = 0;
                    foreach ($score as $scoreArr) {
                        $sum += $scoreArr;
                    }
                    $averageItemScore[$key] = $sum / $len;
                }

                // we want to find the final score
                $totalRatedItem = 0;
                $total = 0;
                foreach ($ratedItems as $rItem) {
                    if (!array_key_exists($rItem->product_id, $averageItemScore)) {
                        continue;
                    }
                    $totalRatedItem += $rItem->rating + $averageItemScore[$rItem->product_id];
                    $total++;
                }

                if ($total != 0) {
                    $final = $totalRatedItem / $total;
                } else {
                    $final = 0;
                }
                LoggerFacade::writeln($final);
            }
        }

        $products = $products->get();
        $finalProducts = array();

        foreach ($products as $product) {
            $rating = Helpers::getRatings($product->rating);
            $product->rating = $rating;
            if ($ratingFound && array_key_exists($rating, $ratings)) {
                array_push($finalProducts, $product);
            } else if (!$ratingFound) {
                array_push($finalProducts, $product);
            }
        }

        return view('rekomendasi.index', [
            'title' => 'Rekomendasi',
            "products" => $finalProducts
        ]);
    }

    public function test()
    {
        /**
         * ALGORITMA SLOPE ONE -> ini digunakan untuk memprediksi nilai rating item yang tidak meilii rating atau 0
         * 1. cari rata-rata selisih rating
         * 2. nilai prediksi -> mencari nilai sel matriks yang kosong
         */
        // $ratingDataset = $this->getRatingDataset();
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
        $groupRating = $this->getKmeans($normResult, 3); /* Number cluster : 3 (Can be changed later!) */
        // dd($normResult);
        // dd($kmeansClustering);
        // dd($groupRating);


        /**
         * 3. Similarity Item-rating 
         * -> ini masukan dari rating produk yang sudah di lakukan di algoritma slope one (Pearson correlation based similarity)
         */
        $itemRating = $this->removeLabel($slopeOneResult);
        // dd($groupRating, $itemRating);
        $pearsonSimilarity = $this->pearsonSim($itemRating);
        // dd($pearsonSimilarity);

        /**
         * 4. Similarity Group Rating 
         * -> adjusted cosine similarity menggunakan masuan group rating
         */
        $adjCosineSimilarity = $this->adjCosineSim($groupRating);
        // dd($adjCosineSimilarity);


        /**
         * 5. Kombinasi Linear Similarity 
         * -> masukan dari proses 3 dan proses 4
         */
        $linearCombination = $this->linearComb($pearsonSimilarity, $adjCosineSimilarity, 0.5);
        dd($linearCombination);

        /**
         * 6. Prediksi Rating 
         * -> menggunakan weighted average of deviation yang masukkannya dari item raing dan kombinasi linear similarity
         */
        $weightedAverageDeviation = $this->weightAvgDev($itemRating, $linearCombination);
        dd("Hasil", $weightedAverageDeviation);
    }

    private function getRatingDataset(): array
    {
        // Generate rating dataset dari model/tabel menjadi array sesuai dokumentasi library
        $ratingDataset = [];

        // Loop through user ratings
        foreach (User::all() as $user) {
            $userRating = [];
            foreach ($user->rating as $rating) {
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
        $user = User::find($userId);
        $latestRatingIndex = count($user->rating) - 1;

        if ($latestRatingIndex >= 0) {
            // Get latest rating done by user
            $latestRating = $user->rating[$latestRatingIndex];
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
            // throw new Exception("User doesn't have any rating yet!");
            return $result;
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

    private function getKmeans($data, $cluster): array
    {
        // Prepare data
        $content = [];
        foreach ($data as $item) {
            array_push($content, [$item['view_count'], $item['price']]);
        }
        // dd($data, $content);

        // // Init kmeans
        $kmeans = new Kmeans($content);
        $kmeans->cluster($cluster);
        // $kmeans = new KMeans($cluster);

        // Group rating process
        $result = [];
        foreach ($kmeans->getCentroids() as $numCluster) {
            $maxCS = 0;
            $CS = [];
            $rowCluster = [];

            // CS(j,k) and MaxCS(j,k)
            foreach ($content as $rowItem) {
                // Eucledian distance
                // $De = $this->distance($rowItem, $clusterNum);
                $euc = new Euclidean();
                $De = $euc->distance($rowItem, $numCluster);
                $CS[] = $De;
                if ($maxCS < $De) $maxCS = $De;
            }

            // Pro(j,k)
            foreach ($CS as $valCS) {
                $rowCluster[] = 1 - ($valCS / $maxCS);
            }

            // assign
            $result[] = $rowCluster;
        }

        // // Format data
        // $formatted = [];
        // foreach ($data as $item) {
        //     // Index 0 => view_count, index 1 => price
        //     $formatted['product_' . $item['product_id']][0] = $item['view_count'];
        //     $formatted['product_' . $item['product_id']][1] = $item['price'];
        // }

        // // Run kmeans clustering
        // return $kmeans->cluster($formatted);
        return $result;
    }

    private function pearsonSim($rating)
    {
        // Transpose data
        $data = $this->transpose($rating); /* product => user ratings */
        // dd($rating, $data);

        // Get list of user
        $listUser = [];
        foreach ($rating as $user => $product) {
            array_push($listUser, $user);
        }
        // dd($listUser);

        // Get list of product
        $listProduct = [];
        foreach ($data as $product => $r) {
            array_push($listProduct, $product);
        }
        // dd($listProduct);

        // Get mean for each product rating
        $productMeans = [];
        foreach ($data as $productId => $ratings) {
            $total = 0;
            foreach ($ratings as $r) {
                $total += $r;
            }
            $productMeans[$productId] = $total / count($ratings);
        }
        // dd($productMeans);

        // Calculate similarity
        $similarityResult = [];
        foreach ($listProduct as $i) {
            foreach ($listProduct as $j) {
                $numerator = 0;
                $denominatorA = 0;
                $denominatorB = 0;
                foreach ($listUser as $u) {
                    $numerator += ($rating[$u][$i] - $productMeans[$i]) * ($rating[$u][$j] - $productMeans[$j]);
                    $denominatorA += pow(($rating[$u][$i] - $productMeans[$i]), 2);
                    $denominatorB += pow(($rating[$u][$j] - $productMeans[$j]), 2);
                }
                $similarityResult[$i][$j] = $numerator / (sqrt($denominatorA) * sqrt($denominatorB));
            }
        }

        // dd($similarityResult);
        return $similarityResult;
    }

    private function adjCosineSim($rating)
    {
        // Transpose data
        $data = $this->transpose($rating); /* product => user ratings */
        // dd($rating, $data);

        // Get list of user
        $listUser = [];
        foreach ($rating as $user => $product) {
            array_push($listUser, $user);
        }
        // dd($listUser);

        // Get list of product
        $listProduct = [];
        foreach ($data as $product => $r) {
            array_push($listProduct, $product);
        }
        // dd($listProduct);

        // // Get mean for each user rating
        $userMeans = [];
        foreach ($rating as $user => $ratings) {
            $total = 0;
            foreach ($ratings as $r) {
                $total += $r;
            }
            $userMeans[$user] = $total / count($ratings);
        }
        // // dd($userMeans);

        // Calculate similarity
        $similarityResult = [];
        foreach ($listProduct as $i) {
            foreach ($listProduct as $j) {
                $numerator = 0;
                $denominatorA = 0;
                $denominatorB = 0;
                foreach ($listUser as $u) {
                    $numerator += ($rating[$u][$i] - $userMeans[$u]) * ($rating[$u][$j] - $userMeans[$u]);
                    $denominatorA += pow(($rating[$u][$i] - $userMeans[$u]), 2);
                    $denominatorB += pow(($rating[$u][$j] - $userMeans[$u]), 2);
                }
                $similarityResult[$i][$j] = $numerator / (sqrt($denominatorA) * sqrt($denominatorB));
            }
        }

        // dd($similarityResult);
        return $similarityResult;
    }

    private function linearComb($pearsonSim, $adjCosineSim, $coeficient): array
    {
        $result = [];

        foreach ($pearsonSim as $rowIndex => $row) {
            $rowSimilarity = [];
            foreach ($row as $colIndex => $col) {
                $lc = ($col * (1 - $coeficient)) + ($adjCosineSim[$rowIndex][$colIndex] * $coeficient);
                $rowSimilarity[$colIndex] = $lc;
            }

            $result[$rowIndex] = $rowSimilarity;
        }

        return $result;
    }

    private function weightAvgDev($ratingItem, $linearSim): array
    {
        $result = [];

        // Loop trough users
        foreach ($ratingItem as $u => $ratings) {
            foreach ($ratings as $p => $pVal) {
                foreach ($ratings as $i => $iVal) {
                    $result[$u][$p] = ($iVal * $linearSim[$p][$i]) / abs($linearSim[$p][$i]);
                }
            }
        }

        return $result;
    }

    /**
     * Helper functions
     */
    private function removeLabel($data): array
    {
        $result = [];

        foreach ($data as $user => $products) {
            $userId = (int) str_replace('user_', '', $user);
            foreach ($products as $id => $rating) {
                $productId = (int) str_replace('product_', '', $id);
                $result[$userId][$productId] = $rating;
            }
        }

        return $result;
    }

    private function transpose($data)
    {
        $retData = array();
        foreach ($data as $row => $columns) {
            foreach ($columns as $row2 => $column2) {
                $retData[$row2][$row] = $column2;
            }
        }
        return $retData;
    }

    private function distance($vector1, $vector2)
    {
        $n = count($vector1);
        $sum = 0;
        for ($i = 0; $i < $n; $i++) {
            $sum += ($vector1[$i] - $vector2[$i]) * ($vector1[$i] - $vector2[$i]);
        }
        return sqrt($sum);
    }

    private function mean($arr)
    {
        $count = count($arr); //total numbers in array
        $total = 0;
        foreach ($arr as $value) {
            $total = $total + $value; // total value of array numbers
        }
        $average = ($total / $count); // get average value
        return $average;
    }
}
