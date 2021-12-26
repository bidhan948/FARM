<?php

namespace App\Http\Controllers\animal;

use App\Http\Controllers\Controller;
use App\Models\land\land_owner;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AnimalDetailController extends Controller
{
    public function index(land_owner $land_owner): View
    {
        dd($land_owner);
    }
}
