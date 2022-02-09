<?php

$site_type = "गाउँ";
$district = "ताप्ली";

/*********************************************************PRODUCTION****************************************************/
// return [
//     "ROUTE_STRING" => "App\Http\Controllers\setting",
//     "DISTRICT" => $district,
//     "SITE_MUN_NAME" => $district . " ". $site_type . " पालिका",
//     "SITE_TYPE" => $site_type . " कार्यपालिकाको कार्यालय",
//     "SITE_PROVINCE" => "प्रदेश नं १",
//     "SITE_ADDRESS" => $district. ",नेपाल",
//     "PUBLICATION_PATH" => "public/publication",
//     // "NOTICE_PATH"=> url('/')."FARM/public/storage/notice/",
//     "CROP_PATH" => url('/')."/laravel/storage/app/public/crop/",
//     "FOOD_PATH" => "storage/food/",
//     "AGRICULTURE_TECHNOLOGY_PATH" => "public/agriculture_technology/",
// ];

return [
    "ROUTE_STRING" => "App\Http\Controllers\setting",
    "DISTRICT" => $district,
    "SITE_MUN_NAME" => $district . " ". $site_type . " पालिका",
    "SITE_TYPE" => $site_type . " कार्यपालिकाको कार्यालय",
    "SITE_PROVINCE" => "प्रदेश नं १",
    "SITE_ADDRESS" => $district. ",नेपाल",
    "PUBLICATION_PATH" => "public/publication",
    "NOTICE_PATH"=> env('BASE_PATH')."FARM/public/storage/notice/",
    "CROP_PATH" => env('BASE_PATH')."/laravel/storage/app/public/crop/",
    "FOOD_PATH" => "storage/food/",
    "AGRICULTURE_TECHNOLOGY_PATH" => "public/agriculture_technology/",
];
