<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\education_qualification;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EducationQualificationController extends Controller
{
    public function index(): View
    {
        $education_qualifications = education_qualification::query()->get();
        return view('setting.education_qualification', ['education_qualifications' => $education_qualifications]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['name' => 'required|unique:education_qualifications']);
        education_qualification::create($validate);
        toast("शैक्षिक योग्यता थप्न सफल भयो ", "success");
        return redirect()->back();
    }
    
    public function update(education_qualification $education_qualification, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => [
                'required',
                Rule::unique('education_qualifications')
                ->ignore($education_qualification)
                ]
            ]);
            
        $education_qualification->update($validate);
        toast("शैक्षिक योग्यता सच्याउन सफल भयो ", "success");
        return redirect()->back();
    }
}
