<?php

namespace App\Http\Controllers;

use App\Facades\LoggerFacade;
use App\Helpers\Helpers;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index()
    {
        // get few samples of product

        $products = Product::inRandomOrder()->take(5)->with(['Category', 'Rating'])->get();

        foreach ($products as $product) {
            $rating = Helpers::getRatings($product->rating);
            $product->rating = $rating;
        }

        return view('landingpage.index', [
            'title' => 'Landingpage',
            'products' => $products
        ]);
    }
}
