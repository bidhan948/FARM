<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\dashboard\about_us;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index(): View
    {
        return view('dashboard.about_us', ['about_uses' => about_us::all()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['about_us' => 'required', 'is_active' => 'required']);
        if ($request->is_active) {
            about_us::where('is_active', 1)->update(['is_active' => 0]);
        }
        about_us::create($validate + ['user_id' => auth()->user()->id]);
        toast("हाम्रो बारेमा हाल्न सफल भयो", "success");
        return redirect()->back();
    }

    public function update(about_us $about_us,Request $request): RedirectResponse
    {
        $validate = $request->validate(['about_us' => 'required', 'is_active' => 'required']);
        if ($request->is_active == 1) {
            about_us::where('is_active', 1)->update(['is_active' => 0]);
        }
        $about_us->update($validate + ['user_id_updated' => auth()->user()->id]);
        toast("हाम्रो बारेमा सच्याउन सफल भयो", "success");
        return redirect()->back();
    }
}
