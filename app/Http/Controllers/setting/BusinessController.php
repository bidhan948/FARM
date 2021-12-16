<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\business;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BusinessController extends Controller
{
    public function index(): View
    {
        $businesses = business::query()->get();
        return view('setting.business', ['businesses' => $businesses]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['name' => 'required|unique:businesses']);
        business::create($validate);
        toast("ब्यबसाय थप्न सफल भयो ", "success");
        return redirect()->back();
    }
    
    public function update(business $business, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => [
                'required',
                Rule::unique('businesses')
                ->ignore($business)
                ]
            ]);
            
        $business->update($validate);
        toast("ब्यबसाय सच्याउन सफल भयो ", "success");
        return redirect()->back();
    }
}
