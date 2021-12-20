<?php

namespace App\Http\Controllers\land;

use App\Http\Controllers\Controller;
use App\Models\land\land_owner;
use App\Models\setting\citizenship_type;
use App\Models\setting\ethnic_group;
use App\Models\setting\gender;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LandController extends Controller
{
    public $genders;
    public $ethnic_groups;
    public $citizenship_types;

    public function __construct()
    {
        $this->genders = gender::query()->get();
        $this->ethnic_groups = ethnic_group::query()->get();
        $this->citizenship_types = citizenship_type::query()->get();
    }

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
        return view('land.land_owner_add', [
            'genders' => $this->genders,
            'ethnic_groups' => $this->ethnic_groups,
            'citizenship_types' => $this->citizenship_types
        ]);
    }
}
