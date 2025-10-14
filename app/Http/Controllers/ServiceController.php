<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function show($slug)
    {
        $service = Service::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $service->load(['faqs' => function($query) {
            $query->where('is_active', true)->orderBy('sort_order');
        }]);
        
        $relatedCaseStudies = \App\Models\CaseStudyNew::where('service_id', $service->id)
            ->where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
        
        return view('services.show', compact('service', 'relatedCaseStudies'));
    }
}