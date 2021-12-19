<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\animal;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AnimalController extends Controller
{
    public function index(): View
    {
        $animals = animal::query()->get();
        return view('setting.animal', ['animals' => $animals]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['name' => 'required|unique:animals']);
        animal::create($validate);
        toast("पशु थप्न सफल भयो ", "success");
        return redirect()->back();
    }
    
    public function update(animal $animal, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => [
                'required',
                Rule::unique('animals')
                ->ignore($animal)
                ]
            ]);
            
        $animal->update($validate);
        toast("पशु सच्याउन सफल भयो ", "success");
        return redirect()->back();
    }
}
