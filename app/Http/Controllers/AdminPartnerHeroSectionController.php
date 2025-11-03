<?php

namespace App\Http\Controllers;

use App\Models\PartnerHeroSection;
use Illuminate\Http\Request;

class AdminPartnerHeroSectionController extends Controller
{
    public function index()
    {
        $heroSection = PartnerHeroSection::first();
        return view('admin.partner-hero-sections.index', compact('heroSection'));
    }

    public function create()
    {
        if (PartnerHeroSection::exists()) {
            return redirect()->route('admin.partner-hero-sections.index');
        }
        return view('admin.partner-hero-sections.create');
    }

    public function store(Request $request)
    {
        if (PartnerHeroSection::exists()) {
            return redirect()->route('admin.partner-hero-sections.index');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'our_partners_title' => 'required|string|max:255',
            'our_partners_description' => 'required|string',
            'worldwide_partners_title' => 'required|string|max:255',
            'worldwide_partners_description' => 'required|string',
        ]);

        PartnerHeroSection::create($request->only(['title', 'short_description', 'our_partners_title', 'our_partners_description', 'worldwide_partners_title', 'worldwide_partners_description']));

        return redirect()->route('admin.partner-hero-sections.index')->with('success', 'Partner Hero Section created successfully!');
    }

    public function edit(PartnerHeroSection $partnerHeroSection)
    {
        return view('admin.partner-hero-sections.edit', compact('partnerHeroSection'));
    }

    public function update(Request $request, PartnerHeroSection $partnerHeroSection)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'our_partners_title' => 'required|string|max:255',
            'our_partners_description' => 'required|string',
            'worldwide_partners_title' => 'required|string|max:255',
            'worldwide_partners_description' => 'required|string',
        ]);

        $partnerHeroSection->update($request->only(['title', 'short_description', 'our_partners_title', 'our_partners_description', 'worldwide_partners_title', 'worldwide_partners_description']));

        return redirect()->route('admin.partner-hero-sections.index')->with('success', 'Partner Hero Section updated successfully!');
    }
}