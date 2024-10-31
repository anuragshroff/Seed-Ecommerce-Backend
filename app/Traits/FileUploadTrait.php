<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

trait FileUploadTrait
{
    function uploadFile(Request $request, string|UploadedFile $file, ?string $oldPath = null, string $path = '/uploads') : string
    {
        if (is_string($file)) {
            $file = $request->file($file);
        }

        if ($file instanceof UploadedFile) {
            $ext = $file->getClientOriginalExtension();
            $fileName = 'media_' . uniqid() . '.' . $ext;
            $file->move(public_path($path), $fileName);

            return $path . '/' . $fileName;
        }

        return '';
    }
}
