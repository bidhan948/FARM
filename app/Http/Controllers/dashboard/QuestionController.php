<?php

namespace App\Http\Controllers\dashboard;

use App\Helper\SettingHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\QuestionRequestSubmit;
use App\Models\dashboard\question;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class QuestionController extends Controller
{
    public function index(SettingHelper $helper): View
    {
        $data = $helper->getSetting(['crop_type', 'crop']);

        return view('dashboard.question', [
            'questions' => question::query()
                ->withTrashed()
                ->latest()
                ->get(),
            'crop_types' => $data['crop_type']
        ]);
    }

    public function store(QuestionRequestSubmit $request): RedirectResponse
    {
        question::create($request->validated());
        toast("प्रश्न थप्न सफल भयो", "success");
        return redirect()->back();
    }

    public function recover(question $question)
    {
        $question->restore();
        toast("प्रश्न पुनर्स्थापना गर्न सफल भयो", "success");
        return redirect()->back();
    }

    public function destroy(question $question): RedirectResponse
    {
        $question->delete();
        toast("प्रश्न हटाउन सफल भयो", "success");
        return redirect()->back();
    }

}
