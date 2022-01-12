<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(): View
    {
        return view('auth.user', [
            'users' => User::query()->whereNotNull('ward_no')->get()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        user::create($request->validated());
        toast('प्रयोगकर्ता थप्न सफल भयो ', 'success');
        return redirect()->back();
    }
}
