<?php

namespace App\Http\Controllers\dashboard;

use App\Helper\MediaHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\PublicationRequest;
use App\Models\dashboard\publication;
use App\Models\dashboard\publication_document;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class PublicationController extends Controller
{
    public function index(): View
    {
        return view('dashboard.publication', ['publications' => publication::query()->latest()]);
    }

    public function store(PublicationRequest $request, MediaHelper $helper): RedirectResponse
    {
        DB::transaction(function () use ($request, $helper) {
            $Publication = publication::create($request->except('document') + ['entered_by' => auth()->user()->id]);

            $image =  $helper->uploadMultipleImage($request->document, "publication");
            foreach ($image as $key => $value) {
                publication_document::create(
                    [
                        'publication_id' => $Publication->id,
                        'document' => $value
                    ]
                );
            }
        });
        
        toast("प्रकाशन हाल्न सफल भयो", "success");
        return redirect()->back();
    }
}
