<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    //

    public function specificProduct($slug)
    {
       

        try {
            // Validate the incoming ID
            if (!is_string($slug) || empty($slug)) {
                return response()->json([
                    'error' => 'Invalid product ID provided.'
                ], 400);
            }

            // Retrieve the product
            $product = Product::where('slug', $slug)->first();

            // Ensure the product was found
            if (!$product) {
                return response()->json([
                    'error' => 'Product not found.'
                ], 404);
            }

            // Return the product data as JSON
            return response()->json($product);
        } catch (\Exception $error) {
            // Log the error and return a generic error message
            dd($error->getMessage());
            return response()->json([
                'error' => 'An error occurred while retrieving the product.'
            ], 500);
        }
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
