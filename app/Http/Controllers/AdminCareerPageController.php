<?php

namespace App\Http\Controllers;

use App\Models\CareerPageSetting;
use Illuminate\Http\Request;

class AdminCareerPageController extends Controller
{
    public function index()
    {
        $settings = CareerPageSetting::getSettings();
        return view('admin.career-page.index', compact('settings'));
    }

    public function update(Request $request)
    {
        // Debug: Log the request data
        \Log::info('Career page update request:', $request->all());
        
        $request->validate([
            'hero_title' => 'required|string|max:255',
            'hero_description' => 'nullable|string',
            'hero_button_text' => 'required|string|max:255',
            'why_join_title' => 'required|string|max:255',
            'why_join_description' => 'nullable|string',
            'benefits' => 'nullable|array',
            'benefits.*.title' => 'required_with:benefits|string|max:255',
            'benefits.*.description' => 'required_with:benefits|string',
            'benefits.*.icon' => 'required_with:benefits|string|max:255'
        ]);

        $settings = CareerPageSetting::first();
        
        if (!$settings) {
            $settings = new CareerPageSetting();
        }
        
        $data = $request->all();
        
        // Process benefits
        if (isset($data['benefits'])) {
            $benefits = [];
            foreach ($data['benefits'] as $benefit) {
                if (!empty($benefit['title']) && !empty($benefit['description']) && !empty($benefit['icon'])) {
                    $benefits[] = $benefit;
                }
            }
            $data['benefits'] = $benefits;
        }
        
        $settings->fill($data);
        $settings->save();

        return redirect()->route('admin.career-page.index')->with('success', 'Career page settings updated successfully');
    }
}