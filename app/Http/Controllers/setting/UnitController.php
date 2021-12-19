<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\unit;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UnitController extends Controller
{
    public function index(): View
    {
        $units = unit::query()->get();
        return view('setting.unit', ['units' => $units]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['name' => 'required|unique:units']);
        unit::create($validate);
        toast("एकाई थप्न सफल भयो ", "success");
        return redirect()->back();
    }
    
    public function update(unit $unit, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => [
                'required',
                Rule::unique('units')
                ->ignore($unit)
                ]
            ]);
            
        $unit->update($validate);
        toast("एकाई सच्याउन सफल भयो ", "success");
        return redirect()->back();
    }
}
