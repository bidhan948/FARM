<?php

namespace App\Http\Controllers\detail;

use App\Http\Controllers\Controller;
use App\Http\Requests\detail\PageRequestSubmit;
use App\Models\detail\agriculture_animal_detail;
use App\Models\detail\page;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(agriculture_animal_detail $agriculture_animal_detail): View
    {
        return view('dashboard.page', [
            'agriculture_animal_detail' => $agriculture_animal_detail,
            'pages' => $agriculture_animal_detail->load('Page'),
            'parentPages' => page::query()->Parent()->get()
        ]);
    }

    public function store(agriculture_animal_detail $agriculture_animal_detail, PageRequestSubmit $request): RedirectResponse
    {
        $agriculture_animal_detail->Page()->create($request->validated());
        toast($agriculture_animal_detail->title . " थप्न सफल भयो", "success");
        return redirect()->back();
    }
}
