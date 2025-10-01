<?php

namespace App\Http\Controllers;

use App\Models\CTASection;
use Illuminate\Http\Request;

class AdminCTASectionController extends Controller
{
    public function index()
    {
        $ctaSections = CTASection::all();
        return view('admin.cta-sections.index', compact('ctaSections'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'sections' => 'required|array'
        ]);

        foreach ($request->sections as $key => $data) {
            CTASection::updateOrCreate(
                ['section_key' => $key],
                [
                    'title' => $data['title'],
                    'description' => $data['description'] ?? null,
                    'button_text' => $data['button_text'] ?? null,
                    'button_link' => $data['button_link'] ?? null,
                    'secondary_button_text' => $data['secondary_button_text'] ?? null,
                    'secondary_button_link' => $data['secondary_button_link'] ?? null,
                    'is_active' => isset($data['is_active']) && $data['is_active'] == '1'
                ]
            );
        }

        return redirect()->back()->with('success', 'CTA sections updated successfully!');
    }
}