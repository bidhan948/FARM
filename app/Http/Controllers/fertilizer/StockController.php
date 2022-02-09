<?php

namespace App\Http\Controllers\fertilizer;

use App\Helper\SettingHelper;
use App\Http\Controllers\Controller;
use App\Models\fertilizer\stock;
use Illuminate\Contracts\View\View;

class StockController extends Controller
{
    public function index(SettingHelper $helper): View
    {
        $data = $helper->getSetting(['unit', 'crop_type']);

        return view('fertilizer.stock', [
            'stocks' => stock::query()
                ->get(),
            'units' => $data['unit'],
            'crop_types' => $data['crop_type']
        ]);
    }
}
