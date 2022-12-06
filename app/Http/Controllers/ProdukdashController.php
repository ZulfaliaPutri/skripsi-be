<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukdashController extends Controller
{
    public function index()
    {
        return view('produkdash.index', [
            'title' => 'Produkdash'
        ]);
    }
}
