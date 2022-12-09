<?php

namespace App\Http\Controllers;

use App\Facades\LoggerFacade;
use App\Models\Product;
use Illuminate\Http\Request;

class RekomendasilandingController extends Controller
{
    public function index()
    {
        $products = Product::inRandomOrder()->take(25)->with(['Category', 'Rating'])->get();

        return view('rekomendasilanding.index', [
            'title' => 'Rekomendasilanding',
            "products" => $products
        ]);
    }
}
