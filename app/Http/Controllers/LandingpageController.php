<?php

namespace App\Http\Controllers;

use App\Facades\LoggerFacade;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index()
    {
        // get few samples of product

        $products = Product::inRandomOrder()->take(5)->with(['Category', 'Rating'])->get();
        LoggerFacade::writeln($products);


        return view('landingpage.index', [
            'title' => 'Landingpage',
            'products' => $products
        ]);
    }
}
