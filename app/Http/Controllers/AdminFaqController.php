<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class AdminFaqController extends Controller
{
    public function index(Request $request)
    {
        $query = Faq::query();
        
        if ($request->filled('search')) {
            $query->where('question', 'like', '%' . $request->search . '%')
                  ->orWhere('answer', 'like', '%' . $request->search . '%');
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
        
        $faqs = $query->paginate(10);
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|max:255',
            'answer' => 'required',
            'sort_order' => 'nullable|integer'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        Faq::create($data);
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ added successfully');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|max:255',
            'answer' => 'required',
            'sort_order' => 'nullable|integer'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        $faq->update($data);
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully');
    }
    
    public function bulkDelete(Request $request)
    {
        $ids = json_decode($request->ids);
        
        if (empty($ids)) {
            return redirect()->route('admin.faqs.index')->with('error', 'No FAQs selected');
        }
        
        Faq::whereIn('id', $ids)->delete();
        
        return redirect()->route('admin.faqs.index')->with('success', count($ids) . ' FAQs deleted successfully');
    }
}