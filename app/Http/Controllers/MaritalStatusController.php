<?php

namespace App\Http\Controllers;

use App\Models\setting\marital_status;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MaritalStatusController extends Controller
{
    public function index(): View
    {
        $marital_statuss = marital_status::query()->get();
        return view('setting.marital_status', ['marital_statuss' => $marital_statuss]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['name' => 'required|unique:marital_statuses']);
        marital_status::create($validate);
        toast("बैवाहिक स्थिति थप्न सफल भयो ", "success");
        return redirect()->back();
    }
    
    public function update(marital_status $marital_status, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => [
                'required',
                Rule::unique('marital_statuses')
                ->ignore($marital_status)
                ]
            ]);
            
        $marital_status->update($validate);
        toast("बैवाहिक स्थिति सच्याउन सफल भयो ", "success");
        return redirect()->back();
    }
}
