<?php

namespace App\Http\Controllers;

use App\Models\WorldwidePartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminWorldwidePartnerController extends Controller
{
    public function index()
    {
        $partners = WorldwidePartner::orderBy('sort_order')->paginate(10);
        return view('admin.worldwide-partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.worldwide-partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'nullable|integer',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('worldwide-partners', 'public');
        }

        WorldwidePartner::create($data);
        return redirect()->route('admin.worldwide-partners.index')->with('success', 'Worldwide Partner created successfully.');
    }

    public function edit(WorldwidePartner $worldwidePartner)
    {
        return view('admin.worldwide-partners.edit', compact('worldwidePartner'));
    }

    public function update(Request $request, WorldwidePartner $worldwidePartner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'nullable|integer',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('logo')) {
            if ($worldwidePartner->logo) {
                Storage::disk('public')->delete($worldwidePartner->logo);
            }
            $data['logo'] = $request->file('logo')->store('worldwide-partners', 'public');
        }

        $worldwidePartner->update($data);
        return redirect()->route('admin.worldwide-partners.index')->with('success', 'Worldwide Partner updated successfully.');
    }

    public function destroy(WorldwidePartner $worldwidePartner)
    {
        if ($worldwidePartner->logo) {
            Storage::disk('public')->delete($worldwidePartner->logo);
        }
        $worldwidePartner->delete();
        return redirect()->route('admin.worldwide-partners.index')->with('success', 'Worldwide Partner deleted successfully.');
    }
}