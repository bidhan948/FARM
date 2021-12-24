<?php

namespace App\Http\Controllers\land;

use App\Helper\SettingHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\setting\LandOwnerRequest;
use App\Models\land\land_owner;
use App\Models\land\land_owner_bank_detail;
use App\Models\land\land_owner_family_detail;
use App\Models\land\land_owner_permanent_address;
use App\Models\land\land_owner_temporary_address;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LandController extends Controller
{
    public function index(): View
    {
        $land_owner_details = land_owner::query()
            ->select('id', 'name_nepali', 'name_english', 'contact_no', 'reg_id', 'land_detail_status')
            ->with('landDetail')
            ->get();
        return view('land.land_owner', ['land_owner_details' => $land_owner_details]);
    }

    public function create(): View
    {
        $data = (new SettingHelper())->getSetting(
            [
                'gender',
                'ethnic_group',
                'citizenship_type',
                'business',
                'education_qualification',
                'marital_status'
            ]
        );

        return view('land.land_owner_add', [
            'genders' => $data['gender'],
            'ethnic_groups' => $data['ethnic_group'],
            'citizenship_types' => $data['citizenship_type'],
            'bussinesses' => $data['business'],
            'education_qualifications' => $data['education_qualification'],
            'marital_statuses' => $data['marital_status'],
        ]);
    }

    public function store(LandOwnerRequest $request, SettingHelper $helper): RedirectResponse
    {
        $landOwner = land_owner::create($helper->getLandOwnerDataFromRequest($request->all()));

        foreach ($request->below_18 as $gender_id => $below18) {
            land_owner_family_detail::create(
                [
                    'land_owner_id' => $landOwner->id,
                    'gender_id' => $gender_id,
                    'below_18' => $below18,
                    '18_to_59' => $request->eighteen_to_fiftynine[$gender_id],
                    'above_60' => $request->above_60[$gender_id],
                    'remark' => $request->remark[$gender_id],
                ]
            );
        }

        land_owner_permanent_address::create($helper->getAddressFromRequest($request->all()) + ['land_owner_id' => $landOwner->id]);
        land_owner_temporary_address::create($helper->getAddressFromRequest($request->all(), 'temporary') + ['land_owner_id' => $landOwner->id]);

        foreach ($request->name as $key => $name) {
            land_owner_bank_detail::create(
                [
                    'land_owner_id' => $landOwner->id,
                    'name' => $name,
                    'account_no' => $request->account_no[$key],
                ]
            );
        }

        toast("जग्गाधनीको विवरण हाल्न सफल भयो", "success");
        return redirect()->route('land-owner.index');
    }
}
