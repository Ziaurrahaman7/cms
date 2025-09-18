<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class CaseStudyController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::active()->ordered()->get();
        
        return view('case-study.index', compact('portfolios'));
    }
    
    public function show(Portfolio $portfolio)
    {
        return view('case-study.show', compact('portfolio'));
    }
}