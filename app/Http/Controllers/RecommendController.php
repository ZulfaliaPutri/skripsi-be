<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class RecommendController extends Controller
{
    public function index()
    {
        // Input data
        $data = [
            [null, 3, 3, 2, 4, 2, null, 2, null, 2],
            [4, null, 5, 4, null, 3, 3, 4, 3, 5],
            [3, 4, null, 3, null, 5, null, 5, null, 3],
            [null, 5, 5, null, 4, 3, 3, 5, 4, 5],
            [4, 4, 4, 4, 4, null, 4, null, 4, 4],
            [4, 2, 2, null, 4, 4, 5, null, 3, null],
            [3, 3, 3, 3, null, 4, 3, 5, 4, 4]
        ];

        $content = [
            [10000, 31],
            [18000, 30],
            [6000, 30],
            [42000, 29],
            [11000, 27],
            [220000, 33],
            [5000, 35],
            [175000, 27],
            [130000, 32],
            [9000, 23],
        ];

        // Slope One & Card
        $slopeOne = $this->proceedSlopeOne($data);
        $dev = $slopeOne[0];
        $card = $slopeOne[1];
        $predict = $slopeOne[2];

        // Kmeans
        $kmeans = $this->kmeans($content);
        dd($kmeans);
    }

    /**
     * Function to process Slope One Algorithm.
     * 
     * @param array
     * @return array [dev, card, prediction]
     */
    private function proceedSlopeOne($data): array
    {
        $numUser = sizeof($data);
        $numProduct = sizeof($data[0]);
        $card = array_fill(0, $numProduct, array_fill(0, $numProduct, 0));
        $dev = array_fill(0, $numProduct, array_fill(0, $numProduct, 0));
        $prediction = [];

        for ($j = 0; $j < $numProduct; $j++) {
            for ($i = 0; $i < $numProduct; $i++) {
                if ($j != $i) {
                    $total = 0;
                    for ($u = 0; $u < $numUser; $u++) {
                        if ($data[$u][$j] != null && $data[$u][$i] != null) {
                            $card[$j][$i] += 1;
                            // echo ($data[$u][$j] . '-' . $data[$u][$i]);
                            // echo ('<br>');
                            $total += $data[$u][$j] - $data[$u][$i];
                        }
                    }
                    $dev[$j][$i] = round($total / $card[$j][$i], 2);
                }
            }
        }

        for ($u = 0; $u < $numUser; $u++) {
            for ($i = 0; $i < $numProduct; $i++) {
                if ($data[$u][$i] == null) {
                    $sumDev = 0;
                    for ($j = 0; $j < $numProduct; $j++) {
                        if ($i != $j) {
                            $sumDev += ($dev[$u][$j] + $data[$u][$j]) * $card[$u][$j];
                        }
                    }
                    $sumCard = array_sum($card[$u]) - $card[$u][$i];
                    $prediction[$u][$i] = round($sumDev / $sumCard, 2);
                }
            }
        }

        return [$dev, $card, $prediction];
    }

    private function kmeans($content): array
    {
        // Index variable
        $priceIdx = 0;
        $viewIdx = 1;

        // Initialization
        $normalization = $this->normalization($content);
        $minK = 2;
        $maxK = 5;
        $K = 2; // Cluster start
        $centroids = []; // pairs: [price, view_count] 
        $clusters = []; // pairs: [price, view_count]
        $prevClusterResult = [];

        while ($K <= $maxK) {
            $i = 0;
            $isSame = false;

            while (!$isSame) {
                // Get centroids for current iteration
                if ($K == $minK && $i == 0) {
                    $centroids[$K - $minK][$i] = array_slice($normalization, 0, $K);
                } else {
                    for ($c = 0; $c < $K; $c++) {
                        $sumPrice = 0;
                        $countPrice = 0;
                        $sumView = 0;
                        $countView = 0;
                        for ($j = 0; $j < sizeof($content); $j++) {
                            if ($prevClusterResult[$j] == $c) {
                                $sumPrice += $normalization[$j][$priceIdx];
                                $sumView += $normalization[$j][$viewIdx];
                                $countPrice += 1;
                                $countView += 1;
                            }
                        }
                        $centroids[$K - $minK][$i][$c][$priceIdx] = $countPrice ? round($sumPrice / $countPrice, 2) : 0;
                        $centroids[$K - $minK][$i][$c][$viewIdx] = $countView ? round($sumView / $countView, 2) : 0;
                    }
                }

                // Calculation
                for ($j = 0; $j < sizeof($content); $j++) {
                    for ($c = 0; $c < $K; $c++) {
                        $clusters[$K - $minK][$i][$j][$c] = round(sqrt(pow(($normalization[$j][$priceIdx] - $centroids[$K - $minK][$i][$c][$priceIdx]), 2) + pow(($normalization[$j][$viewIdx] - $centroids[$K - $minK][$i][$c][$viewIdx]), 2)), 2);
                    }
                }

                // Assign cluster result to current clusters iteration result
                $currClusterResult = [];
                for ($j = 0; $j < sizeof($content); $j++) {
                    $min = PHP_INT_MAX;
                    $minC = 0;
                    for ($c = 0; $c < $K; $c++) {
                        if ($clusters[$K - $minK][$i][$j][$c] < $min) {
                            $min = $clusters[$K - $minK][$i][$j][$c];
                            $minC = $c;
                        }
                    }
                    $currClusterResult[$j] = $minC;
                }

                // Check prev and curr cluster result is same
                $isSame = $this->is_array_same($currClusterResult, $prevClusterResult);
                $prevClusterResult = $currClusterResult;
                // if ($i > 0) dd($centroids, $clusters, $currClusterResult);
                $i++;
            }

            $K++;
        }

        // Probability calculation
        $lastClusterIteration = end($clusters);
        $lastCluster = end($lastClusterIteration);
        $maxCS = array_fill(0, $K - 1, PHP_INT_MIN);

        for ($j = 0; $j < sizeof($lastCluster); $j++) {
            for ($c = 0; $c < $K - 1; $c++) {
                if ($lastCluster[$j][$c] > $maxCS[$c]) {
                    $maxCS[$c] = $lastCluster[$j][$c];
                }
            }
        }

        // Prepare and return cluster result
        $result = [];
        for ($c = 0; $c < $K - 1; $c++) {
            for ($j = 0; $j < sizeof($lastCluster); $j++) {
                $result[$c][$j] = round(1 - ($lastCluster[$j][$c] / $maxCS[$c]), 2);
            }
        }

        return $result;
    }

    /**
     * Normalization function
     * 
     * @param array [price, view_count]
     * @return array
     */
    private function normalization($content): array
    {
        try {
            // Index variable
            $priceIdx = 0;
            $viewIdx = 1;

            // Initialization
            $numProduct = sizeof($content);
            $normalization = array_fill(0, $numProduct, array_fill(0, sizeof($content[0]), 0));
            $minPrice = PHP_INT_MAX;
            $maxPrice = PHP_INT_MIN;
            $minView = PHP_INT_MAX;
            $maxView = PHP_INT_MIN;

            // Find min & max
            for ($i = 0; $i < $numProduct; $i++) {
                // Min price
                if ($content[$i][$priceIdx] < $minPrice) $minPrice = $content[$i][$priceIdx];
                // Max price
                if ($content[$i][$priceIdx] > $maxPrice) $maxPrice = $content[$i][$priceIdx];
                // Min view count
                if ($content[$i][$viewIdx] < $minView) $minView = $content[$i][$viewIdx];
                // Max view count
                if ($content[$i][$viewIdx] > $maxView) $maxView = $content[$i][$viewIdx];
            }

            // Normalization
            for ($i = 0; $i < $numProduct; $i++) {
                // Price
                $normalization[$i][$priceIdx] = round((($content[$i][$priceIdx] - $minPrice) * ($numProduct - 1)) / (($maxPrice - $minPrice) - 1), 2);
                // View count
                $normalization[$i][$viewIdx] = round((($content[$i][$viewIdx] - $minView) * ($numProduct - 1) / (($maxView - $minView) + 1)), 2);
            }

            return $normalization;
        } catch (Exception $e) {
            error_log($e);
        }
    }

    private function is_array_same($array1, $array2): bool
    {
        if (sizeof($array1) != sizeof($array2)) return false;
        for ($i = 0; $i < sizeof($array1); $i++) {
            if ($array1[$i] != $array2[$i]) return false;
        }
        return true;
    }
}
