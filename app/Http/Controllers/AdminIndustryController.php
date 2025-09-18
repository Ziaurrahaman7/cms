<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use Illuminate\Http\Request;

class AdminIndustryController extends Controller
{
    public function index(Request $request)
    {
        $query = Industry::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        $industries = $query->orderBy('sort_order')->orderBy('title')->paginate(10);

        return view('admin.industries.index', compact('industries'));
    }

    public function create()
    {
        return view('admin.industries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data = $request->except(['image']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('industries', $imageName, 'public');
            $data['image'] = 'industries/' . $imageName;
        }

        Industry::create($data);

        return redirect()->route('admin.industries.index')->with('success', 'Industry created successfully!');
    }

    public function edit(Industry $industry)
    {
        return view('admin.industries.edit', compact('industry'));
    }

    public function update(Request $request, Industry $industry)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data = $request->except(['image']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($industry->image && file_exists(storage_path('app/public/' . $industry->image))) {
                unlink(storage_path('app/public/' . $industry->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('industries', $imageName, 'public');
            $data['image'] = 'industries/' . $imageName;
        }

        $industry->update($data);

        return redirect()->route('admin.industries.index')->with('success', 'Industry updated successfully!');
    }

    public function destroy(Industry $industry)
    {
        if ($industry->image && file_exists(storage_path('app/public/' . $industry->image))) {
            unlink(storage_path('app/public/' . $industry->image));
        }
        
        $industry->delete();
        return redirect()->route('admin.industries.index')->with('success', 'Industry deleted successfully!');
    }
}