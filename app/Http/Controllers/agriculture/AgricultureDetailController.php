<?php

namespace App\Http\Controllers\agriculture;

use App\Helper\SettingHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\AgricultureDetailRequest;
use App\Models\agriculture\agriculture_detail;
use App\Models\agriculture\seed_detail;
use App\Models\land\land_owner;
use App\Models\setting\crop_type;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class AgricultureDetailController extends Controller
{
    public function create(land_owner $land_owner, SettingHelper $helper): View
    {
        // abort_if(land_owner::where('id', $land_owner->id)->has('agricultureDetail')->get()  != null, 403);
        $data = $helper->getSetting(['crop_area', 'crop', 'seed_supplier', 'seed_source']);
        $crop_types = crop_type::query()->with('Crop')->get();

        return view('agriculture.agriculture_add', [
            'land_owner' => $land_owner,
            'crop_types' => $crop_types,
            'crop_areas' => $data['crop_area'],
            'crops' => $data['crop'],
            'seed_suppliers' => $data['seed_supplier'],
            'seed_sources' => $data['seed_source'],
        ]);
    }

    public function store(AgricultureDetailRequest $request, land_owner $land_owner)
    {
        // abort_if(land_owner::where('id', $land_owner->id)->has('agricultureDetail')->get()  != null, 403);
        DB::transaction(function () use ($request,$land_owner) {
            foreach ($request->crop_id as $crop_type_id => $crop_arr) {
                foreach ($crop_arr as $key => $crop) {

                    $total_area = $request->area1[$crop_type_id][$key] +
                        $request->area2[$crop_type_id][$key] +
                        $request->area3[$crop_type_id][$key] +
                        $request->area4[$crop_type_id][$key];
                    if ($crop != null) {
                        agriculture_detail::create(
                            [
                                'land_owner_id' => $land_owner->id,
                                'crop_type_id' => $crop_type_id,
                                'crop_id' => $crop,
                                'area1' => $request->area1[$crop_type_id][$key],
                                'area2' => $request->area2[$crop_type_id][$key],
                                'area3' => $request->area3[$crop_type_id][$key],
                                'area4' => $request->area4[$crop_type_id][$key],
                                'total_area' => $total_area,
                                'total_production' => $request->total_production[$crop_type_id][$key],
                            ]
                        );
                    }
                }
            }

            foreach ($request->seed_supplier_id as $seed_detail) {
                seed_detail::create(
                    [
                        'land_owner_id' => $land_owner->id,
                        'seed_supplier_id' => $seed_detail,
                        'seed_source_id' => $request->seed_source_id,
                    ]
                );
            }
        });

        toast("कृषि बिबरण हाल्न सफल भयो ", "success");
        return redirect()->route('land-owner.index');
    }

    public function show(land_owner $land_owner, SettingHelper $helper): View
    {
        abort_if(land_owner::where('id', $land_owner->id)->has('agricultureDetail')->get() == null, 403);

        $data = $helper->getSetting(['crop_area']);
        $crop_types = crop_type::query()->whereHas('agricultureDetail')->with('agricultureDetail')->get();
        $agriculture_details = agriculture_detail::query()->with('cropType', 'crop')->get();
        $seed_details = seed_detail::query()->with('seedSource', 'seedSupplier')->get();

        return view(
            'agriculture.agriculture_show',
            [
                'land_owner' => $land_owner,
                'crop_areas' => $data['crop_area'],
                'crop_types' => $crop_types,
                'agriculture_details' => $agriculture_details,
                'seed_details' => $seed_details,
            ]
        );
    }
}
