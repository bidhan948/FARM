<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\seed_supplier;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SeedSupplierController extends Controller
{
    public function index(): View
    {
        $seed_suppliers = seed_supplier::query()->get();
        return view('setting.seed_supplier', ['seed_suppliers' => $seed_suppliers]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['name' => 'required|unique:seed_suppliers']);
        seed_supplier::create($validate);
        toast("बीउबिजनको प्रदायक थप्न सफल भयो ", "success");
        return redirect()->back();
    }
    
    public function update(seed_supplier $seed_supplier, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => [
                'required',
                Rule::unique('seed_suppliers')
                ->ignore($seed_supplier)
                ]
            ]);
            
        $seed_supplier->update($validate);
        toast("बीउबिजनको प्रदायक सच्याउन सफल भयो ", "success");
        return redirect()->back();
    }
}
