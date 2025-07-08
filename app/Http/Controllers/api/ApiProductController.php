<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('attributeOptions')
            ->when($request->category_id, fn($q) => $q->where('category_id', $request->category_id))
            ->when($request->search, fn($q) => $q->where('name', 'like', '%' . $request->search . '%'))
            ->paginate(20);
        
        return response()->json($products);
    }

    public function show($id)
    {
        $product = Product::with('attributeOptions')->findOrFail($id);
        return response()->json($product);
    }

    public function showBySlug($slug)
    {
        $product = Product::with('attributeOptions')->where('slug', $slug)->firstOrFail();
        return response()->json($product);
    }

    public function featured()
    {
        $products = Product::with('attributeOptions')->where('is_featured', true)->paginate(20);
        return response()->json($products);
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $products = Product::with('attributeOptions')
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->paginate(20);
        
        return response()->json($products);
    }

    public function byCategory($categoryId)
    {
        $products = Product::with('attributeOptions')
            ->where('category_id', $categoryId)
            ->paginate(20);
        
        return response()->json($products);
    }

    public function settings()
    {
        $settings = Setting::first();
        return response()->json($settings);
    }

    // Legacy methods
    public function specificProduct($slug)
    {
        return $this->showBySlug($slug);
    }

    public function allProduct()
    {
        return $this->index(request());
    }

    public function setting()
    {
        return $this->settings();
    }
}
