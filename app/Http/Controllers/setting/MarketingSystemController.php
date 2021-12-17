<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\marketing_system;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MarketingSystemController extends Controller
{
    public function index(): View
    {
        $marketing_systems = marketing_system::query()->get();
        return view('setting.marketing_system', ['marketing_systems' => $marketing_systems]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['name' => 'required|unique:marketing_systems']);
        marketing_system::create($validate);
        toast("बजारीकरण प्रणाली थप्न सफल भयो ", "success");
        return redirect()->back();
    }
    
    public function update(marketing_system $marketing_system, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => [
                'required',
                Rule::unique('marketing_systems')
                ->ignore($marketing_system)
                ]
            ]);
            
        $marketing_system->update($validate);
        toast("बजारीकरण प्रणाली सच्याउन सफल भयो ", "success");
        return redirect()->back();
    }
}
