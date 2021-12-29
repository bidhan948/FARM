<?php

namespace App\Http\Controllers\facility;

use App\Helper\SettingHelper;
use App\Http\Controllers\Controller;
use App\Models\facility\facility_detail;
use App\Models\land\land_owner;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FacilityDetailController extends Controller
{
    public function create(land_owner $land_owner, SettingHelper $helper): View
    {
        abort_if(facility_detail::query()->where('land_owner_id', $land_owner->id)->count() != 0, 403);

        $data = $helper->getSetting(['gov_non_gov_facility', 'helping_organization']);
        return view('facility.facility_detail_add', [
            'gov_non_gov_facilities' => $data['gov_non_gov_facility'],
            'helping_organizations' => $data['helping_organization'],
            'land_owner' => $land_owner
        ]);
    }

    public function store(Request $request, land_owner $land_owner): RedirectResponse
    {
        dd($request->all());
        foreach ($request->is_facility as $facility_id => $is_facility) {
            
        }
    }
}
