<?php

$site_type = "गाउँ";
$district = "ताप्ली";

return [
    "ROUTE_STRING" => "App\Http\Controllers\setting",
    "DISTRICT" => $district,
    "SITE_MUN_NAME" => $district . " ". $site_type . " पालिका",
    "SITE_TYPE" => $site_type . " कार्यपालिकाको कार्यालय",
    "SITE_PROVINCE" => "प्रदेश नं १",
    "SITE_ADDRESS" => $district. ",नेपाल",
    "PUBLICATION_PATH" => "public/publication",
    "NOTICE_PATH" => "public/notice/",
    "CROP_PATH" => "storage/crop/",
    "FOOD_PATH" => "storage/food/",
    "AGRICULTURE_TECHNOLOGY_PATH" => "public/agriculture_technology/",
    "BASE_PATH" => url('/')
];
