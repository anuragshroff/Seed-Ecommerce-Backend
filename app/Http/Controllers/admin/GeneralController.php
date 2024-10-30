<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSettingsRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;

class GeneralController extends Controller
{

    use FileUploadTrait;

    public function generalSetting()
    {
        $setting = Setting::first();
        return view('admin.general-setting.index', compact('setting'));
    }

    public function media()
    {
        return view('admin.general-setting.media');
    }

    public function store(StoreSettingsRequest $request)
    {
        Setting::updateOrCreate(
            ['id' => 1], // Assuming you have a single settings record
            $request->validated() // Automatically validated data
        );
        return redirect()->back()->with('success', 'Settings saved successfully.');
    }

    public function uploadMedia(Request $request)
    {

        $validatedData = $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePaths = [];
        foreach (['logo', 'favicon'] as $image) {
            if ($request->hasFile($image)) {
                // Save the uploaded file and store the path
                $imagePaths[$image] = $this->uploadFile($request, $image);
            }
        }

        // Update validated data with the saved paths
        $validatedData['logo'] = $imagePaths['logo'] ?? null;
        $validatedData['favicon'] = $imagePaths['favicon'] ?? null;


        // Save settings with updated data
        Setting::updateOrCreate(
            ['id' => 1], // Assuming there's a single settings record
            $validatedData
        );



        return redirect()->back()->with('success', 'Settings saved successfully.');
    }

    public function marketing(){
        return view('admin.marketing.index');
    }
}
