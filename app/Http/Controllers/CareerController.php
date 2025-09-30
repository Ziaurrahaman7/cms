<?php

namespace App\Http\Controllers;

use App\Models\CareerPageSetting;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $jobs = \App\Models\Job::active()->ordered()->get();
        $careerSettings = CareerPageSetting::getSettings();
        return view('careers.index', compact('jobs', 'careerSettings'));
    }
}
