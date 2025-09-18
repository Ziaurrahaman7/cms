<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;

class AdminPortfolioController extends Controller
{
    public function index(Request $request)
    {
        $query = Portfolio::query();
        
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%')
                  ->orWhere('client', 'like', '%' . $request->search . '%');
        }
        
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        
        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }
        
        switch ($request->get('sort', 'order')) {
            case 'latest':
                $query->latest();
                break;
            default:
                $query->ordered();
        }
        
        $portfolios = $query->paginate(10);
        $categories = PortfolioCategory::active()->ordered()->get();
        return view('admin.portfolios.index', compact('portfolios', 'categories'));
    }

    public function create()
    {
        $categories = PortfolioCategory::active()->ordered()->get();
        return view('admin.portfolios.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'client' => 'nullable|max:255',
            'project_url' => 'nullable|url',
            'project_date' => 'nullable|date',
            'sort_order' => 'nullable|integer'
        ]);

        $data = $request->except(['image']);
        $data['is_active'] = $request->has('is_active');
        
        // Handle work process with images
        if ($request->has('work_process')) {
            $workProcess = [];
            foreach ($request->work_process as $index => $item) {
                if (!empty($item['title']) || !empty($item['description'])) {
                    if ($request->hasFile("work_process.{$index}.image")) {
                        $image = $request->file("work_process.{$index}.image");
                        $imageName = time() . '_wp_' . $index . '.' . $image->getClientOriginalExtension();
                        $image->storeAs('portfolios', $imageName, 'public');
                        $item['image'] = $imageName;
                    }
                    $workProcess[] = $item;
                }
            }
            $data['work_process'] = !empty($workProcess) ? $workProcess : null;
        }
        
        // Handle business cases with images
        if ($request->has('business_cases')) {
            $businessCases = [];
            foreach ($request->business_cases as $index => $item) {
                if (!empty($item['title']) || !empty($item['description'])) {
                    if ($request->hasFile("business_cases.{$index}.image")) {
                        $image = $request->file("business_cases.{$index}.image");
                        $imageName = time() . '_bc_' . $index . '.' . $image->getClientOriginalExtension();
                        $image->storeAs('portfolios', $imageName, 'public');
                        $item['image'] = $imageName;
                    }
                    $businessCases[] = $item;
                }
            }
            $data['business_cases'] = !empty($businessCases) ? $businessCases : null;
        }
        
        $data['client_reviews'] = $request->has('client_reviews') ? array_filter($request->client_reviews, function($item) {
            return !empty($item['name']) || !empty($item['message']);
        }) : null;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('portfolios', $imageName, 'public');
            $data['image'] = $imageName;
        }

        Portfolio::create($data);
        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio added successfully');
    }

    public function edit(Portfolio $portfolio)
    {
        $categories = PortfolioCategory::active()->ordered()->get();
        return view('admin.portfolios.edit', compact('portfolio', 'categories'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'client' => 'nullable|max:255',
            'project_url' => 'nullable|url',
            'project_date' => 'nullable|date',
            'sort_order' => 'nullable|integer'
        ]);

        $data = $request->except(['image', '_token', '_method']);
        $data['is_active'] = $request->has('is_active');
        
        // Handle work process with images
        if ($request->has('work_process')) {
            $workProcess = [];
            foreach ($request->work_process as $index => $item) {
                if (!empty($item['title']) || !empty($item['description'])) {
                    if ($request->hasFile("work_process.{$index}.image")) {
                        $image = $request->file("work_process.{$index}.image");
                        $imageName = time() . '_wp_' . $index . '.' . $image->getClientOriginalExtension();
                        $image->storeAs('portfolios', $imageName, 'public');
                        $item['image'] = $imageName;
                    } elseif (isset($portfolio->work_process[$index]['image'])) {
                        $item['image'] = $portfolio->work_process[$index]['image'];
                    }
                    $workProcess[] = $item;
                }
            }
            $data['work_process'] = !empty($workProcess) ? $workProcess : null;
        }
        
        // Handle business cases with images
        if ($request->has('business_cases')) {
            $businessCases = [];
            foreach ($request->business_cases as $index => $item) {
                if (!empty($item['title']) || !empty($item['description'])) {
                    if ($request->hasFile("business_cases.{$index}.image")) {
                        $image = $request->file("business_cases.{$index}.image");
                        $imageName = time() . '_bc_' . $index . '.' . $image->getClientOriginalExtension();
                        $image->storeAs('portfolios', $imageName, 'public');
                        $item['image'] = $imageName;
                    } elseif (isset($portfolio->business_cases[$index]['image'])) {
                        $item['image'] = $portfolio->business_cases[$index]['image'];
                    }
                    $businessCases[] = $item;
                }
            }
            $data['business_cases'] = !empty($businessCases) ? $businessCases : null;
        }
        
        $data['client_reviews'] = $request->has('client_reviews') ? array_filter($request->client_reviews, function($item) {
            return !empty($item['name']) || !empty($item['message']);
        }) : null;
        
        if ($request->hasFile('image')) {
            if ($portfolio->image && file_exists(storage_path('app/public/portfolios/' . $portfolio->image))) {
                unlink(storage_path('app/public/portfolios/' . $portfolio->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('portfolios', $imageName, 'public');
            $data['image'] = $imageName;
        }

        $portfolio->update($data);
        
        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio updated successfully');
    }

    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image && file_exists(storage_path('app/public/portfolios/' . $portfolio->image))) {
            unlink(storage_path('app/public/portfolios/' . $portfolio->image));
        }
        
        $portfolio->delete();
        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio deleted successfully');
    }
    
    public function bulkDelete(Request $request)
    {
        $ids = json_decode($request->ids);
        
        if (empty($ids)) {
            return redirect()->route('admin.portfolios.index')->with('error', 'No portfolios selected');
        }
        
        $portfolios = Portfolio::whereIn('id', $ids)->get();
        
        foreach ($portfolios as $portfolio) {
            if ($portfolio->image && file_exists(storage_path('app/public/portfolios/' . $portfolio->image))) {
                unlink(storage_path('app/public/portfolios/' . $portfolio->image));
            }
        }
        
        Portfolio::whereIn('id', $ids)->delete();
        
        return redirect()->route('admin.portfolios.index')->with('success', count($ids) . ' portfolios deleted successfully');
    }
}