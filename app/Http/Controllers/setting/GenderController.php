<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\gender;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GenderController extends Controller
{
    public function index(): View
    {
        $genders = gender::query()->get();
        return view('setting.gender', ['genders' => $genders]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['name' => 'required|unique:genders']);
        gender::create($validate);
        toast("लिङ्ग थप्न सफल भयो ", "success");
        return redirect()->back();
    }
    
    public function update(gender $gender, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => [
                'required',
                Rule::unique('genders')
                ->ignore($gender)
                ]
            ]);
            
        $gender->update($validate);
        toast("लिङ्ग सच्याउन सफल भयो ", "success");
        return redirect()->back();
    }
}
