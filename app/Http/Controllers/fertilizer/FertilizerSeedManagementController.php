<?php

namespace App\Http\Controllers\fertilizer;

use App\Http\Controllers\Controller;
use App\Models\fertilizer\fertilizer_seed_management;
use Illuminate\Contracts\View\View;

class FertilizerSeedManagementController extends Controller
{
    public function index(): View
    {
        return view(
            'fertilizer.fertilizer_seed_management',
            [
                'fertilizer_seeds' => fertilizer_seed_management::query()->get()
            ]
        );
    }
}
