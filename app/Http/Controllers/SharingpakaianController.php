<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SharingpakaianController extends Controller
{
    public function index()
    {
        return view('sharingpakaian.index', [
            'title' => 'Sharingpakaian'
        ]);
    }
}
