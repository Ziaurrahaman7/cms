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

        $data = $request->except(['image', 'key_features', 'we_serve', 'service_overview', 'technologies', 'portfolio_items', 'process_steps']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('services', $imageName, 'public');
            $data['image'] = 'services/' . $imageName;
        }

        // Handle JSON fields
        $data['key_features'] = $this->processKeyFeatures($request);
        $data['we_serve'] = $request->we_serve ?? [];
        $data['service_overview'] = $request->service_overview ?? [];
        $data['technologies'] = $request->technologies ?? [];
        $data['portfolio_items'] = $this->processPortfolioItems($request);
        $data['process_steps'] = $request->process_steps ?? [];

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

        $data = $request->except(['image', 'faqs', 'key_features', 'we_serve', 'service_overview', 'technologies', 'portfolio_items', 'process_steps']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($service->image && file_exists(storage_path('app/public/' . $service->image))) {
                unlink(storage_path('app/public/' . $service->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('services', $imageName, 'public');
            $data['image'] = 'services/' . $imageName;
        }

        // Handle JSON fields
        $data['key_features'] = $this->processKeyFeatures($request, $service->key_features ?? []);
        $data['we_serve'] = $request->we_serve ?? [];
        $data['service_overview'] = $request->service_overview ?? [];
        $data['technologies'] = $request->technologies ?? [];
        $data['portfolio_items'] = $this->processPortfolioItems($request, $service->portfolio_items ?? []);
        $data['process_steps'] = $request->process_steps ?? [];

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
        if ($service->image && file_exists(storage_path('app/public/' . $service->image))) {
            unlink(storage_path('app/public/' . $service->image));
        }
        
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully!');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);
        
        $services = Service::whereIn('id', $ids)->get();
        foreach ($services as $service) {
            if ($service->image && file_exists(storage_path('app/public/' . $service->image))) {
                unlink(storage_path('app/public/' . $service->image));
            }
        }
        
        Service::whereIn('id', $ids)->delete();
        return response()->json(['success' => true, 'message' => 'Services deleted successfully!']);
    }

    private function processKeyFeatures(Request $request, $existingFeatures = [])
    {
        $features = [];
        if ($request->has('key_features')) {
            foreach ($request->key_features as $index => $feature) {
                if (!empty($feature['title'])) {
                    $featureData = [
                        'title' => $feature['title'],
                        'description' => $feature['description'] ?? '',
                    ];
                    
                    if ($request->hasFile("key_features.{$index}.image")) {
                        $image = $request->file("key_features.{$index}.image");
                        $imageName = 'feature_' . time() . '_' . $index . '.' . $image->getClientOriginalExtension();
                        $image->storeAs('services/features', $imageName, 'public');
                        $featureData['image'] = 'services/features/' . $imageName;
                    } elseif (isset($existingFeatures[$index]['image'])) {
                        $featureData['image'] = $existingFeatures[$index]['image'];
                    }
                    
                    $features[] = $featureData;
                }
            }
        }
        return $features;
    }

    private function processPortfolioItems(Request $request, $existingItems = [])
    {
        $items = [];
        if ($request->has('portfolio_items')) {
            foreach ($request->portfolio_items as $index => $item) {
                if ($request->hasFile("portfolio_items.{$index}.image")) {
                    $image = $request->file("portfolio_items.{$index}.image");
                    $imageName = 'portfolio_' . time() . '_' . $index . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('services/portfolio', $imageName, 'public');
                    $items[] = ['image' => 'services/portfolio/' . $imageName];
                } elseif (isset($existingItems[$index]['image'])) {
                    $items[] = ['image' => $existingItems[$index]['image']];
                } else {
                    // Keep existing items even if no new image uploaded
                    if (isset($existingItems[$index])) {
                        $items[] = $existingItems[$index];
                    }
                }
            }
        } else {
            // If no portfolio_items in request, keep existing items
            $items = $existingItems;
        }
        return $items;
    }
}