<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\organization_type;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrganizationTypeController extends Controller
{
    public function index(): View
    {
        $organization_types = organization_type::query()->get();
        return view('setting.organization_type', ['organization_types' => $organization_types]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['name' => 'required|unique:organization_types']);
        organization_type::create($validate);
        toast("संस्थाको प्रकार  थप्न सफल भयो ", "success");
        return redirect()->back();
    }
    
    public function update(organization_type $organization_type, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => [
                'required',
                Rule::unique('organization_types')
                ->ignore($organization_type)
                ]
            ]);
            
        $organization_type->update($validate);
        toast("संस्थाको प्रकार  सच्याउन सफल भयो ", "success");
        return redirect()->back();
    }
}
