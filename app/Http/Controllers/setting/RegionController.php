<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\region;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegionController extends Controller
{
    public function index(): View
    {
        $regions = region::query()->get();
        return view('setting.region', ['regions' => $regions]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['name' => 'required|unique:regions']);
        region::create($validate);
        toast("क्षेत्र थप्न सफल भयो ", "success");
        return redirect()->back();
    }
    
    public function update(region $region, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => [
                'required',
                Rule::unique('regions')
                ->ignore($region)
                ]
            ]);
            
        $region->update($validate);
        toast("क्षेत्र सच्याउन सफल भयो ", "success");
        return redirect()->back();
    }
}
