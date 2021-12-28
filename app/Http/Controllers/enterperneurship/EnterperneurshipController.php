<?php

namespace App\Http\Controllers\enterperneurship;

use App\Helper\SettingHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\EnterpeunershipRequest;
use App\Models\entrepreneurship\business_detail;
use App\Models\entrepreneurship\enterpreneurship;
use App\Models\entrepreneurship\upcoming_plans;
use App\Models\land\land_owner;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class EnterperneurshipController extends Controller
{
    public function create(land_owner $land_owner, SettingHelper $helper): View
    {
        abort_if(enterpreneurship::query()->where('land_owner_id',$land_owner->id)->count() != 0, 403);

        $data = $helper->getSetting(['business', 'organization_type']);
        return view(
            'enterperneurship.enterperneurship_add',
            [
                'businesses' => $data['business'],
                'organization_types' => $data['organization_type'],
                'land_owner' => $land_owner
            ]
        );
    }

    public function store(EnterpeunershipRequest $request, land_owner $land_owner, SettingHelper $helper): RedirectResponse
    {
        abort_if(enterpreneurship::query()->where('land_owner_id',$land_owner->id)->count() != 0, 403);

        if ($request->arrogance_status == 0) {
            $land_owner->update(['arrogance_status' => land_owner::ARROGANCE_FALSE]);
        } else {
            enterpreneurship::create($helper->grtEnterpeunershipData($request->validated()) + ['land_owner_id' => $land_owner->id]);
            foreach ($request->business_id as $key => $busines_id) {
                business_detail::create(
                    [
                        'land_owner_id' => $land_owner->id,
                        'business_id' => $busines_id,
                        'yearly_investment' => $request->yearly_investment[$key],
                        'yearly_income' => $request->yearly_income[$key],
                        'remark' => $request->remark[$key],
                    ]
                );
            }

            foreach ($request->name as $key => $name) {
                upcoming_plans::create(
                    [
                        'land_owner_id' => $land_owner->id,
                        'name' => $name,
                        'plan_detail' => $request->plan_detail[$key],
                        'remark' => $request->remark_plan[$key],
                    ]
                );
            }
        }
        toast("उधम्शिल्ता/फारम संचालनमा आबद्ध थप्न सफल भयो", "success");
        return redirect()->route('land-owner.index');
    }

    public function show(land_owner $land_owner,SettingHelper $helper): View
    {
        dd($land_owner);
    }
}
