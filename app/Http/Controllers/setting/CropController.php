<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\crop;
use App\Models\setting\crop_type;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CropController extends Controller
{
    public function index(): View
    {
        $crops = crop::query()->get();
        $crop_types = crop_type::query()->with('Crop')->get();
        return view('setting.crop', ['crops' => $crops, 'crop_types' => $crop_types]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['name' => 'required|unique:crops', 'crop_type_id' => 'required']);
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
            ],
            'crop_type_id' => 'required'
        ]);

        $crop->update($validate);
        toast("बाली सच्याउन सफल भयो ", "success");
        return redirect()->back();
    }
}
