<?php

namespace App\Http\Controllers\fertilizer;

use App\Helper\SettingHelper;
use App\Http\Controllers\Controller;
use App\Models\fertilizer\stock;
use Illuminate\Contracts\View\View;

class StockController extends Controller
{
    //-----------------store of stock is done on livewire called stockadd bcz it has many ajax call--------------------/

    public function index(SettingHelper $helper): View
    {
        $data = $helper->getSetting(['unit', 'crop_type']);

        return view('fertilizer.stock', [
            'stocks' => stock::query()
                ->with('Crop')
                ->with('Fertilizer')
                ->with('Unit')
                ->get(),
            'units' => $data['unit'],
            'crop_types' => $data['crop_type']
        ]);
    }
}
