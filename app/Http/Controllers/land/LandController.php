<?php

namespace App\Http\Controllers\land;

use App\Helper\SettingHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\setting\LandOWnwerRequest;
use App\Models\land\land_owner;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LandController extends Controller
{
    public function index(): View
    {
        $land_owner_details = land_owner::query()
            ->with(
                'landOwnerPermanentAddress',
                'landOwnerTemporaryAddress',
                'Bank',
                'Gender',
                'ethnicGroup',
                'maritalStatus',
                'Business',
                'educationQualification'
            )->get();

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
                'education_qualification'
            ]
        );

        return view('land.land_owner_add', [
            'genders' => $data['gender'],
            'ethnic_groups' => $data['ethnic_group'],
            'citizenship_types' => $data['citizenship_type'],
            'bussinesses' => $data['business'],
            'education_qualifications' => $data['education_qualification'],
        ]);
    }

    public function store(LandOWnwerRequest $request): RedirectResponse
    {
        dd($request->all());
    }
}
