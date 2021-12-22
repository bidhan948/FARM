<?php

namespace App\Http\Controllers\land_detail;

use App\Http\Controllers\Controller;
use App\Models\land\land_owner;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LandDetailController extends Controller
{
    public function create(land_owner $land_owner): View
    {
        return view('land_owner_detail.land_detail_add',compact('land_owner'));
    }
}
