<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\productionanimal;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductionAnimalController extends Controller
{
    public function index(): View
    {
        $productionanimals = productionanimal::query()->get();
        return view('setting.productionanimal', ['productionanimals' => $productionanimals]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['name' => 'required|unique:productionanimals']);
        productionanimal::create($validate);
        toast("पशुजन्य उत्पादन थप्न सफल भयो ", "success");
        return redirect()->back();
    }
    
    public function update(productionanimal $productionanimal, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => [
                'required',
                Rule::unique('productionanimals')
                ->ignore($productionanimal)
                ]
            ]);
            
        $productionanimal->update($validate);
        toast("पशुजन्य उत्पादन सच्याउन सफल भयो ", "success");
        return redirect()->back();
    }
}
