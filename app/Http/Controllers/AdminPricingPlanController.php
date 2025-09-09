<?php

namespace App\Http\Controllers;

use App\Models\PricingPlan;
use Illuminate\Http\Request;

class AdminPricingPlanController extends Controller
{
    public function index(Request $request)
    {
        $query = PricingPlan::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        $plans = $query->orderBy('sort_order')->orderBy('name')->paginate(10);

        return view('admin.pricing-plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.pricing-plans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|string|max:3',
            'period' => 'required|string|max:255',
            'description' => 'nullable|string',
            'features' => 'required|array|min:1',
            'features.*' => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        PricingPlan::create([
            'name' => $request->name,
            'price' => $request->price,
            'currency' => $request->currency,
            'period' => $request->period,
            'description' => $request->description,
            'features' => array_filter($request->features),
            'is_popular' => $request->has('is_popular'),
            'is_active' => $request->has('is_active'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.pricing-plans.index')->with('success', 'Pricing plan created successfully!');
    }

    public function edit(PricingPlan $pricingPlan)
    {
        return view('admin.pricing-plans.edit', compact('pricingPlan'));
    }

    public function update(Request $request, PricingPlan $pricingPlan)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|string|max:3',
            'period' => 'required|string|max:255',
            'description' => 'nullable|string',
            'features' => 'required|array|min:1',
            'features.*' => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $pricingPlan->update([
            'name' => $request->name,
            'price' => $request->price,
            'currency' => $request->currency,
            'period' => $request->period,
            'description' => $request->description,
            'features' => array_filter($request->features),
            'is_popular' => $request->has('is_popular'),
            'is_active' => $request->has('is_active'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.pricing-plans.index')->with('success', 'Pricing plan updated successfully!');
    }

    public function destroy(PricingPlan $pricingPlan)
    {
        $pricingPlan->delete();
        return redirect()->route('admin.pricing-plans.index')->with('success', 'Pricing plan deleted successfully!');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);
        PricingPlan::whereIn('id', $ids)->delete();
        return response()->json(['success' => true, 'message' => 'Pricing plans deleted successfully!']);
    }
}