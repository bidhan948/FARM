<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\dashboard\contact_us;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(): View
    {
        return view('dashboard.contact_us', ['contact_uses' => contact_us::all()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['contact_us' => 'required', 'is_active' => 'required']);
        if ($request->is_active) {
            contact_us::where('is_active', contact_us::STATUS_TRUE)->update(['is_active' => contact_us::STATUS_FALSE]);
        }
        contact_us::create($validate + ['user_id' => auth()->user()->id]);
        toast("सम्पर्क हाल्न सफल भयो", "success");
        return redirect()->back();
    }

    public function update(contact_us $contact_us,Request $request): RedirectResponse
    {
        $validate = $request->validate(['contact_us' => 'required', 'is_active' => 'required']);
        if ($request->is_active == 1) {
            contact_us::where('is_active', contact_us::STATUS_TRUE)->update(['is_active' =>  contact_us::STATUS_FALSE]);
        }
        $contact_us->update($validate + ['user_id_updated' => auth()->user()->id]);
        toast("सम्पर्क सच्याउन सफल भयो", "success");
        return redirect()->back();
    }
}
