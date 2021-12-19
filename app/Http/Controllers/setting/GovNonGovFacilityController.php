<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\gov_non_gov_facility;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GovNonGovFacilityController extends Controller
{
    public function index(): View
    {
        $facilities = gov_non_gov_facility::query()->get();
        return view('setting.gov_non_gov_facility', ['facilities' => $facilities]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['name' => 'required|unique:gov_non_gov_facilities']);
        gov_non_gov_facility::create($validate);
        toast("सुबिधा थप्न सफल भयो ", "success");
        return redirect()->back();
    }
    
    public function update(gov_non_gov_facility $facility, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => [
                'required',
                Rule::unique('gov_non_gov_facilities')
                ->ignore($facility)
                ]
            ]);
            
        $facility->update($validate);
        toast("सुबिधा सच्याउन सफल भयो ", "success");
        return redirect()->back();
    }
}
