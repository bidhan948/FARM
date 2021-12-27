<?php

namespace App\Http\Controllers\animal;

use App\Helper\SettingHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnimalDetailRequest;
use App\Models\animal\animal_detail;
use App\Models\animal\animal_other_detail;
use App\Models\animal\animal_product_detail;
use App\Models\land\land_owner;
use Illuminate\Contracts\View\View;

class AnimalDetailController extends Controller
{
    public function create(land_owner $land_owner, SettingHelper $helper): View
    {
        abort_if(land_owner::where('id', $land_owner->id)->whereHas('animalDetail')->with('animalDetail')->get() != null, 403);

        $data = $helper->getSetting(
            [
                'animal',
                'unit',
                'seed_source'
            ]
        );

        return view(
            'animal.animal_add',
            [
                'animals' => $data['animal'],
                'units' => $data['unit'],
                'seed_sources' => $data['seed_source'],
                'land_owner' => $land_owner
            ]
        );
    }

    public function store(AnimalDetailRequest $request, land_owner $land_owner)
    {
        abort_if(land_owner::where('id', $land_owner->id)->whereHas('animalDetail')->with('animalDetail')->get() != null, 403);

        foreach ($request->animal_id as $key => $animal_id) {
            animal_detail::create(
                [
                    'land_owner_id' => $land_owner->id,
                    'animal_id' => $animal_id,
                    'seed_source_id' => $request->seed_source_id[$key],
                    'total' => $request->total_number[$key]
                ]
            );
        }

        foreach ($request->animal_id_production as $key => $animal_id) {
            animal_product_detail::create(
                [
                    'land_owner_id' => $land_owner->id,
                    'animal_id' => $animal_id,
                    'unit_id' => $request->unit_id[$key],
                    'production' => $request->production[$key]
                ]
            );
        }

        animal_other_detail::create(
            [
                'land_owner_id' => $land_owner->id,
                'is_insurance' => $request->is_insurance,
                'insurance_start_date' => $request->insurance_start_date,
                'insurance_end_date' => $request->insurance_end_date,
                'insurance_amount' => $request->insurance_amount,
                'fish_type' => $request->fish_type
            ]
        );

        toast("पशु जन्य बस्तुहरुको तथ्याङ्ग तथा उत्पादनको विवरण हाल्न सफल भयो", "success");
        return redirect()->route('land-owner.index');
    }

    public function show(land_owner $land_owner): View
    {
        abort_if(land_owner::where('id', $land_owner->id)->whereHas('animalDetail')->with('animalDetail')->get() == null, 403);

        $animal_details = animal_detail::query()->with('Source', 'Animal')->get();
        $animal_product_details = animal_product_detail::query()->with('Animal', 'Unit')->get();
        $animal_other_details = animal_other_detail::query()->get();

        return view(
            'animal.animal_detail_show',
            compact('animal_details', 'animal_product_details', 'animal_other_details', 'land_owner')
        );
    }
}
