<?php

namespace App\Http\Controllers\enterperneurship;

use App\Helper\SettingHelper;
use App\Http\Controllers\Controller;
use App\Models\land\land_owner;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EnterperneurshipController extends Controller
{
    public function create(land_owner $land_owner, SettingHelper $helper): View
    {
        $data = $helper->getSetting(['business','organization_type']);
        return view(
            'enterperneurship.enterperneurship_add',
            [
                'businesses' => $data['business'],
                'organization_types' => $data['organization_type'],
                'land_owner' => $land_owner
            ]
        );
    }

    public function store(Request $request,land_owner $land_owner): RedirectResponse
    {
        dd($request->all());
    }
}
