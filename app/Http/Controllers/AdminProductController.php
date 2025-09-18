<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        $products = $query->orderBy('sort_order')->orderBy('title')->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:products,title',
            'slug' => 'required|string|max:255|unique:products,slug|regex:/^[a-z0-9-]+$/',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data = $request->except(['image', 'features', 'specifications', 'faqs', 'testimonials', 'gallery', 'pricing', 'sections', 'why_choose']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('products', $imageName, 'public');
            $data['image'] = 'products/' . $imageName;
        }

        // Handle testimonial images
        $testimonials = $request->testimonials ?? [];
        if ($testimonials) {
            foreach ($testimonials as $index => $testimonial) {
                if ($request->hasFile("testimonials.{$index}.image")) {
                    $image = $request->file("testimonials.{$index}.image");
                    $imageName = 'testimonial_' . time() . '_' . $index . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('testimonials', $imageName, 'public');
                    $testimonials[$index]['image'] = 'testimonials/' . $imageName;
                }
            }
        }

        // Handle section images
        $sections = $request->sections ?? [];
        if ($sections) {
            foreach ($sections as $index => $section) {
                if ($request->hasFile("sections.{$index}.image")) {
                    $image = $request->file("sections.{$index}.image");
                    $imageName = 'section_' . time() . '_' . $index . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('sections', $imageName, 'public');
                    $sections[$index]['image'] = 'sections/' . $imageName;
                }
            }
        }

        $data['features'] = $request->features ?? [];
        $data['specifications'] = $request->specifications ?? [];
        $data['faqs'] = $request->faqs ?? [];
        $data['testimonials'] = $testimonials;
        $data['gallery'] = $request->gallery ?? [];
        $data['pricing'] = $request->pricing ?? [];
        $data['sections'] = $sections;
        $data['why_choose'] = $request->why_choose ?? [];

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:products,title,' . $product->id,
            'slug' => 'required|string|max:255|unique:products,slug,' . $product->id . '|regex:/^[a-z0-9-]+$/',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data = $request->except(['image', 'features', 'specifications', 'faqs', 'testimonials', 'gallery', 'pricing', 'sections', 'why_choose']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($product->image && file_exists(storage_path('app/public/' . $product->image))) {
                unlink(storage_path('app/public/' . $product->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('products', $imageName, 'public');
            $data['image'] = 'products/' . $imageName;
        }

        // Handle testimonial images
        $testimonials = $request->testimonials ?? [];
        $existingTestimonials = $product->testimonials ?? [];
        if ($testimonials) {
            foreach ($testimonials as $index => $testimonial) {
                if ($request->hasFile("testimonials.{$index}.image")) {
                    $image = $request->file("testimonials.{$index}.image");
                    $imageName = 'testimonial_' . time() . '_' . $index . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('testimonials', $imageName, 'public');
                    $testimonials[$index]['image'] = 'testimonials/' . $imageName;
                } else {
                    // Keep existing image if no new image uploaded
                    if (isset($existingTestimonials[$index]['image'])) {
                        $testimonials[$index]['image'] = $existingTestimonials[$index]['image'];
                    }
                }
            }
        }

        // Handle section images
        $sections = $request->sections ?? [];
        $existingSections = $product->sections ?? [];
        if ($sections) {
            foreach ($sections as $index => $section) {
                if ($request->hasFile("sections.{$index}.image")) {
                    $image = $request->file("sections.{$index}.image");
                    $imageName = 'section_' . time() . '_' . $index . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('sections', $imageName, 'public');
                    $sections[$index]['image'] = 'sections/' . $imageName;
                } else {
                    // Keep existing image if no new image uploaded
                    if (isset($existingSections[$index]['image'])) {
                        $sections[$index]['image'] = $existingSections[$index]['image'];
                    }
                }
            }
        }

        $data['features'] = $request->features ?? [];
        $data['specifications'] = $request->specifications ?? [];
        $data['faqs'] = $request->faqs ?? [];
        $data['testimonials'] = $testimonials;
        $data['gallery'] = $request->gallery ?? [];
        $data['pricing'] = $request->pricing ?? [];
        $data['sections'] = $sections;
        $data['why_choose'] = $request->why_choose ?? [];

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        if ($product->image && file_exists(storage_path('app/public/' . $product->image))) {
            unlink(storage_path('app/public/' . $product->image));
        }
        
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }
}