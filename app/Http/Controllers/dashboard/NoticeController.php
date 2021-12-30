<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\NoticeRequestSubmit;
use App\Models\dashboard\notice;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index(): View
    {
        return view('dashboard.notice', ['notices' => notice::get()]);
    }

    public function store(NoticeRequestSubmit $request): RedirectResponse
    {
        notice::create($request->validated() + ['entered_by' => auth()->user()->id]);
        toast("सूचना हाल्न सफल भयो", "success");
        return redirect()->back();
    }
}
