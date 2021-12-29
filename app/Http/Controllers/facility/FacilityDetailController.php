<?php

namespace App\Http\Controllers\facility;

use App\Helper\SettingHelper;
use App\Http\Controllers\Controller;
use App\Models\facility\anundan_detail;
use App\Models\facility\facility_detail;
use App\Models\facility\helping_organization_detail;
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
        abort_if(facility_detail::query()->where('land_owner_id', $land_owner->id)->count() != 0, 403);

        foreach ($request->is_facility as $facility_id => $is_facility) {
            facility_detail::create(
                [
                    'land_owner_id' => $land_owner->id,
                    'facility_id' => $facility_id,
                    'is_facility' => $is_facility[0],
                ]
            );
        }

        $facility_detail = facility_detail::query()
            ->where('land_owner_id', $land_owner->id)
            ->where('facility_id', 5)
            ->first();

        if ($facility_detail->is_facility) {
            anundan_detail::create(
                [
                    'land_owner_id' => $land_owner->id,
                    'facility_detail_id' => $facility_detail->id,
                    'anudan_detail' => $request->anudan_bibaran
                ]
            );
        }

        foreach ($request->helping_organization_id as $key => $helping_organization_id) {
            helping_organization_detail::create(
                [
                    'land_owner_id' => $land_owner->id,
                    'helping_organization_id' => $helping_organization_id
                ]
            );
        }

        toast("सरकारी तथा गैरसरकारी विवरण विवरण थप्न सफल भयो", "success");
        return redirect()->route('land-owner.index');
    }

    public function show(land_owner $land_owner): View
    {
        abort_if(facility_detail::query()->where('land_owner_id', $land_owner->id)->count() == 0, 403);
        
        $facility_details = facility_detail::query()
            ->where('land_owner_id', $land_owner->id)
            ->with('Facility', 'anudanDetail')
            ->get();

        $helping_organization_details = helping_organization_detail::query()
            ->where('land_owner_id', $land_owner->id)
            ->with('helpingOrganization')
            ->get();

        return view('facility.facility_detail_show', [
            'facility_details' => $facility_details,
            'helping_organization_details' => $helping_organization_details,
            'land_owner' => $land_owner 
        ]);
    }
}
