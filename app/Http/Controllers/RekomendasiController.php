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
use Illuminate\Log\Logger;
use PHPJuice\Slopeone\Algorithm;
use Illuminate\Support\Facades\Auth;
use Jacobemerick\KMeans\KMeans;
use Phpml\Math\Distance\Euclidean;

class RekomendasiController extends Controller
{

    private static $DEBUG_USER_REGENCY = 1;

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

        if (!Auth::check()) {
            $noFilter = false;
        }

        if (!empty($request->get('closest'))) {
            $noFilter = false;
        }

        if ($noFilter) {
            $ratedItems = Rating::where("user_id", Auth::user()->id)->get();
            if ($ratedItems->isEmpty()) {
                $products = $products->get();
                $finalProducts = array();

                foreach ($products as $product) {
                    $rating = Helpers::getRatings($product->rating);
                    $product->rating = $rating;
                    $product->regencyDistance = Helpers::getRegencyDistanceByCode(self::$DEBUG_USER_REGENCY, $product->regency);
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
                $theProduct = Product::with(["Category", "Rating"])->where("id", $toRecommend->product_id)->first();
                $toShowProducts[$final] = $theProduct;
            }
            krsort($toShowProducts);

            $productIds = array();
            foreach ($toShowProducts as $key => $val) {
                array_push($productIds, $key);
            }

            $finalToShowProducts = array();
            foreach ($toShowProducts as $key => $product) {
                $rating = Helpers::getRatings($product['rating']);
                $product->rating = $rating;
                $product->regencyDistance = Helpers::getRegencyDistanceByCode(self::$DEBUG_USER_REGENCY, $product->regency);
                $product->score = $key;
                array_push($finalToShowProducts, $product);
            }

            $otherProducts = Product::with(["Category", "Rating"])->whereNotIn("id", $productIds)->get();
            $finalNormalProducts = array();

            // artinya belum ada produk yang pernah di rating sama sekali
            // return saja seperit biasa
            if (count($finalToShowProducts) == 0) {
                foreach ($otherProducts as $product) {
                    $rating = Helpers::getRatings($product->rating);
                    $product->rating = $rating;
                    $product->regencyDistance = Helpers::getRegencyDistanceByCode(self::$DEBUG_USER_REGENCY, $product->regency);
                    array_push($finalNormalProducts, $product);
                }

                return view('rekomendasi.index', [
                    'title' => 'Rekomendasi',
                    "productsRecommended" => $finalToShowProducts,
                    "products" => $finalNormalProducts
                ]);
            } else {
                $contentBased = array();
                foreach ($otherProducts as $product) {
                    $rating = Helpers::getRatings($product->rating);
                    $product->rating = $rating;
                    $product->regencyName = Helpers::getRegencyString($product->regency);
                    $product->regencyDistance = Helpers::getRegencyDistanceByCode(self::$DEBUG_USER_REGENCY, $product->regency);
                    if ($rating == null) {
                        foreach ($finalToShowProducts as $slopeOneProduct) {
                            if ($product->category_id == $slopeOneProduct->category_id) {
                                $product->rating = $slopeOneProduct->rating;
                                array_push($contentBased, $product);
                                break;
                            }
                        }
                    }
                    array_push($finalNormalProducts, $product);
                }

                usort($contentBased, function ($a, $b) {
                    return $a->rating > $b->rating;
                });

                return view('rekomendasi.index', [
                    'title' => 'Rekomendasi',
                    "productsRecommended" => $finalToShowProducts,
                    "productsContentBased" => $contentBased,
                    "products" => $finalNormalProducts
                ]);
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

        if (!empty($request->get('closest'))) {
            $productsWithRegency = array();
            $productsWithoutRegency = array();
            $user = Auth::user();

            foreach ($products as $product) {
                if ($product['regency'] != null) {
                    LoggerFacade::writeln("bro");
                    $product->regencyName = Helpers::getRegencyString($product->regency);
                    $product->distance = Helpers::getRegencyDistanceByCode($user->regency, $product->regency);
                    array_push($productsWithRegency, $product);
                    continue;
                }
                array_push($productsWithoutRegency, $product);
            }

            usort($productsWithRegency, function ($item1, $item2) {
                if ($item1->distance == $item2->distance) {
                    return 0;
                }
                return ($item1->distance < $item2->distance) ? -1 : 1;
            });

            $finalWithRegencyProducts = array_merge($productsWithRegency, $productsWithoutRegency);
            return view('rekomendasi.index', [
                'title' => 'Rekomendasi',
                "products" => $finalWithRegencyProducts
            ]);
        }

        return view('rekomendasi.index', [
            'title' => 'Rekomendasi',
            "products" => $finalProducts
        ]);
    }
}
