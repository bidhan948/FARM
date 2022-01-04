<?php

namespace App\Helper;

use Illuminate\Support\Str;

class MediaHelper
{

    public function uploadSingleImage($image, $folder = "crop")
    {
        $orginalName = Str::before($image->getClientOriginalName(), '.');
        $imageName =  $orginalName . "-" . Str::random(10) . "." . $image->extension();
        $image->storeAs($folder, $imageName, 'public');
        return $imageName;
    }

    public function uploadMultipleImage($image, $folder = "notice")
    {
        foreach ($image as $key => $value) {
            $orginalName = Str::before($value->getClientOriginalName(), '.');
            $imageName =  $orginalName . "-" . Str::random(10) . "." . $value->extension();
            $value->storeAs($folder, $imageName, 'public');
            $photo[] = $imageName;
        }
        return $photo;
    }
}
