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
use Illuminate\Support\Facades\Storage;

class PublicationController extends Controller
{
    public function index(): View
    {
        return view('dashboard.publication', ['publications' => publication::query()
            ->latest()
            ->get()]);
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

    public function edit(publication $Publication): View
    {
        return view(
            'dashboard.publication_edit',
            [
                'publication' => $Publication->load('publicationDocument')
            ]
        );
    }

    public function update(publication $Publication, PublicationRequest $request, MediaHelper $helper): RedirectResponse
    {
        if ($request->has('publication_document')) {

            if ($request->has('document')) {
                foreach ($request->document as $document) {
                    $imagePath = "public/publication/" . $document;
                    if (Storage::exists($imagePath)) {
                        Storage::delete($imagePath);
                    }
                }
            }

            publication_document::where('publication_id', $Publication->id)->forceDelete();

            $image =  $helper->uploadMultipleImage($request->publication_document, "publication");
            foreach ($image as $key => $value) {
                publication_document::create(['publication_id' => $Publication->id, 'document' => $value]);
            }
        }

        $Publication->update(
            $request->except('document', 'publication_document') +
                ['updated_by' => auth()->user()->id]
        );

        toast("प्रकाशन सच्याउन सफल भयो", "success");
        return redirect()->route('Publication.index');
    }
}
