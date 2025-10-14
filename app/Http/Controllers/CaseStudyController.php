<?php

namespace App\Http\Controllers;

use App\Models\CaseStudyNew;
use Illuminate\Http\Request;

class CaseStudyController extends Controller
{
    public function index()
    {
        $caseStudies = CaseStudyNew::with('service')->active()->ordered()->get();
        
        return view('case-study.index', compact('caseStudies'));
    }
    
    public function show($slug)
    {
        $caseStudy = CaseStudyNew::with('service')->where('slug', $slug)->where('is_active', true)->firstOrFail();
        
        return view('case-study.show', compact('caseStudy'));
    }
}