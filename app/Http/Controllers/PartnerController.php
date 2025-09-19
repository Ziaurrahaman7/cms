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

    public function show(Partner $partner)
    {
        if (!$partner->is_active) {
            abort(404);
        }
        
        return view('partners.show', compact('partner'));
    }
}