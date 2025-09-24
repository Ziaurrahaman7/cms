<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Faq;
use App\Models\Post;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $teams = Team::active()->ordered()->get();
        $faqs = Faq::active()->ordered()->get();
        $latestPosts = Post::where('status', 'published')->latest()->take(6)->get();
        $achievements = \App\Models\Achievement::active()->ordered()->take(6)->get();
        
        return view('about.index', compact('teams', 'faqs', 'latestPosts', 'achievements'));
    }
    
    public function certificates()
    {
        $achievements = \App\Models\Achievement::active()->ordered()->get();
        
        return view('about.certificates', compact('achievements'));
    }
}