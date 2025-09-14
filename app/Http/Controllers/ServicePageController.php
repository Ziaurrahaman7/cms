<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicePageController extends Controller
{
    public function index()
    {
        $services = Service::active()->ordered()->get();
        
        return view('services.index', compact('services'));
    }
}