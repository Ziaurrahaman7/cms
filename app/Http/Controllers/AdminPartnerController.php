<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminPartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('sort_order')->paginate(10);
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:technology,business,strategic,channel',
            'description' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'nullable|integer',
            'active' => 'boolean'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['is_active'] = $request->has('active');

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('partners', 'public');
        }

        if ($request->has('sections')) {
            $sections = [];
            foreach ($request->sections as $section) {
                if (!empty($section['title'])) {
                    $sectionData = [
                        'title' => $section['title'],
                        'description' => $section['description'] ?? ''
                    ];
                    if (isset($section['image']) && $section['image']) {
                        $sectionData['image'] = $section['image']->store('partners/sections', 'public');
                    }
                    $sections[] = $sectionData;
                }
            }
            $data['sections'] = $sections;
        }

        Partner::create($data);
        return redirect()->route('admin.partners.index')->with('success', 'Partner created successfully.');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:technology,business,strategic,channel',
            'description' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'nullable|integer',
            'active' => 'boolean'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['is_active'] = $request->has('active');

        if ($request->hasFile('logo')) {
            if ($partner->logo) {
                Storage::disk('public')->delete($partner->logo);
            }
            $data['logo'] = $request->file('logo')->store('partners', 'public');
        }

        if ($request->has('sections')) {
            $sections = [];
            foreach ($request->sections as $index => $section) {
                if (!empty($section['title'])) {
                    $sectionData = [
                        'title' => $section['title'],
                        'description' => $section['description'] ?? ''
                    ];
                    
                    // Handle new image upload
                    if ($request->hasFile("sections.{$index}.image")) {
                        $sectionData['image'] = $request->file("sections.{$index}.image")->store('partners/sections', 'public');
                    } elseif (isset($partner->sections[$index]['image'])) {
                        // Keep existing image if no new upload
                        $sectionData['image'] = $partner->sections[$index]['image'];
                    }
                    
                    $sections[] = $sectionData;
                }
            }
            $data['sections'] = $sections;
        }

        $partner->update($data);
        return redirect()->route('admin.partners.index')->with('success', 'Partner updated successfully.');
    }

    public function destroy(Partner $partner)
    {
        if ($partner->logo) {
            Storage::disk('public')->delete($partner->logo);
        }
        $partner->delete();
        return redirect()->route('admin.partners.index')->with('success', 'Partner deleted successfully.');
    }
}
