<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\dashboard\about_us;
use App\Models\dashboard\notice;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function aboutUs(): View
    {
        return view('dashboard.dashboard_about_us', [
            'aboutus' => about_us::query()
                ->where('is_active', about_us::STATUS_TRUE)
                ->first()
        ]);
    }

    public function contactUs()
    {
        return view('dashboard.dashboard_contact_us');
    }

    public function notice()
    {
        return view('dashboard.dashboard_notice', [
            'notices' => notice::query()
                ->orderBy('start_dateAd')
                ->get()
        ]);
    }
}
