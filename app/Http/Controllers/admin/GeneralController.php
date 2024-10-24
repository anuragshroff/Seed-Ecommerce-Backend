<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function generalSetting(){
        return view('admin.general-setting.index');
    }

    public function media(){
        return view('admin.general-setting.media');
    }


}
