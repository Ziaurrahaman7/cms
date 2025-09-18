<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = \App\Models\Partner::ordered()->get();
        return view('partners.index', compact('partners'));
    }

    public function show($slug)
    {
        $partner = Partner::where('slug', $slug)->firstOrFail();
        return view('partners.show', compact('partner'));
    }
}