<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    use FileUploadTrait;


    public function profileSetting()
    {
        return view('admin.profile.index');
    }

    public function profileUpdate(UpdateProfileRequest $request)
    {

        $user = Auth::user();
        $imagePath = $this->uploadFile($request, 'image');

        $validatedData = $request->validated();


        if ($imagePath) {

            if ($user->image) {
                // Delete the old image from the public directory
                $oldImagePath = public_path($user->image); // Full path of the old image

                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }
            }

            $validatedData['image'] = $imagePath;
        }


        $user->update($validatedData);

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function passwordUpdate(UpdatePasswordRequest $request)
    {
      
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password updated successfully.');
    }
}
