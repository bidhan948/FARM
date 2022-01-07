<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\detail\agriculture_animal_detail;
use App\Models\setting\crop_type;
use Illuminate\Http\Request;

class FarmMobileAssetController extends Controller
{
    public function index()
    {
        $crops = crop_type::query()
        ->select('id', 'name as title', 'image as featured_image')
        ->whereNotNull('image')
        ->get();

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
            'child' => null
        ];

        $data['website'][] = [
            'title' => 'सम्पर्क',
            'url' => route('dashboard.contact_us'),
            'icon' => asset('farm/contact.png'),
            'is_button' => true,
            'child' => null
        ];

        $data['website'][] = [
            'title' => 'सूचना',
            'url' => route('dashboard.notice'),
            'icon' => asset('farm/notice.png'),
            'is_button' => false,
            'child' => null
        ];

        $data['website'][] = [
            'title' => 'प्रकाशन',
            'url' => route('dashboard.publication'),
            'icon' => asset('farm/publication.png'),
            'is_button' => true,
            'child' => null
        ];

        $data['website'][] = [
            'title' => 'कृषि तथा पशुपंक्षी सम्बन्धि आधारभुत जानकारी',
            'url' => "http://192.168.1.112:8000/agriculture-animal",
            'storage_url' => asset(config('constant.CROP_PATH')),
            'icon' => asset('farm/farm-animal.png'),
            'is_button' => false,
            'child' => agriculture_animal_detail::query()
                ->select('id', 'title', 'featured_image')
                ->get()
        ];

        $data['website'][] = [
            'title' => 'कृषि प्रबिधि',
            'url' => "http://192.168.1.112:8000/agriculture-technology",
            'storage_url' => asset(config('constant.FOOD_PATH')),
            'icon' => asset('farm/fram-technology.png'),
            'is_button' => false,
            'child' => $crops
        ];

        $data['website'][] = [
            'title' => 'बारम्बार सोधिने प्रश्नहरु',
            'url' => "http://192.168.1.112:8000/general-question",
            'storage_url' => asset(config('constant.FOOD_PATH')),
            'icon' => asset('farm/question.png'),
            'is_button' => false,
            'child' => $crops
        ];

        $data['website'][] = [
            'title' => 'कृषि तथा पशुपंक्षी बिमा जानकारी',
            'url' => route('dashboard.insurance'),
            'icon' => asset('farm/insurance.png'),
            'is_button' => true,
            'child' => null
        ];

        return response()->json($data, 200);
    }
}
