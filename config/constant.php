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
    "CROP_PATH" => "storage/crop/",
];
