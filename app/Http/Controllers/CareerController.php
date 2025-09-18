<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $jobs = \App\Models\Job::active()->ordered()->get();
        return view('careers.index', compact('jobs'));
    }
}
