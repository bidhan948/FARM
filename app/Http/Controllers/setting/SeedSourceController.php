<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\seed_source;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SeedSourceController extends Controller
{
    public function index(): View
    {
        $seed_sources = seed_source::query()->get();
        return view('setting.seed_source', ['seed_sources' => $seed_sources]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['name' => 'required|unique:seed_sources']);
        seed_source::create($validate);
        toast("बीउबिजनको स्रोत थप्न सफल भयो ", "success");
        return redirect()->back();
    }
    
    public function update(seed_source $seed_source, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => [
                'required',
                Rule::unique('seed_sources')
                ->ignore($seed_source)
                ]
            ]);
            
        $seed_source->update($validate);
        toast("बीउबिजनको स्रोत सच्याउन सफल भयो ", "success");
        return redirect()->back();
    }
}
