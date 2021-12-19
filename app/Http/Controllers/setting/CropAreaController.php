<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\crop_area;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CropAreaController extends Controller
{
    public function index(): View
    {
        $crop_areas = crop_area::query()->get();
        return view('setting.crop_area', ['crop_areas' => $crop_areas]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['name' => 'required|unique:crop_areas']);
        crop_area::create($validate);
        toast("बाली छेत्रफल थप्न सफल भयो ", "success");
        return redirect()->back();
    }
    
    public function update(crop_area $crop_area, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => [
                'required',
                Rule::unique('crop_areas')
                ->ignore($crop_area)
                ]
            ]);
            
        $crop_area->update($validate);
        toast("बाली छेत्रफल सच्याउन सफल भयो ", "success");
        return redirect()->back();
    }
}
