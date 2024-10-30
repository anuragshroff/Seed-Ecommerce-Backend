<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSettingsRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function generalSetting(){
        $setting = Setting::first();
        return view('admin.general-setting.index', compact('setting'));
    }

    public function media(){
        return view('admin.general-setting.media');
    }

    public function store(StoreSettingsRequest $request){
        Setting::updateOrCreate(
            ['id' => 1], // Assuming you have a single settings record
            $request->validated() // Automatically validated data
        );
        return redirect()->back()->with('success', 'Settings saved successfully.');

    }


}
