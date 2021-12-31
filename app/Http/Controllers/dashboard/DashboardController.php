<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\dashboard\about_us;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
}
