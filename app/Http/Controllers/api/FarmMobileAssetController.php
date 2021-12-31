<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FarmMobileAssetController extends Controller
{
    public function index()
    {
        $data['heading'] = [
            'SITE_MUN_NAME' => config("constant.SITE_MUN_NAME"),
            'SITE_TYPE' => config("constant.SITE_TYPE"),
            'SITE_PROVINCE' => config("constant.SITE_PROVINCE"),
            'SITE_ADDRESS' => config("constant.SITE_ADDRESS"),
        ];

        $data['website'][] = [
            'title' => 'about_us',
            'url' => route('dashboard.about_us'),
            'icon' => asset('farm/about.png'),
            'is_button' => true
        ];
        
        $data['website'][] = [
            'title' => 'contact_us',
            'url' => route('dashboard.contact_us'),
            'icon' => asset('farm/contact.png'),
            'is_button' => true
        ];

        return response()->json($data, 200);
    }
}
