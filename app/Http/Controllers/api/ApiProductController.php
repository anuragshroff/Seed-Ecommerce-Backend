<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    //

    public function specificProduct($id)
    {
        $product = Product::where('id', $id)->get();

        return $product;
    }


    public function allProduct()
    {

        $all_products = Product::latest()->get();
        return  $all_products;
    }
    public function setting()
    {
        $setting = Setting::first();

        return  $setting;
    }
}
