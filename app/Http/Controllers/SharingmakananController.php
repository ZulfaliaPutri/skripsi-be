<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SharingmakananController extends Controller
{
    public function index()
    {
        return view('sharingmakanan.index', [
            'title' => 'Sharingmakanan'
        ]);
    }
}
