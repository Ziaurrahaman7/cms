<?php

namespace App\Http\Controllers;

use App\Models\PartnerType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPartnerTypeController extends Controller
{
    public function index()
    {
        $partnerTypes = PartnerType::ordered()->get();
        return view('admin.partner-types.index', compact('partnerTypes'));
    }

    public function create()
    {
        return view('admin.partner-types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer'
        ]);

        PartnerType::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.partner-types.index')->with('success', 'Partner type created successfully');
    }

    public function edit(PartnerType $partnerType)
    {
        return view('admin.partner-types.edit', compact('partnerType'));
    }

    public function update(Request $request, PartnerType $partnerType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer'
        ]);

        $partnerType->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.partner-types.index')->with('success', 'Partner type updated successfully');
    }

    public function destroy(PartnerType $partnerType)
    {
        // Check if any partners are using this partner type
        $partnersCount = \App\Models\Partner::where('type', $partnerType->slug)->count();
        
        if ($partnersCount > 0) {
            return redirect()->route('admin.partner-types.index')
                ->with('error', 'Cannot delete this partner type because it is being used by ' . $partnersCount . ' partner(s). Please reassign or delete those partners first.');
        }
        
        $partnerType->delete();
        return redirect()->route('admin.partner-types.index')->with('success', 'Partner type deleted successfully');
    }
}