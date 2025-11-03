<?php

namespace App\Http\Controllers;

use App\Models\WebsiteContent;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }
    
    public function content()
    {
        $contents = WebsiteContent::all()->groupBy('section');
        return view('admin.content', compact('contents'));
    }
    
    public function updateContent(Request $request)
    {
        foreach ($request->content as $section => $items) {
            foreach ($items as $key => $value) {
                WebsiteContent::updateOrCreate(
                    ['section' => $section, 'key' => $key],
                    ['value' => $value]
                );
            }
        }
        
        return redirect()->back()->with('success', 'Content updated successfully!');
    }
}