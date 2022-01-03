<?php

namespace App\Http\Controllers\dashboard;

use App\Helper\MediaHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\NoticeEditRequest;
use App\Http\Requests\dashboard\NoticeRequestSubmit;
use App\Models\dashboard\notice;
use App\Models\dashboard\notice_document;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class NoticeController extends Controller
{
    public function index(): View
    {
        return view('dashboard.notice', ['notices' => notice::query()
            ->orderBy('start_dateAd')
            ->get()]);
    }

    public function store(NoticeRequestSubmit $request, MediaHelper $helper): RedirectResponse
    {
        $image =  $helper->uploadMultipleImage($request->notice_document);
        $notice = notice::create($request->validated() + ['entered_by' => auth()->user()->id]);
        foreach ($image as $key => $value) {
            notice_document::create(['notice_id' => $notice->id, 'document' => $value]);
        }
        toast("सूचना हाल्न सफल भयो", "success");
        return redirect()->back();
    }

    public function edit(notice $notice): View
    {
        return view('dashboard.notice_edit', ['notice' => $notice->load('noticeDocument')]);
    }

    public function update(notice $notice, NoticeEditRequest $request, MediaHelper $helper): RedirectResponse
    {
        $request->merge(['start_date' => $request->start_date == null ? $notice->start_date : $request->start_date]);
        $request->merge(['end_date' => $request->end_date == null ? $notice->end_date : $request->end_date]);

        if ($request->has('notice_document')) {

            if ($request->has('document')) {
                foreach ($request->document as $document) {
                    $imagePath = "public/notice/" . $document;
                    if (Storage::exists($imagePath)) {
                        Storage::delete($imagePath);
                    }
                }
            }

            notice_document::where('notice_id', $notice->id)->forceDelete();

            $image =  $helper->uploadMultipleImage($request->notice_document);
            foreach ($image as $key => $value) {
                notice_document::create(['notice_id' => $notice->id, 'document' => $value]);
            }
        }

        $notice->update(
            [
                "notice" => $request->notice,
                "start_date" => $request->start_date,
                "start_dateAd" => $request->start_dateAd,
                "end_date" => $request->end_date,
                "end_dateAd" => $request->end_dateAd,
                "updated_by" => auth()->user()->id
            ]
        );

        toast("सूचना सच्याउन सफल भयो", "success");
        return redirect()->route('notice.index');
    }
}
