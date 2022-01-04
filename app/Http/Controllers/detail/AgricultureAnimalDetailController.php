<?php

namespace App\Http\Controllers\detail;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AgricultureAnimalDetailController extends Controller
{
    public function index(): View
    {
        return view('dashboard.agriculture_animal_detail');
    }
}
