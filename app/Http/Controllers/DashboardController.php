<?php

namespace App\Http\Controllers;

use App\Facades\LoggerFacade;
use App\Models\Product;
use Symfony\Component\Console\Output\ConsoleOutput;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::inRandomOrder()->take(5)->with(['Category', 'Rating'])->get();

        return view('dashboard.index', [
            'products' => $products
        ]);
    }
}
