<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::active()->ordered()->get();
        
        return view('contact.index', compact('testimonials'));
    }
}