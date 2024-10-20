<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function stock(){
        return view('admin.stock.index');
    }

    public function stockOutProduct(){
        return view('admin.stock.stock-out');
    }

    public function upcomingStockOut(){
        return view('admin.stock.upcoming-stockout');
    }
}
