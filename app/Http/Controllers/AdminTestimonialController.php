<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class AdminTestimonialController extends Controller
{
    public function index(Request $request)
    {
        $query = Testimonial::query();
        
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('position', 'like', '%' . $request->search . '%')
                  ->orWhere('message', 'like', '%' . $request->search . '%');
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
        
        $testimonials = $query->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'organization' => 'nullable|max:255',
            'message' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'sort_order' => 'nullable|integer'
        ]);

        $data = $request->except(['image']);
        $data['is_active'] = $request->has('is_active');
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('testimonials', $imageName, 'public');
            $data['image'] = $imageName;
        }

        Testimonial::create($data);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial added successfully');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'organization' => 'nullable|max:255',
            'message' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'sort_order' => 'nullable|integer'
        ]);

        $data = $request->except(['image']);
        $data['is_active'] = $request->has('is_active');
        
        if ($request->hasFile('image')) {
            if ($testimonial->image && file_exists(storage_path('app/public/testimonials/' . $testimonial->image))) {
                unlink(storage_path('app/public/testimonials/' . $testimonial->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('testimonials', $imageName, 'public');
            $data['image'] = $imageName;
        }

        $testimonial->update($data);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->image && file_exists(storage_path('app/public/testimonials/' . $testimonial->image))) {
            unlink(storage_path('app/public/testimonials/' . $testimonial->image));
        }
        
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully');
    }
    
    public function bulkDelete(Request $request)
    {
        $ids = json_decode($request->ids);
        
        if (empty($ids)) {
            return redirect()->route('admin.testimonials.index')->with('error', 'No testimonials selected');
        }
        
        $testimonials = Testimonial::whereIn('id', $ids)->get();
        
        foreach ($testimonials as $testimonial) {
            if ($testimonial->image && file_exists(storage_path('app/public/testimonials/' . $testimonial->image))) {
                unlink(storage_path('app/public/testimonials/' . $testimonial->image));
            }
        }
        
        Testimonial::whereIn('id', $ids)->delete();
        
        return redirect()->route('admin.testimonials.index')->with('success', count($ids) . ' testimonials deleted successfully');
    }
}