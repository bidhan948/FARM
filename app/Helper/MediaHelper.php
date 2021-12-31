<?php

namespace App\Helper;

use Illuminate\Support\Str;

class MediaHelper
{

    public function uploadMultipleImage($image, $folder = "")
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
