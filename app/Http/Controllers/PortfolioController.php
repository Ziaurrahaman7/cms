<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::where('is_active', true)->ordered()->get();
        $categories = PortfolioCategory::where('is_active', true)->ordered()->get();
        return view('portfolio.index', compact('portfolios', 'categories'));
    }

    public function show($id)
    {
        $portfolio = Portfolio::where('id', $id)->where('is_active', true)->firstOrFail();
        
        return view('portfolio.show', compact('portfolio'));
    }
}