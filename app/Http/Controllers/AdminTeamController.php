<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class AdminTeamController extends Controller
{
    public function index(Request $request)
    {
        $query = Team::query();
        
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('position', 'like', '%' . $request->search . '%');
        }
        
        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }
        
        switch ($request->get('sort', 'order')) {
            case 'name':
                $query->orderBy('name');
                break;
            case 'latest':
                $query->latest();
                break;
            default:
                $query->ordered();
        }
        
        $teams = $query->paginate(10);
        return view('admin.teams.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'bio' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
            'sort_order' => 'nullable|integer'
        ]);

        $data = $request->except(['image']);
        $data['is_active'] = $request->has('is_active');
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('teams', $imageName, 'public');
            $data['image'] = $imageName;
        }

        Team::create($data);
        return redirect()->route('admin.teams.index')->with('success', 'Team member added successfully');
    }

    public function edit(Team $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'bio' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
            'sort_order' => 'nullable|integer'
        ]);

        $data = $request->except(['image']);
        $data['is_active'] = $request->has('is_active');
        
        if ($request->hasFile('image')) {
            if ($team->image && file_exists(storage_path('app/public/teams/' . $team->image))) {
                unlink(storage_path('app/public/teams/' . $team->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('teams', $imageName, 'public');
            $data['image'] = $imageName;
        }

        $team->update($data);
        return redirect()->route('admin.teams.index')->with('success', 'Team member updated successfully');
    }

    public function destroy(Team $team)
    {
        if ($team->image && file_exists(storage_path('app/public/teams/' . $team->image))) {
            unlink(storage_path('app/public/teams/' . $team->image));
        }
        
        $team->delete();
        return redirect()->route('admin.teams.index')->with('success', 'Team member deleted successfully');
    }
    
    public function bulkDelete(Request $request)
    {
        $ids = json_decode($request->ids);
        
        if (empty($ids)) {
            return redirect()->route('admin.teams.index')->with('error', 'No team members selected');
        }
        
        $teams = Team::whereIn('id', $ids)->get();
        
        foreach ($teams as $team) {
            if ($team->image && file_exists(storage_path('app/public/teams/' . $team->image))) {
                unlink(storage_path('app/public/teams/' . $team->image));
            }
        }
        
        Team::whereIn('id', $ids)->delete();
        
        return redirect()->route('admin.teams.index')->with('success', count($ids) . ' team members deleted successfully');
    }
}