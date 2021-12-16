<?php

namespace App\Http\Controllers\saetting;

use App\Http\Controllers\Controller;
use App\Models\setting\citizenship_type;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CitizenShipController extends Controller
{
    public function index(): View
    {
        $citizenship_types = citizenship_type::query()->get();
        return view('setting.citizenship_type', ['citizenship_types' => $citizenship_types]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['name' => 'required|unique:citizenship_types']);
        citizenship_type::create($validate);
        toast("नागरिकतको किसिम थप्न सफल भयो ", "success");
        return redirect()->back();
    }
    
    public function update(citizenship_type $citizenship_type, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => [
                'required',
                Rule::unique('citizenship_types')
                ->ignore($citizenship_type)
                ]
            ]);
            
        $citizenship_type->update($validate);
        toast("नागरिकतको किसिम सच्याउन सफल भयो ", "success");
        return redirect()->back();
    }
}
