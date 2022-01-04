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
            'title' => 'हाम्रो बारेमा',
            'url' => route('dashboard.about_us'),
            'icon' => asset('farm/about.png'),
            'is_button' => true,
            'is_child' => false
        ];

        $data['website'][] = [
            'title' => 'सम्पर्क',
            'url' => route('dashboard.contact_us'),
            'icon' => asset('farm/contact.png'),
            'is_button' => true,
            'is_child' => false
        ];

        $data['website'][] = [
            'title' => 'सूचना',
            'url' => route('dashboard.notice'),
            'icon' => asset('farm/notice.png'),
            'is_button' => false,
            'is_child' => false
        ];

        $data['website'][] = [
            'title' => 'प्रकाशन',
            'url' => route('dashboard.publication'),
            'icon' => asset('farm/publication.png'),
            'is_button' => true,
            'is_child' => false
        ];

        $data['website'][] = [
            'title' => 'कृषि तथा पशुपंक्षी सम्बन्धि आधारभुत जानकारी',
            'url' => route('dashboard.animal_agriculture'),
            'icon' => asset('farm/farm-animal.png'),
            'is_button' => false,
            'is_child' => true,
            'child' => [[
                'title' => 'प्रकाशन',
                'url' => route('dashboard.publication'),
                'icon' => asset('farm/publication.png'),
                'is_button' => true,
            ]]
        ];

        return response()->json($data, 200);
    }
}
