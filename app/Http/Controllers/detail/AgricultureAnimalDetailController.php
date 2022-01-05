<?php

namespace App\Http\Controllers\detail;

use App\Helper\MediaHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\AgricultureAnimalDetailRequestSubmit;
use App\Models\detail\agriculture_animal_detail;
use App\Models\setting\crop_type;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AgricultureAnimalDetailController extends Controller
{
    public function index(): View
    {
        return view(
            'dashboard.agriculture_animal_detail',
            [
                'crop_types' => crop_type::query()->get(),
                'agriculture_animal_details' => agriculture_animal_detail::query()->with('cropType')->get()
            ]
        );
    }

    public function store(AgricultureAnimalDetailRequestSubmit $request, MediaHelper $helper): RedirectResponse
    {
        $image = $helper->uploadSingleImage($request->featured_image);
        agriculture_animal_detail::create($request->except('featured_image')
            + ['featured_image' => $image]);

        toast("कृषि तथा पशुपन्छि सम्बन्धि आधारभूत जानकारी थप्न सफल भयो", "success");
        return redirect()->back();
    }
}
