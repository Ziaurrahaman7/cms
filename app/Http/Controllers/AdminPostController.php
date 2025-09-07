<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::query();
        
        // Search filter
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
        }
        
        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        // Sorting
        switch ($request->get('sort', 'latest')) {
            case 'oldest':
                $query->oldest();
                break;
            case 'title':
                $query->orderBy('title');
                break;
            default:
                $query->latest();
        }
        
        $posts = $query->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'nullable|unique:posts,slug|max:255',
            'content' => 'required',
            'status' => 'required|in:draft,published',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_title' => 'nullable|max:60',
            'meta_description' => 'nullable|max:160',
            'meta_keywords' => 'nullable|max:255'
        ]);

        $data = $request->all();

        // Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = \Str::slug($data['title']);
        }

        \Log::info('Store method called');
        \Log::info('Has image file: ' . ($request->hasFile('image') ? 'yes' : 'no'));
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            \Log::info('Storing image: ' . $imageName);
            $stored = $image->storeAs('posts', $imageName, 'public');
            \Log::info('Storage result: ' . ($stored ? 'success' : 'failed'));
            $data['image'] = $imageName;
        } else {
            \Log::info('No image file in request');
        }



        Post::create($data);
        
        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'nullable|unique:posts,slug,' . $post->id . '|max:255',
            'content' => 'required',
            'status' => 'required|in:draft,published',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_title' => 'nullable|max:60',
            'meta_description' => 'nullable|max:160',
            'meta_keywords' => 'nullable|max:255'
        ]);

        $data = $request->except(['image']);

        // Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = \Str::slug($data['title']);
        }

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($post->image && file_exists(storage_path('app/public/posts/' . $post->image))) {
                unlink(storage_path('app/public/posts/' . $post->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('posts', $imageName, 'public');
            $data['image'] = $imageName;
        }

        $post->update($data);
        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        // Delete image if exists
        if ($post->image && file_exists(storage_path('app/public/posts/' . $post->image))) {
            unlink(storage_path('app/public/posts/' . $post->image));
        }
        
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully');
    }
    
    public function bulkDelete(Request $request)
    {
        $ids = json_decode($request->ids);
        
        if (empty($ids)) {
            return redirect()->route('admin.posts.index')->with('error', 'No posts selected');
        }
        
        $posts = Post::whereIn('id', $ids)->get();
        
        // Delete images
        foreach ($posts as $post) {
            if ($post->image && file_exists(storage_path('app/public/posts/' . $post->image))) {
                unlink(storage_path('app/public/posts/' . $post->image));
            }
        }
        
        Post::whereIn('id', $ids)->delete();
        
        return redirect()->route('admin.posts.index')->with('success', count($ids) . ' posts deleted successfully');
    }
}
