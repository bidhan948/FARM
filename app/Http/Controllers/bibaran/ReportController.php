<?php

namespace App\Http\Controllers\bibaran;

use App\Http\Controllers\Controller;
use App\Models\land\land_owner;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(land_owner $land_owner): View
    {
        // dd($land_owner->load('landDetail', 'agricultureDetail', 'animalDetail','Enterperneurship'));
        return view(
            'bibaran.individual_bibaran',
            [
                'land_owner' => $land_owner->load('landDetail', 'agricultureDetail', 'animalDetail', 'Enterperneurship')
            ]
        );
    }
}
