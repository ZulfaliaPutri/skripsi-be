<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClothesController extends Controller
{
    public function index()
    {
        return view('clothes.index', [
            'title' => 'Clothes'
        ]);
    }
}
