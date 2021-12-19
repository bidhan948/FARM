<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\main_market;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MainMarketController extends Controller
{
    public function index(): View
    {
        $main_markets = main_market::query()->get();
        return view('setting.main_market', ['main_markets' => $main_markets]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['name' => 'required|unique:main_markets']);
        main_market::create($validate);
        toast("मुख्य बजार थप्न सफल भयो ", "success");
        return redirect()->back();
    }
    
    public function update(main_market $main_market, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => [
                'required',
                Rule::unique('main_markets')
                ->ignore($main_market)
                ]
            ]);
            
        $main_market->update($validate);
        toast("मुख्य बजार सच्याउन सफल भयो ", "success");
        return redirect()->back();
    }
}
