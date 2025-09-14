<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceFaq;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Service::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        $services = $query->orderBy('sort_order')->orderBy('title')->paginate(10);

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:services,title',
            'slug' => 'required|string|max:255|unique:services,slug|regex:/^[a-z0-9-]+$/',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'nullable|integer|min:0',
        ], [
            'title.unique' => 'A service with this title already exists. Please choose a different title.',
            'slug.unique' => 'A service with this slug already exists. Please choose a different slug.',
            'slug.regex' => 'Slug can only contain lowercase letters, numbers, and hyphens.',
        ]);

        $data = $request->except(['image']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('services', $imageName, 'public');
            $data['image'] = $imageName;
        }

        $service = Service::create($data);

        // Handle FAQs
        if ($request->has('faqs')) {
            foreach ($request->faqs as $index => $faqData) {
                if (!empty($faqData['question']) && !empty($faqData['answer'])) {
                    ServiceFaq::create([
                        'service_id' => $service->id,
                        'question' => $faqData['question'],
                        'answer' => $faqData['answer'],
                        'is_active' => isset($faqData['is_active']),
                        'sort_order' => $index
                    ]);
                }
            }
        }

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully!');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:services,title,' . $service->id,
            'slug' => 'required|string|max:255|unique:services,slug,' . $service->id . '|regex:/^[a-z0-9-]+$/',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'nullable|integer|min:0',
        ], [
            'title.unique' => 'A service with this title already exists. Please choose a different title.',
            'slug.unique' => 'A service with this slug already exists. Please choose a different slug.',
            'slug.regex' => 'Slug can only contain lowercase letters, numbers, and hyphens.',
        ]);

        $data = $request->except(['image', 'faqs']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($service->image && file_exists(storage_path('app/public/services/' . $service->image))) {
                unlink(storage_path('app/public/services/' . $service->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('services', $imageName, 'public');
            $data['image'] = $imageName;
        }

        $service->update($data);

        // Handle FAQs
        if ($request->has('faqs')) {
            // Delete existing FAQs
            $service->faqs()->delete();
            
            // Create new FAQs
            foreach ($request->faqs as $index => $faqData) {
                if (!empty($faqData['question']) && !empty($faqData['answer'])) {
                    ServiceFaq::create([
                        'service_id' => $service->id,
                        'question' => $faqData['question'],
                        'answer' => $faqData['answer'],
                        'is_active' => isset($faqData['is_active']),
                        'sort_order' => $index
                    ]);
                }
            }
        }

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully!');
    }

    public function destroy(Service $service)
    {
        if ($service->image && file_exists(storage_path('app/public/services/' . $service->image))) {
            unlink(storage_path('app/public/services/' . $service->image));
        }
        
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully!');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);
        
        $services = Service::whereIn('id', $ids)->get();
        foreach ($services as $service) {
            if ($service->image && file_exists(storage_path('app/public/services/' . $service->image))) {
                unlink(storage_path('app/public/services/' . $service->image));
            }
        }
        
        Service::whereIn('id', $ids)->delete();
        return response()->json(['success' => true, 'message' => 'Services deleted successfully!']);
    }
}