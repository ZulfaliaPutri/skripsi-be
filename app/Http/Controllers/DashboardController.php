<?php

namespace App\Http\Controllers;

use App\Facades\LoggerFacade;
use App\Helpers\Helpers;
use App\Models\Product;
use Symfony\Component\Console\Output\ConsoleOutput;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::inRandomOrder()->take(5)->with(['Category', 'Rating'])->get();

        foreach ($products as $product) {
            $rating = Helpers::getRatings($product->rating);
            $product->rating = $rating;
        }

        return view('dashboard.index', [
            'products' => $products
        ]);
    }
}
