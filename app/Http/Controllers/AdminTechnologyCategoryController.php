<?php

namespace App\Http\Controllers;

use App\Models\TechnologyCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminTechnologyCategoryController extends Controller
{
    public function index()
    {
        $categories = TechnologyCategory::ordered()->paginate(10);
        return view('admin.technology-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.technology-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'nullable|max:255|unique:technology_categories,slug',
            'description' => 'nullable',
            'sort_order' => 'nullable|integer'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        TechnologyCategory::create($data);
        return redirect()->route('admin.technology-categories.index')->with('success', 'Technology Category created successfully');
    }

    public function edit(TechnologyCategory $technologyCategory)
    {
        return view('admin.technology-categories.edit', compact('technologyCategory'));
    }

    public function update(Request $request, TechnologyCategory $technologyCategory)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'nullable|max:255|unique:technology_categories,slug,' . $technologyCategory->id,
            'description' => 'nullable',
            'sort_order' => 'nullable|integer'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $technologyCategory->update($data);
        return redirect()->route('admin.technology-categories.index')->with('success', 'Technology Category updated successfully');
    }

    public function destroy(TechnologyCategory $technologyCategory)
    {
        $technologyCategory->delete();
        return redirect()->route('admin.technology-categories.index')->with('success', 'Technology Category deleted successfully');
    }
}