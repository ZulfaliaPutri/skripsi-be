<?php

namespace App\Http\Controllers;

use App\Facades\LoggerFacade;
use App\Helpers\Helpers;
use App\Models\Clothes;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SharingpakaianController extends Controller
{
    public function index()
    {
        $seller = Seller::where("user_id", Auth::user()->id)->first();
        if (!$seller) {
            return view('sharingpakaian.index', [
                'title' => 'Sharingmakanan'
            ]);
        }

        $ownedProducts = Product::where("seller_id", $seller->id)->has("Clothes")->with(["Clothes"])->get();
        $products = array();

        foreach ($ownedProducts as $product) {
            $product->regency = Helpers::getRegencyString($product->regency);
            array_push($products, $product);
        }

        return view('sharingpakaian.index', [
            'title' => 'Sharingpakaian',
            'ownedProducts' => $products,
        ]);
    }

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

        $img = $request->file("image");
        if ($img != null) {
            $fileName = date('YmdHi') . $img->getClientOriginalName();
            $img->move(public_path("public/images"), $fileName);
            $product->image_path = $fileName;
        }

        $clothes = new Clothes();
        $clothes->sleeve_type = $request->sleeve_type;
        $clothes->size = $request->size;
        $clothes->material = $request->material;

        $seller->product()->save($product);
        $product->clothes()->save($clothes);

        $ownedProducts = Product::where("seller_id", $seller->id)->has("Clothes")->with(["Clothes"])->get();

        return view('sharingpakaian.index', [
            'title' => 'Sharingpakaian',
            'ownedProducts' => $ownedProducts,
        ]);
    }
}
