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
        $selectedProduct = Product::where("id", $id)->with(['Category', 'Rating', 'Seller', 'Food', 'Clothes'])->first();
        if ($selectedProduct === null) {
            return view('produk.notfound', []);
        }
        $selectedProduct->view_count = $selectedProduct->view_count + 1;
        $selectedProduct->save();

        LoggerFacade::writeln($selectedProduct);

        $selectedProduct->rating = Helpers::getRatings($selectedProduct->rating);

        $productRecommendations = Product::inRandomOrder()->take(12)->with(['Category', 'Rating'])->get();
        foreach ($productRecommendations as $product) {
            $rating = Helpers::getRatings($product->rating);
            $product->rating = $rating;
        }

        if ($selectedProduct->clothes) {
            $type = 2;
        } else if ($selectedProduct->food) {
            $type = 1;
        }

        return view('produk.index', [
            'title' => 'Produk',
            'product' => $selectedProduct,
            'type' => $type,
            'productRecommendations' => $productRecommendations,
        ]);
    }
}
