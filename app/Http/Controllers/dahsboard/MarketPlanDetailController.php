<?php

namespace App\Http\Controllers\dahsboard;

use App\Http\Controllers\Controller;
use App\Models\detail\market_plan_detail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MarketPlanDetailController extends Controller
{
    public function index(): View
    {
        return view('dashboard.market_plan', [
            'market_plan_details' => market_plan_detail::query()->latest()->get()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'title' => 'required|unique:market_plan_details',
            'description' => 'required',
        ]);

        market_plan_detail::create($validate + ['entered_by' => auth()->user()->id]);
        toast("ब्यबसायिक योजना बनाउन जान्नु पर्ने आधारभूत जानकारी थप्न सफल भयो", "success");
        return redirect()->back();
    }
    
    public function update(Request $request, market_plan_detail $market_plan): RedirectResponse
    {
        $validate = $request->validate([
            'title' =>   'required',
            Rule::unique('market_plan_details')
            ->ignore($market_plan),
            'description' => 'required',
        ]);
        
        $market_plan->update($validate + ['updated_by' => auth()->user()->id]);
        toast("ब्यबसायिक योजना बनाउन जान्नु पर्ने आधारभूत जानकारी सच्याउन सफल भयो", "success");
        return redirect()->back();
    }
}
