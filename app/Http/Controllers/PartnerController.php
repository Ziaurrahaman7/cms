<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\PartnerType;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $allPartners = Partner::where('is_active', true)->ordered()->get();
        $partnerTypes = PartnerType::active()->ordered()->get();
        return view('partners.index', compact('allPartners', 'partnerTypes'));
    }

    public function show(Partner $partner)
    {
        if (!$partner->is_active) {
            abort(404);
        }
        
        return view('partners.show', compact('partner'));
    }
}