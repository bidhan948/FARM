<?php

namespace App\Http\Controllers\fertilizer;

use App\Http\Controllers\Controller;
use App\Models\fertilizer\stock_log;
use Illuminate\Contracts\View\View;

class FertilizerSeedManagementController extends Controller
{
    public function index(): View
    {
        return view(
            'fertilizer.fertilizer_seed_management',
            [
                'fertilizer_seeds' => stock_log::query()
                    ->whereNotNull('land_owner_id')
                    ->with('landOwner')
                    ->with('Unit')
                    ->with('Crop')
                    ->get()
            ]
        );
    }
}
