<?php

namespace App\Http\Controllers;

use App\Facades\LoggerFacade;
use App\Models\Food;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SharingmakananController extends Controller
{
    public function index()
    {
        $seller = Seller::where("user_id", Auth::user()->id)->first();
        if (!$seller) {
            return view('sharingmakanan.index', [
                'title' => 'Sharingmakanan'
            ]);
        }

        $ownedProducts = Product::where("seller_id", $seller->id)->has("food")->with(["Food"])->get();

        return view('sharingmakanan.index', [
            'title' => 'Sharingmakanan',
            'ownedProducts' => $ownedProducts,
        ]);
    }

    // tanggung jawab untuk simpen makanan
    public function store(Request $request)
    {
        $seller = Seller::where("user_id", Auth::user()->id)->first();
        if (!$seller) {
            $seller = new Seller();
            $seller->store_name = Auth::user()->name . "'s store";
            $seller->user_id = Auth::user()->id;
            $seller->save();
        }


        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->view_count = 0;

        $food = new Food();
        $food->expired_day_count = $request->expired_day_count;

        $seller->product()->save($product);
        $product->food()->save($food);

        $ownedProducts = Product::where("seller_id", $seller->id)->has("food")->with(["Food"])->get();

        return view('sharingmakanan.index', [
            'title' => 'Sharingmakanan',
            'ownedProducts' => $ownedProducts,
        ]);
    }
}
