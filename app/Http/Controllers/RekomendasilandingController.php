<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekomendasilandingController extends Controller
{
    public function index()
    {
        return view('rekomendasilanding.index', [
            'title' => 'Rekomendasilanding'
        ]);
    }
}
