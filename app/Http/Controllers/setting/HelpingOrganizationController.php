<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\helping_organization;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HelpingOrganizationController extends Controller
{
    public function index(): View
    {
        $helping_organizations = helping_organization::query()->get();
        return view('setting.helping_organization', ['helping_organizations' => $helping_organizations]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['name' => 'required|unique:helping_organizations']);
        helping_organization::create($validate);
        toast("सहयोगी संस्था थप्न सफल भयो ", "success");
        return redirect()->back();
    }
    
    public function update(helping_organization $helping_organization, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => [
                'required',
                Rule::unique('helping_organizations')
                ->ignore($helping_organization)
                ]
            ]);
            
        $helping_organization->update($validate);
        toast("सहयोगी संस्था सच्याउन सफल भयो ", "success");
        return redirect()->back();
    }
}
