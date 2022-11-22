<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use PHPJuice\Slopeone\Algorithm;
use App\Models\User;

class RekomendasiController extends Controller
{
    public function index()
    {
        return view('rekomendasi.index', [
            'title' => 'Rekomendasi'
        ]);
    }

    public function test()
    {
        // data: array
        //data: array tu maksudku buat variabel yg namanya data tipenya array
        // foreach User::all() as user:
        //   userRating: array
        //   foreach userRatings as rating:
        //     // TODO : Buat men associative array, bentuknya: 'key' => value, (key itu product id, value itu rating)
        //  $userRating[key] = value
        //   push userRating ke dalam array data

        $data = [];
        foreach (User::all() as $user) {
            $userRating = [];
            foreach ($user->rating as $rating) {
                $userRating[$rating->product_id] = $rating->rating / 10;
            }
            array_push($data, $userRating);
        }

        dd($data);

        $slopeone = new Algorithm();
        $slopeone->update($data);
        $slopeone->predict($data);
    }
}
