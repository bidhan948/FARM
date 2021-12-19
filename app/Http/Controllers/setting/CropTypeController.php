<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\crop_type;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CropTypeController extends Controller
{
    public function index(): View
    {
        $crop_types = crop_type::query()->get();
        return view('setting.crop_type', ['crop_types' => $crop_types]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['name' => 'required|unique:crop_types']);
        crop_type::create($validate);
        toast("बलिको प्रकार थप्न सफल भयो ", "success");
        return redirect()->back();
    }
    
    public function update(crop_type $crop_type, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => [
                'required',
                Rule::unique('crop_types')
                ->ignore($crop_type)
                ]
            ]);
            
        $crop_type->update($validate);
        toast("बलिको प्रकार सच्याउन सफल भयो ", "success");
        return redirect()->back();
    }
}
