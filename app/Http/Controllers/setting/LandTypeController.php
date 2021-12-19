<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\land_type;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LandTypeController extends Controller
{
    public function index(): View
    {
        $land_types = land_type::query()->get();
        return view('setting.land_type', ['land_types' => $land_types]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['name' => 'required|unique:land_types']);
        land_type::create($validate);
        toast("जग्गा थप्न सफल भयो ", "success");
        return redirect()->back();
    }
    
    public function update(land_type $land_type, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => [
                'required',
                Rule::unique('land_types')
                ->ignore($land_type)
                ]
            ]);
            
        $land_type->update($validate);
        toast("जग्गा सच्याउन सफल भयो ", "success");
        return redirect()->back();
    }
}
