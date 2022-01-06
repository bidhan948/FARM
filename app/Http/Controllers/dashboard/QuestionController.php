<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\question;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(): View
    {
        return view('dashboard.question',[
            'questions' => question::query()->latest()->get()
        ]);
    }
}
