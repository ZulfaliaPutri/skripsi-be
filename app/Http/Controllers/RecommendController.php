<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;

class RecommendController extends Controller
{
    public function index(Request $request)
    {
        // Get rating item
        $ratingItem = $this->getRatingItem();
        // dd($ratingItem);

        // Slope one
        $slopeOne = $this->slopeOne($ratingItem);
        dd($slopeOne);
    }

    private function getRatingItem(): array
    {
        $result = [];

        foreach (Rating::limit(50)->get() as $r) {
            $ratings[$r->user_id][$r->product_id] = $r->rating;
        }

        foreach (User::limit()->get() as $u) {
            foreach (Product::limit(20)->get() as $p) {
                $result[$u->id][$p->id] = isset($ratings[$u->id][$p->id]) ? $ratings[$u->id][$p->id] : null;
            }
        }

        return $result;
    }

    private function slopeOne($ratingItem)
    {
        $deviation = $this->dev($ratingItem);
        return $this->p($deviation, $ratingItem);
    }

    private function dev($ratingItem)
    {
        $items = $this->transpose($ratingItem);
        $card = 0;
        $pembilang = 0;
        $deviation = [];

        foreach ($items as $j => $jVal) {
            $rowDeviation = [];
            foreach ($items as $i => $iVal) {
                if ($j === $i) {
                    array_push($rowDeviation, [
                        'card' => 0,
                        'value' => 0
                    ]);
                    break;
                }

                foreach ($iVal as $colIndex => $colVal) {
                    // dd("j=$j, i=$i, colIndex=$colIndex", $items);
                    if ($items[$j][$colIndex] !== 0 && $items[$i][$colIndex] !== 0) {
                        $card += 1;
                        $pembilang = $items[$j][$colIndex] - $items[$i][$colIndex];
                    }
                }
                array_push($rowDeviation, [
                    'card' => $card,
                    'value' => $pembilang / $card
                ]);
                $pembilang = 0;
                $card = 0;
            }
            array_push($deviation, $rowDeviation);
        }

        return $deviation;
    }

    // private function transpose($data)
    // {
    //     $retData = array();
    //     foreach ($data as $row => $columns) {
    //         foreach ($columns as $row2 => $column2) {
    //             $retData[$row2][$row] = $column2;
    //         }
    //     }
    //     return $retData;
    // }

    private function transpose($array, $selectKey = false)
    {
        if (!is_array($array)) return false;
        $return = array();
        foreach ($array as $key => $value) {
            if (!is_array($value)) return $array;
            if ($selectKey) {
                if (isset($value[$selectKey])) $return[] = $value[$selectKey];
            } else {
                foreach ($value as $key2 => $value2) {
                    $return[$key2][$key] = $value2;
                }
            }
        }
        return $return;
    }

    private function p($deviation, $ratingItem)
    {
        $newRatingPrediction = [];
        $pembilang = 0;
        $penyebut = 0;

        foreach ($ratingItem as $u => $uVal) {
            $rowNewRatingPrediction = [];
            foreach ($uVal as $j => $jVal) {
                if ($jVal === 0) {
                    foreach ($deviation[$j] as $i => $iVal) {
                        $pembilang += ($iVal['value'] + $ratingItem[$u][$i]) * $iVal['card'];
                        $penyebut += $iVal['card'];
                    }
                    $predict = ($penyebut !== 0) ? $pembilang / $penyebut : 0;
                    $penyebut = 0;
                    $pembilang = 0;
                    array_push($rowNewRatingPrediction, $predict);
                } else {
                    array_push($rowNewRatingPrediction, $jVal);
                }
            }
            array_push($newRatingPrediction, $rowNewRatingPrediction);
        }

        return $newRatingPrediction;
    }
}
