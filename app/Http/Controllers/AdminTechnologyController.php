<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use App\Models\TechnologyCategory;
use Illuminate\Http\Request;

class AdminTechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::with('category')->ordered()->paginate(10);
        return view('admin.technologies.index', compact('technologies'));
    }

    public function create()
    {
        $categories = TechnologyCategory::active()->ordered()->get();
        return view('admin.technologies.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'technology_category_id' => 'required|exists:technology_categories,id',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sort_order' => 'nullable|integer'
        ]);

        $data = $request->except(['icon']);
        $data['is_active'] = $request->has('is_active');
        
        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $iconName = time() . '.' . $icon->getClientOriginalExtension();
            $icon->storeAs('technologies', $iconName, 'public');
            $data['icon'] = $iconName;
        }

        Technology::create($data);
        return redirect()->route('admin.technologies.index')->with('success', 'Technology created successfully');
    }

    public function edit(Technology $technology)
    {
        $categories = TechnologyCategory::active()->ordered()->get();
        return view('admin.technologies.edit', compact('technology', 'categories'));
    }

    public function update(Request $request, Technology $technology)
    {
        $request->validate([
            'name' => 'required|max:255',
            'technology_category_id' => 'required|exists:technology_categories,id',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sort_order' => 'nullable|integer'
        ]);

        $data = $request->except(['icon']);
        $data['is_active'] = $request->has('is_active');
        
        if ($request->hasFile('icon')) {
            if ($technology->icon && file_exists(storage_path('app/public/technologies/' . $technology->icon))) {
                unlink(storage_path('app/public/technologies/' . $technology->icon));
            }
            
            $icon = $request->file('icon');
            $iconName = time() . '.' . $icon->getClientOriginalExtension();
            $icon->storeAs('technologies', $iconName, 'public');
            $data['icon'] = $iconName;
        }

        $technology->update($data);
        return redirect()->route('admin.technologies.index')->with('success', 'Technology updated successfully');
    }

    public function destroy(Technology $technology)
    {
        if ($technology->icon && file_exists(storage_path('app/public/technologies/' . $technology->icon))) {
            unlink(storage_path('app/public/technologies/' . $technology->icon));
        }
        
        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('success', 'Technology deleted successfully');
    }
}