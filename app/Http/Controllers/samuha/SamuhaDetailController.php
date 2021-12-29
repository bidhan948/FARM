<?php

namespace App\Http\Controllers\samuha;

use App\Http\Controllers\Controller;
use App\Models\land\land_owner;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SamuhaDetailController extends Controller
{
    public function create(land_owner $land_owner): View
    {
        return view('samuha.samuha_detail_add', compact('land_owner'));
    }

    public function store(Request $request,land_owner $land_owner): RedirectResponse
    {
        dd($request->all());
    }
}
