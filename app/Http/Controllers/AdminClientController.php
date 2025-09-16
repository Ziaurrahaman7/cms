<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class AdminClientController extends Controller
{
    public function index(Request $request)
    {
        $query = Client::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $clients = $query->orderBy('sort_order')->orderBy('name')->paginate(10);

        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:private,government,global',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website_url' => 'nullable|url',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data = $request->except(['logo']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->storeAs('clients', $logoName, 'public');
            $data['logo'] = $logoName;
        }

        Client::create($data);

        return redirect()->route('admin.clients.index')->with('success', 'Client created successfully!');
    }

    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:private,government,global',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website_url' => 'nullable|url',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data = $request->except(['logo']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('logo')) {
            if ($client->logo && file_exists(storage_path('app/public/clients/' . $client->logo))) {
                unlink(storage_path('app/public/clients/' . $client->logo));
            }
            
            $logo = $request->file('logo');
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->storeAs('clients', $logoName, 'public');
            $data['logo'] = $logoName;
        }

        $client->update($data);

        return redirect()->route('admin.clients.index')->with('success', 'Client updated successfully!');
    }

    public function destroy(Client $client)
    {
        if ($client->logo && file_exists(storage_path('app/public/clients/' . $client->logo))) {
            unlink(storage_path('app/public/clients/' . $client->logo));
        }
        
        $client->delete();
        return redirect()->route('admin.clients.index')->with('success', 'Client deleted successfully!');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);
        
        $clients = Client::whereIn('id', $ids)->get();
        foreach ($clients as $client) {
            if ($client->logo && file_exists(storage_path('app/public/clients/' . $client->logo))) {
                unlink(storage_path('app/public/clients/' . $client->logo));
            }
        }
        
        Client::whereIn('id', $ids)->delete();
        return response()->json(['success' => true, 'message' => 'Clients deleted successfully!']);
    }
}