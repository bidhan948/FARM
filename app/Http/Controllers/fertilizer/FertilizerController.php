<?php

namespace App\Http\Controllers\fertilizer;

use App\Http\Controllers\Controller;
use App\Models\fertilizer\fertilizer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FertilizerController extends Controller
{
    public function index(): View
    {
        return view('fertilizer.fertilizer', [
            'fertilizers' => fertilizer::query()
                ->latest()
                ->get()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['name' => 'required|unique:fertilizers']);
        fertilizer::create($validate);
        toast("fertilizer  थप्न सफल भयो ", "success");
        return redirect()->back();
    }

    public function update(fertilizer $fertilizer, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => [
                'required',
                Rule::unique('fertilizers')
                    ->ignore($fertilizer)
            ]
        ]);

        $fertilizer->update($validate);
        toast("fertilizer सच्याउन सफल भयो ", "success");
        return redirect()->back();
    }
}
