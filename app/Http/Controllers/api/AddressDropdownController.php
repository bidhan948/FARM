<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\setting\district;
use App\Models\setting\municipality;
use App\Models\setting\province;
use Illuminate\Http\Request;

class AddressDropdownController extends Controller
{
    public function province(Request $request)
    {
        $data['provinces'] = province::all();

        if ($request['province_id'] != "") {
            $data['districts'] = district::where('ProvinceId', $request['province_id'])->get();
        }
        
        if ($request['district_id'] != "") {
            $data['municipalities'] = municipality::select('id', 'NepaliName')
                ->where('DistrictId', $request['district_id'])
                ->get();
        }
        return response()->json($data, 200);
    }
}
