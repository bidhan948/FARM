<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\area;
use App\Models\setting\region;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AreaController extends Controller
{
    public function index(): View
    {
        $areas = area::query()->get();
        $regions = region::query()->with('Area')->get();
        return view('setting.area', ['areas' => $areas, 'regions' => $regions]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['name' => 'required|unique:areas', 'region_id' => 'required']);
        area::create($validate);
        toast("क्षेत्रफल थप्न सफल भयो ", "success");
        return redirect()->back();
    }

    public function update(area $area, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => [
                'required',
                Rule::unique('areas')
                    ->ignore($area)
            ],
            'region_id' => 'required'
        ]);

        $area->update($validate);
        toast("क्षेत्रफल सच्याउन सफल भयो ", "success");
        return redirect()->back();
    }
}
