<?php

namespace App\Http\Controllers\land_detail;

use App\Helper\SettingHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\LandDetailRequest;
use App\Models\land\land_owner;
use App\Models\land_detail\land_detail;
use Illuminate\Contracts\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class LandDetailController extends Controller
{
    public function create(land_owner $land_owner, SettingHelper $helper): View
    {
        $data = $helper->getSetting(['land_type']);
        return view('land_owner_detail.land_detail_add', ['land_owner' => $land_owner, 'land_types' => $data['land_type']]);
    }

    public function store(LandDetailRequest $request, land_owner $land_owner)
    {
        // dd($request->kitta_no);
        if ($request->region_id == '') {
            Alert::error('कृपया क्षेत्र छान्नुहोस्');
            return redirect()->back();
        }

        foreach ($request->kitta_no as $land_type_id => $kitta_no) {
            foreach ($kitta_no as $key => $value) {
                if ($request->has('is_bajho')) {
                    if (isset($request->is_bajho[$land_type_id])) {
                        if (isset($request->is_bajho[$land_type_id][$key])) {
                            $is_bajho = 1;
                        } else {
                            $is_bajho = 0;
                        }
                    } else {
                        $is_bajho = 0;
                    }
                } else {
                    $is_bajho = 0;
                }

                if ($request->has('is_charan_kharka')) {
                    if (isset($request->is_charan_kharka[$land_type_id])) {
                        if (isset($request->is_charan_kharka[$land_type_id][$key])) {
                            $is_charan_kharka = 1;
                        } else {
                            $is_charan_kharka = 0;
                        }
                    } else {
                        $is_charan_kharka = 0;
                    }
                } else {
                    $is_charan_kharka = 0;
                }
                $data = [
                    'land_owner_id' => $land_owner->id,
                    'region_id' => $request->region_id,
                    'kitta_no' => $value,
                    'area1' => $request->area1[$land_type_id][$key],
                    'area2' => $request->area2[$land_type_id][$key],
                    'area3' => $request->area3[$land_type_id][$key],
                    'bargha_area' => $request->bargha_area[$land_type_id][$key],
                    'remark' => $request->remark[$land_type_id][$key],
                    'is_bajho' => $is_bajho,
                    'is_charan_kharka' => $is_charan_kharka,
                    'cultivable_area' => $request->cultivable_area,
                    'cultivated_area' => $request->cultivated_area,
                    'total_area' => $request->total_area,
                    'irrigation_facility' => $request->irrigation_facility,
                    'irrigation_area' => $request->irrigation_area,
                    'unirrigation_area' => $request->unirrigation_area,
                    'irrigation_type_id' => $request->irrigation_type_id,
                    'road_facility' => $request->road_facility,
                ];

                if ($request->region_id) {
                    if ($request->area1[$land_type_id][$key] != '' || $request->area2[$land_type_id][$key] != '' || $request->area3[$land_type_id][$key] != '') {
                        land_detail::create($data);
                    }
                } else {
                    if ($request->area1[$land_type_id][$key] != '' || $request->area2[$land_type_id][$key] != '' || $request->area3[$land_type_id][$key] != '' || $request->area4[$land_type_id][$key] != '') {
                        land_detail::create($data + ['area4' => $request->area4[$land_type_id][$key]]);
                    }
                }
            }
        }

        return redirect()->route('land-owner.index');
    }
}
