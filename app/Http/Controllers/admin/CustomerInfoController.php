<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerInfoController extends Controller
{
    public function customerInfo(){
        $all_customers = Order::latest()->get();
        return view('admin.customer-info.index', compact('all_customers'));
    }
}
