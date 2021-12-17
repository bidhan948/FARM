<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\irrigation_type;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class IrrigationTypeController extends Controller
{
    public function index(): View
    {
        $irrigation_types = irrigation_type::query()->get();
        return view('setting.irrigation_type', ['irrigation_types' => $irrigation_types]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['name' => 'required|unique:irrigation_types']);
        irrigation_type::create($validate);
        toast("सिचाईको प्रकार थप्न सफल भयो ", "success");
        return redirect()->back();
    }
    
    public function update(irrigation_type $irrigation_type, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => [
                'required',
                Rule::unique('irrigation_types')
                ->ignore($irrigation_type)
                ]
            ]);
            
        $irrigation_type->update($validate);
        toast("सिचाईको प्रकार सच्याउन सफल भयो ", "success");
        return redirect()->back();
    }
}
