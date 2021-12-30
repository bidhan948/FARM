<?php

namespace App\Http\Controllers\samuha;

use App\Http\Controllers\Controller;
use App\Http\Requests\SamuhaDetailRequest;
use App\Models\land\land_owner;
use App\Models\samuha\agriculture_animal_cooperative;
use App\Models\samuha\agriculture_farm;
use App\Models\samuha\agriculture_samuha;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class SamuhaDetailController extends Controller
{
    public function create(land_owner $land_owner): View
    {
        abort_if(agriculture_samuha::query()->where('land_owner_id', $land_owner->id)->count() != 0, 403);
        return view('samuha.samuha_detail_add', compact('land_owner'));
    }

    public function store(SamuhaDetailRequest $request, land_owner $land_owner): RedirectResponse
    {
        abort_if(agriculture_samuha::query()->where('land_owner_id', $land_owner->id)->count() != 0, 403);

        DB::transaction(function () use ($request, $land_owner) {
            if ($request->samuha_status) {
                agriculture_samuha::create($request->validated() + [
                    'samuha_province_id' => $request->permanent_province_id,
                    'samuha_district_id' => $request->permanent_district_id,
                    'samuha_municipality_id' => $request->permanent_municipality_id,
                    'land_owner_id' => $land_owner->id
                ]);
            } else {
                $land_owner->update(['samuha_status' => land_owner::SAMUHA_STATUS_FALSE]);
            }

            if ($request->cooperative_status) {
                agriculture_animal_cooperative::create($request->validated() + [
                    'land_owner_id' => $land_owner->id,
                    'cooperative_province_id' => $request->temporary_province_id,
                    'cooperative_district_id' => $request->temporary_district_id,
                    'cooperative_municipality_id' => $request->temporary_municipality_id
                ]);
            } else {
                $land_owner->update(['samuha_status' => land_owner::COOPERATIVE_STATUS_FALSE]);
            }

            if ($request->farm_status) {
                agriculture_farm::create($request->validated() + [
                    'land_owner_id' => $land_owner->id,
                ]);
            } else {
                $land_owner->update(['samuha_status' => land_owner::FARM_STATUS_FALSE]);
            }
        });
        toast("समूह / सहकारी / फारम हाल्न सफल भयो", "success");
        return redirect()->route('land-owner.index');
    }

    public function show(land_owner $land_owner): View
    {
        abort_if(agriculture_samuha::query()->where('land_owner_id', $land_owner->id)->count() == 0, 403);

        $agriculture_samuhas = agriculture_samuha::query()
            ->where('land_owner_id', $land_owner->id)
            ->with('Province', 'District', 'Municipality')
            ->get();

        $agriculture_animal_cooperatives = agriculture_animal_cooperative::query()
            ->where('land_owner_id', $land_owner->id)
            ->with('Province', 'District', 'Municipality')
            ->get();

        $agriculture_farms = agriculture_farm::query()
            ->where('land_owner_id', $land_owner->id)
            ->with('Province', 'District', 'Municipality')
            ->get();

        return view('samuha.samuha_detail_show', [
            'agriculture_samuhas' => $agriculture_samuhas,
            'agriculture_animal_cooperatives' => $agriculture_animal_cooperatives,
            'agriculture_farms' => $agriculture_farms,
            'land_owner' => $land_owner
        ]);
    }
}
