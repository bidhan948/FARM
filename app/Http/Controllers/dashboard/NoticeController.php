<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\NoticeEditRequest;
use App\Http\Requests\dashboard\NoticeRequestSubmit;
use App\Models\dashboard\notice;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index(): View
    {
        return view('dashboard.notice', ['notices' => notice::query()
            ->orderBy('start_dateAd')
            ->get()]);
    }

    public function store(NoticeRequestSubmit $request): RedirectResponse
    {
        notice::create($request->validated() + ['entered_by' => auth()->user()->id]);
        toast("सूचना हाल्न सफल भयो", "success");
        return redirect()->back();
    }

    public function edit(notice $notice): View
    {
        return view('dashboard.notice_edit', compact('notice'));
    }

    public function update(notice $notice, NoticeEditRequest $request): RedirectResponse
    {
        $request->merge(['start_date' => $request->start_date == null ? $notice->start_date : $request->start_date]);
        $request->merge(['end_date' => $request->end_date == null ? $notice->end_date : $request->end_date]);

        $notice->update($request->all());
        toast("सूचना सच्याउन सफल भयो", "success");
        return redirect()->route('notice.index');
    }
}
