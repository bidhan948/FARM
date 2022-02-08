<?php

namespace App\Http\Controllers\fertilizer;

use App\Http\Controllers\Controller;
use App\Http\Requests\fertilizer\FertilizerCropUpdateRequest;
use App\Http\Requests\fertlizer\FertilizerCropRequest;
use App\Models\fertilizer\category;
use App\Models\fertilizer\fertilizer_crop;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FertilizerCropController extends Controller
{
    public function index(): View
    {
        return view('fertilizer.crop', [
            'categories' => category::query()->with('fertilizerCrop')->get()
        ]);
    }

    public function store(FertilizerCropRequest $request): RedirectResponse
    {
        fertilizer_crop::create($request->validated());
        toast('बालि थप्न सफल भयो ', 'success');
        return redirect()->back();
    }
    
    public function update(FertilizerCropUpdateRequest $request,fertilizer_crop $Crop): RedirectResponse
    {
        $Crop->update($request->validated());
        toast('बालि सच्याउन सफल भयो ', 'success');
        return redirect()->back();
    }
}
