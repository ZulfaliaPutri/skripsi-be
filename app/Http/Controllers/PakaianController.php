<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PakaianController extends Controller
{
    public function index()
    {
        return view('pakaian.index', [
            'title' => 'Pakaian'
        ]);
    }
}
