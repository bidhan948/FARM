<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\dashboard\about_us;
use App\Models\dashboard\contact_us;
use App\Models\dashboard\notice;
use App\Models\dashboard\publication;
use App\Models\dashboard\question;
use App\Models\detail\agriculture_animal_detail;
use App\Models\detail\agriculture_technology;
use App\Models\detail\agriculture_weather;
use App\Models\detail\market_plan_detail;
use App\Models\detail\page;
use App\Models\land\land_owner;
use App\Models\setting\crop;
use App\Models\setting\crop_type;
use Illuminate\Contracts\View\View;
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

    public function contactUs(): View
    {
        return view('dashboard.dashboard_contact_us', [
            'contactus' => contact_us::query()
                ->where('is_active', contact_us::STATUS_TRUE)
                ->first()
        ]);
    }

    public function notice(): View
    {
        return view('dashboard.dashboard_notice', [
            'notices' => notice::query()
                ->orderBy('start_dateAd', 'DESC')
                ->with('noticeDocument')
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
        // $imagePath = config('constant.PUBLICATION_PATH');

        // foreach ($publicationDocuments->publicationDocument as $key => $document) {
        //     return Storage::download($imagePath . "/" . $document->document);
        // }
        return Storage::download(asset('storage/publication/'.$document));
    }

    public function farmer(): View
    {
        return view('dashboard.dashboard_land_owner_detail', [
            'land_owners' => land_owner::query()
                ->select('name_nepali', 'name_english', 'contact_no', 'cit_no', 'reg_id')
                ->with('Gender')
                ->latest()
                ->get()
        ]);
    }

    public function agricultureAnimal(): View
    {
        return view('dashboard.dashboard_agriculture_animal_detail', [
            'agriculture_animal_details' => agriculture_animal_detail::query()->with('cropType')->get()
        ]);
    }

    public function agricultureAnimalShow(agriculture_animal_detail $agriculture_animal_detail): View
    {
        $pages = page::query()
            ->where('agriculture_animal_detail_id', $agriculture_animal_detail->id)
            ->Children()
            ->with('Parent')
            ->get();

        $parents = page::query()
            ->Parent()
            ->get();

        return view('dashboard.dashboard_agriculture_animal', [
            'pages' => $pages,
            'parents' => $parents,
            'agriculture_animal_detail' => $agriculture_animal_detail,
            'checkForNotRepeatingParent' => []
        ]);
    }

    public function agricultureTechnology(): View
    {
        return view('dashboard.dashboard_agriculture_technology', [
            'crop_types' => crop_type::query()
                ->whereNotNull('image')
                ->get()
        ]);
    }

    public function agricultureTechnologyShow(crop_type $crop_type)
    {
        return view('dashboard.dashboard_agriculture_technology_detail', [
            'crops' => $crop_type->load('Crop'),
            'crop_type' => $crop_type
        ]);
    }
    public function agricultureTechnologyDetail(crop $crop)
    {
        return view('dashboard.dashboard_agriculture_technology_show', [
            'crop' => $crop->load('cropType'),
            'agriculture_technologies' => agriculture_technology::query()
                ->where('crop_id', $crop->id)
                ->latest()
                ->get()
        ]);
    }

    public function agricultureTechnologyDownload($document)
    {
        $imagePath = config('constant.AGRICULTURE_TECHNOLOGY_PATH');
        return Storage::download($imagePath . $document);
    }

    public function generalQuestionType(): View
    {
        return view('dashboard.dashboard_question', [
            'crop_types' => crop_type::query()
                ->whereNotNull('image')
                ->get()
        ]);
    }

    public function generalQuestionDetail(crop_type $crop_type): View
    {
        return view('dashboard.dashboard_question_detail', [
            'crops' => $crop_type->load('Crop'),
            'crop_type' => $crop_type
        ]);
    }

    public function generalQuestion(crop $crop): View
    {
        return view('dashboard.dashboard_question_crop', [
            'crop' => $crop,
            'questions' => question::query()
                ->where('crop_id', $crop->id)
                ->where('is_insurance', question::STATUS_GENERAL)
                ->latest()
                ->get()
        ]);
    }

    public function insuranceQuestion(): View
    {
        return view('dashboard.insurance_question', [
            'questions' => question::query()
                ->where('is_insurance', question::STATUS_INSUARNCE)
                ->latest()
                ->get()
        ]);
    }

    public function showMarketPlan()
    {
        return view('dashboard.dashboard_market_plan', [
            'market_plan_details' => market_plan_detail::query()
                ->latest()
                ->get()
        ]);
    }

    public function showAgricultureWeather(): View
    {
        return view('dashboard.dashboard_agriculture_weather', [
            'agriculture_weathers' => agriculture_weather::query()
                ->latest()
                ->paginate(25)
        ]);
    }

    public function showAgricultureWeatherDetail(agriculture_weather $agriculture_weather): View
    {
        return view('dashboard.dashboard_agriculture_weather_show', [
            'agriculture_weather' => $agriculture_weather
        ]);
    }
}
