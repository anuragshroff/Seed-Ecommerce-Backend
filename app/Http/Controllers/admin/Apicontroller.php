<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Apicontroller extends Controller
{
    public function couriarApi(){
        return view('admin.api.index');
    }
}
