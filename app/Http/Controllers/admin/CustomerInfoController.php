<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerInfoController extends Controller
{
    public function customerInfo(){
        return view('admin.customer-info.index');
    }
}
