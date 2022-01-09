<?php

namespace App\Http\Controllers\detail;

use App\Helper\MediaHelper;
use App\Helper\SettingHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\detail\AgricultureTechnologyRequest;
use App\Models\detail\agriculture_technology;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AgricultureTechnologyController extends Controller
{
    public function index(SettingHelper $helper): View
    {
        $data = $helper->getSetting(['crop_type', 'crop']);

        return view('dashboard.agriculture_technology', [
            'agriculture_technologies' => agriculture_technology::query()
                ->with('Crop')
                ->latest()
                ->get(),
            'crop_types' => $data['crop_type']
        ]);
    }

    public function store(AgricultureTechnologyRequest $request, MediaHelper $helper): RedirectResponse
    {
        $document = $helper->uploadSingleImage($request->document, "agriculture_technology");
        agriculture_technology::create($request->except('document') + ['document' => $document]);
        toast("कृषि प्रबिधि थप्न सफल भयो ", "success");
        return redirect()->back();
    }
}
