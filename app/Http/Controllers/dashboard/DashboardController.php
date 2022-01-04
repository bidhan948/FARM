<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\dashboard\about_us;
use App\Models\dashboard\notice;
use App\Models\dashboard\publication;
use App\Models\dashboard\publication_document;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use ZipArchive;
use File;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function aboutUs(): View
    {
        return view('dashboard.dashboard_about_us', [
            'aboutus' => about_us::query()
                ->where('is_active', about_us::STATUS_TRUE)
                ->first()
        ]);
    }

    public function contactUs()
    {
        return view('dashboard.dashboard_contact_us');
    }

    public function notice()
    {
        return view('dashboard.dashboard_notice', [
            'notices' => notice::query()
                ->orderBy('start_dateAd')
                ->get()
        ]);
    }

    public function downloadNotice(notice $notice)
    {
        $noticeDocuments = $notice->load('noticeDocument');
        $documentArray = $noticeDocuments->noticeDocument->toArray();

        $zip = new ZipArchive;
        $filename = $notice->notice . ".zip";

        if ($zip->open(public_path($filename), ZipArchive::CREATE) == TRUE) {
            $files = File::files(public_path('storage/notice'));

            foreach ($files as $key => $value) {
                foreach ($documentArray as $key => $document) {
                    if (in_array(basename($value), $document)) {
                        $r = basename($value);
                        $zip->addFile($value, $r);
                    }
                }
            }
            $zip->close();
        }

        return response()->download(public_path($filename));
    }

    public function publication()
    {
        return view(
            'dashboard.dashboard_publication',
            [
                'publications' => publication::query()
                    ->with('publicationDocument')
                    ->latest()
                    ->get()
            ]
        );
    }

    public function downloadPublication($document)
    {
        // $publicationDocuments = $publication->load('publicationDocument');
        $imagePath = config('constant.PUBLICATION_PATH');

        // foreach ($publicationDocuments->publicationDocument as $key => $document) {
        //     return Storage::download($imagePath . "/" . $document->document);
        // }
        return Storage::download($imagePath . "/" . $document);
    }

    public function farmer()
    {
        dd("page under construction");
    }

    public function agricultureAnimal(): View
    {
        dd("page is under construction");
    }
}
