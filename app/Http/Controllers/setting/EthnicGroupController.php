<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\ethnic_group;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EthnicGroupController extends Controller
{
    public function index(): View
    {
        $ethnic_groups = ethnic_group::query()->get();
        return view('setting.ethnic_group', ['ethnic_groups' => $ethnic_groups]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['name' => 'required|unique:ethnic_groups']);
        ethnic_group::create($validate);
        toast("जातीय समूह थप्न सफल भयो ", "success");
        return redirect()->back();
    }
    
    public function update(ethnic_group $ethnic_group, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => [
                'required',
                Rule::unique('ethnic_groups')
                ->ignore($ethnic_group)
                ]
            ]);
            
        $ethnic_group->update($validate);
        toast("जातीय समूह सच्याउन सफल भयो ", "success");
        return redirect()->back();
    }
}
