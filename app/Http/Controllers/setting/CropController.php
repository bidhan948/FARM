<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\crop;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CropController extends Controller
{
    public function index(): View
    {
        $crops = crop::query()->get();
        return view('setting.crop', ['crops' => $crops]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['name' => 'required|unique:crops']);
        crop::create($validate);
        toast("बाली थप्न सफल भयो ", "success");
        return redirect()->back();
    }
    
    public function update(crop $crop, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => [
                'required',
                Rule::unique('crops')
                ->ignore($crop)
                ]
            ]);
            
        $crop->update($validate);
        toast("बाली सच्याउन सफल भयो ", "success");
        return redirect()->back();
    }
}
