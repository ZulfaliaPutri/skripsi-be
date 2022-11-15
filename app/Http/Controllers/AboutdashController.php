<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutdashController extends Controller
{
    public function index()
    {
        return view('aboutdash.index', [
            'title' => 'Aboutdash'
        ]);
    }
}
