<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
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

        $ownedProducts = Product::where("seller_id", $seller->id)->has("Food")->with(["Food"])->get();
        $products = array();

        foreach ($ownedProducts as $product) {
            $product->regency = Helpers::getRegencyString($product->regency);
            array_push($products, $product);
        }

        return view('sharingmakanan.index', [
            'title' => 'Sharingmakanan',
            'ownedProducts' => $products,
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
        $product->regency = $request->regency;

        $food = new Food();
        $food->expired_day_count = $request->expired_day_count;

        $img = $request->file("image");
        if ($img != null) {
            $fileName = date('YmdHi') . $img->getClientOriginalName();
            $img->move(public_path("public/images"), $fileName);
            $product->image_path = $fileName;
        }

        $seller->product()->save($product);
        $product->food()->save($food);

        $ownedProducts = Product::where("seller_id", $seller->id)->has("food")->with(["Food"])->get();

        return view('sharingmakanan.index', [
            'title' => 'Sharingmakanan',
            'ownedProducts' => $ownedProducts,
        ]);
    }
}
