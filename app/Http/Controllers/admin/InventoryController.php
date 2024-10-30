<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    public function stock(){
        //$all_stock_product = Product::where('quantity', '>', 0)->with('order_attributes')->get();

        $all_stock_product = Product::where('quantity', '>', 0)->with(['order_attributes' => function($query) {
            $query->select('product_id', DB::raw('SUM(quantity) as total_quantity'))
                  ->groupBy('product_id');
        }])->get();

        
        return view('admin.stock.index', compact('all_stock_product'));
    }

    public function stockOutProduct(){

        $all_stockout_product = Product::where('quantity', '=', 0)->with(['order_attributes' => function($query) {
            $query->select('product_id', DB::raw('SUM(quantity) as total_quantity'))
                  ->groupBy('product_id');
        }])->get();
       
        return view('admin.stock.stock-out', compact('all_stockout_product'));
    }

    public function upcomingStockOut(){

        $stock_alert = getGeneralSetting()->stock_alert;

        $upcoming_stockout_product = Product::where('quantity', '=<', $stock_alert)->where('quantity', '!=', 0)->with(['order_attributes' => function($query) {
            $query->select('product_id', DB::raw('SUM(quantity) as total_quantity'))
                  ->groupBy('product_id');
        }])->get();

        return view('admin.stock.upcoming-stockout', compact('upcoming_stockout_product'));
    }
}
