<?php

namespace App\Http\Controllers\animal;

use App\Helper\SettingHelper;
use App\Http\Controllers\Controller;
use App\Models\land\land_owner;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AnimalDetailController extends Controller
{
    public function index(land_owner $land_owner, SettingHelper $helper): View
    {
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

    public function store(land_owner $land_owner)
    {
        dd($land_owner);
    }
}
