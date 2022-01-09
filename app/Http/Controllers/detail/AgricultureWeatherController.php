<?php

namespace App\Http\Controllers\detail;

use App\Http\Controllers\Controller;
use App\Http\Requests\detail\AgricultureWeatherRequest;
use App\Models\detail\agriculture_weather;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AgricultureWeatherController extends Controller
{
    public function index(): View
    {
        return view('dashboard.agriculture_weather', [
            'agriculture_weathers' => agriculture_weather::query()
                ->withTrashed()
                ->latest()
                ->get()
        ]);
    }

    public function store(AgricultureWeatherRequest $request): RedirectResponse
    {
        $index = agriculture_weather::query()->whereNull('deleted_at')->count();

        agriculture_weather::create($request->validated() + ['index' => $index + 1]);
        toast("कृषि - मौसम सल्लाह बुलेटिन थप्न सफल भयो", "success");
        return redirect()->back();
    }

    public function destroy(agriculture_weather $agriculture_weather): RedirectResponse
    {
        $agriculture_weather->delete();
        toast("कृषि - मौसम सल्लाह बुलेटिन हटाउन सफल भयो", "success");
        return redirect()->back();
    }

    public function show(agriculture_weather $agriculture_weather)
    {
        return view('dashboard.agriculture_weather_show', [
            'agriculture_weather' => $agriculture_weather
        ]);
    }

    public function recover(agriculture_weather $agriculture_weather_recover): RedirectResponse
    {
        $agriculture_weather_recover->restore();
        toast("कृषि - मौसम सल्लाह बुलेटिन पुनर्स्थापना गर्न सफल भयो", "success");
        return redirect()->back();
    }
}
