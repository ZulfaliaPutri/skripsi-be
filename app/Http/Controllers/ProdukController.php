<?php

namespace App\Http\Controllers;

use App\Facades\LoggerFacade;
use App\Helpers\Helpers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request, $id)
    {
        $product = Product::where("id", $id)->with(['Category', 'Rating', 'Seller'])->first();
        if ($product === null) {
            return view('produk.notfound', []);
        }

        $productRecommendations = Product::inRandomOrder()->take(12)->with(['Category', 'Rating'])->get();
        foreach ($productRecommendations as $product) {
            $rating = Helpers::getRatings($product->rating);
            $product->rating = $rating;
        }

        return view('produk.index', [
            'title' => 'Produk',
            'product' => $product,
            'productRecommendations' => $productRecommendations,
        ]);
    }
}
