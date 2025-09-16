<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;

class AdminAchievementController extends Controller
{
    public function index(Request $request)
    {
        $query = Achievement::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        $achievements = $query->orderBy('sort_order')->orderBy('title')->paginate(10);

        return view('admin.achievements.index', compact('achievements'));
    }

    public function create()
    {
        return view('admin.achievements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|in:certificate,achievement,award',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'year' => 'required|string|max:4',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data = $request->except(['image']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('achievements', $imageName, 'public');
            $data['image'] = $imageName;
        }

        Achievement::create($data);

        return redirect()->route('admin.achievements.index')->with('success', 'Achievement created successfully!');
    }

    public function edit(Achievement $achievement)
    {
        return view('admin.achievements.edit', compact('achievement'));
    }

    public function update(Request $request, Achievement $achievement)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|in:certificate,achievement,award',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'year' => 'required|string|max:4',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data = $request->except(['image']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($achievement->image && file_exists(storage_path('app/public/achievements/' . $achievement->image))) {
                unlink(storage_path('app/public/achievements/' . $achievement->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('achievements', $imageName, 'public');
            $data['image'] = $imageName;
        }

        $achievement->update($data);

        return redirect()->route('admin.achievements.index')->with('success', 'Achievement updated successfully!');
    }

    public function destroy(Achievement $achievement)
    {
        if ($achievement->image && file_exists(storage_path('app/public/achievements/' . $achievement->image))) {
            unlink(storage_path('app/public/achievements/' . $achievement->image));
        }
        
        $achievement->delete();
        return redirect()->route('admin.achievements.index')->with('success', 'Achievement deleted successfully!');
    }
}