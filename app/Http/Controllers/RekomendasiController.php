<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use PHPJuice\Slopeone\Algorithm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jacobemerick\KMeans\KMeans;
use Phpml\Math\Distance\Euclidean;

class RekomendasiController extends Controller
{
    public function index()
    {
        return view('rekomendasi.index', [
            'title' => 'Rekomendasi'
        ]);
    }

    public function test()
    {
        // data: array
        //data: array tu maksudku buat variabel yg namanya data tipenya array
        // foreach User::all() as user:
        //   userRating: array
        //   foreach userRatings as rating:
        //     // TODO : Buat men associative array, bentuknya: 'key' => value, (key itu product id, value itu rating)
        //  $userRating[key] = value
        //   push userRating ke dalam array data

        $data = [];
        foreach (User::all() as $user) {
            $userRating = [];
            foreach ($user->rating as $rating) {
                $userRating[$rating->product_id] = $rating->rating / 10;
            }
            array_push($data, $userRating);
        }

        $slopeone = new Algorithm();
        $user = Auth::user();
        $latestRatingIndex = count($user->ratings) - 1;
        if ($latestRatingIndex < 0) {
            $latestRating = $user->ratings[$latestRatingIndex];

            $predictUserRating[$latestRating->product->id] = $latestRating->rating / 10;

            $slopeone->predict($predictUserRating);
            $result = $slopeone->getModel();

            dd($result);
        } else {
            dd('User belum pernah melakukan rating');
        }
    }

    function groupRating($content, $k = 4)
    {
        //clustering
        $kmeans = new Kmeans($content);
        $kmeans->cluster($k); //cluster into three sets
        $clustered_data = $kmeans->getClusteredData();
        $centroids = $kmeans->getCentroids();

        //groupRating
        $matrixPro = [];
        foreach ($centroids as $numberCluster) {
            $maxCS = 0;
            $CS = [];
            $rowCluster = [];

            //CS(j,k) and maxCS(j,k)
            foreach ($content as $rowItem) {
                //eucledian distance
                $euclidean = new Euclidean();
                $De = $euclidean->distance($rowItem, $numberCluster);
                $CS[] = $De;

                if ($maxCS < $De) $maxCS = $De;
            }

            //Pro(j,k)
            foreach ($CS as $valCS) {
                $rowCluster[] = 1 - ($valCS / $maxCS);
            }

            //asign
            $matrixPro[] = $rowCluster;
        }

        return $matrixPro;
    }

    function pearsonSim($rating)
    {
        //inisialisasi variable

        $data = transpose($rating);
        $simPembilang = 0;
        $simPenyebutA = 0;
        $simPenyebutB = 0;
        $similarity = [];

        //rata-rata
        $mean = [];
        foreach ($data as $val) {
            $mean[] = mean($val);
        }

        //proses similarity
        foreach ($data as $i => $iVal) {
            $rowSimilarity = [];
            foreach ($data as $j => $jVal) {
                foreach ($jVal as $colIndex => $val) {
                    $calcI = $data[$i][$colIndex] - $mean[$i];
                    $calcJ = $data[$j][$colIndex] - $mean[$j];

                    $simPembilang += ($calcI * $calcJ);
                    $simPenyebutA += pow($calcI, 2);
                    $simPenyebutB += pow($calcJ, 2);
                }

                $simPenyebut = sqrt($simPenyebutA) * sqrt($simPenyebutB);
                $rowSimilarity[] = ($simPenyebut !== 0) ? ($simPembilang / $simPenyebut) : 0;
                $simPembilang = 0;
                $simPenyebutA = 0;
                $simPenyebutB = 0;
            }
            $similarity[] = $rowSimilarity;
        }
        return $similarity;
    }



    function adjustSim($groupRating)
    {
        //insialisasi variabel

        $mean = [];
        foreach ($groupRating as $value) {
            $mean[] = mean($value);
        }

        $simPembilang = 0;
        $simPenyebutA = 0;
        $simPenyebutB = 0;
        $similarity = 0;
        $data = transpose($groupRating);

        //proses similarity
        foreach ($data as $k => $kVal) {
            $rowSimilarity = [];
            foreach ($data as $l => $lVal) {
                foreach ($lVal as $colIndex => $val) {
                    $calcK = $data[$k][$colIndex] - $mean[$colIndex];
                    $calcL = $data[$l][$colIndex] - $mean[$colIndex];
                    $simPembilang += ($calcK * $calcL);
                    $simPenyebutA += pow($calcK, 2);
                    $simPenyebutB += pow($calcL, 2);
                }
                $simPenyebut = sqrt($simPenyebutA) * sqrt($simPenyebutB);
                $rowSimilarity[] = ($simPenyebut !== 0) ? ($simPembilang / $simPenyebut) : 0;
                $simPembilang = 0;
                $simPenyebutA = 0;
                $simPenyebutB = 0;
            }
            $similarity[] = $rowSimilarity;
        }
        return $similarity;
    }

    function linearCombination($pearsonSim, $adjustSim, $coefisien = 0.5)
    {
        $similarity = [];

        foreach ($pearsonSim as $rowIndex => $row) {
            $rowSimilarity = [];
            foreach ($row as $colIndex => $col) {
                $lc = ($col * (1 - $coefisien)) + ($adjustSim[$rowIndex][$colIndex] * $coefisien);
                $rowSimilarity[] = $lc;
            }
            $similarity[] = $rowSimilarity;
        }
        return $similarity;
    }

    function weightedDeviation($ratingItem, $linearSim)
    {
        $mean = [];
        foreach (transpose($ratingItem) as $value) {
            $mean[] = mean($value);
        }
        $coldStart = [];
        $prediksiPembilang = 0;
        $prediksiPenyebut = 0;

        foreach ($ratingItem[$indexUser] as $k => $kVal) {
            foreach ($ratingItem[$indexUser] as $i => $iVal) {
                $prediksiPembilang += ($iVal - $mean[$i]) * $linearSim[$k][$i];
                $prediksiPenyebut += abs($linearSim[$k][$i]);
            }
            $wad = ($prediksiPenyebut !== 0) ? $mean[$k] + ($prediksiPembilang / $prediksiPenyebut) : 0;
            $prediksiPembilang = 0;
            $prediksiPenyebut = 0;
            $rowColdStart[] = 0;
        }
        return $coldStart;
    }
}
