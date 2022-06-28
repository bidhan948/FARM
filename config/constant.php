<?php

$site_type = "गाउँ";
$district = "धार्चे  ";

return [
    "ROUTE_STRING" => "App\Http\Controllers\setting",
    "DISTRICT" => $district,
    "SITE_MUN_NAME" => $district . " ". $site_type . " पालिका",
    "SITE_TYPE" => $site_type . " कार्यपालिकाको कार्यालय",
    "SITE_PROVINCE" => "गण्डकी प्रदेश",
    "SITE_ADDRESS" => $district. ",नेपाल",
    "PUBLICATION_PATH" => "public/publication",
    // "NOTICE_PATH" =>"public/notice/",
    "NOTICE_PATH" =>"https://budhiganga.sarathitechnosoft.com.np/laravel/storage/app/public/notice/",
    "CROP_PATH" => env('APP_URL')."/laravel/storage/app/public/crop/",
    "FOOD_PATH" => "storage/food/",
    "AGRICULTURE_TECHNOLOGY_PATH" => "public/agriculture_technology/",
    "BASE_PATH" => env('APP_URL')."/"
];
