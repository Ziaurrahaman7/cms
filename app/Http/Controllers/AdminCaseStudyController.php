<?php

namespace App\Http\Controllers;

use App\Models\CaseStudyNew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCaseStudyController extends Controller
{
    public function index()
    {
        $caseStudies = CaseStudyNew::ordered()->paginate(10);
        return view('admin.case-studies.index', compact('caseStudies'));
    }

    public function create()
    {
        return view('admin.case-studies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string'
        ]);

        $data = $request->except(['_token']);
        
        // Handle featured image
        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('case-studies', 'public');
        }
        
        // Handle other images
        $imageFields = ['challenges_image', 'solutions_image', 'results_image'];
        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('case-studies', 'public');
            }
        }
        
        // Handle client testimonial image
        if ($request->hasFile('client_testimonial.image')) {
            if (!isset($data['client_testimonial'])) {
                $data['client_testimonial'] = [];
            }
            $data['client_testimonial']['image'] = $request->file('client_testimonial.image')->store('case-studies', 'public');
        }
        
        // Handle sections images
        if (isset($data['sections']) && is_array($data['sections'])) {
            foreach ($data['sections'] as $index => $section) {
                if ($request->hasFile("sections.{$index}.image")) {
                    $data['sections'][$index]['image'] = $request->file("sections.{$index}.image")->store('case-studies', 'public');
                }
            }
        }

        // Handle JSON fields
        $jsonFields = ['sections', 'work_process', 'technologies', 'client_testimonial'];
        foreach ($jsonFields as $field) {
            if (isset($data[$field])) {
                $data[$field] = is_array($data[$field]) ? $data[$field] : json_decode($data[$field], true);
            }
        }

        CaseStudyNew::create($data);

        return redirect()->route('admin.case-studies.index')->with('success', 'Case study created successfully!');
    }

    public function show(CaseStudyNew $caseStudy)
    {
        return view('admin.case-studies.show', compact('caseStudy'));
    }

    public function edit(CaseStudyNew $caseStudy)
    {
        return view('admin.case-studies.edit', compact('caseStudy'));
    }

    public function update(Request $request, CaseStudyNew $caseStudy)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string'
        ]);

        $data = $request->except(['_token', '_method']);
        
        // Handle featured image
        if ($request->hasFile('featured_image')) {
            if ($caseStudy->featured_image) {
                Storage::disk('public')->delete($caseStudy->featured_image);
            }
            $data['featured_image'] = $request->file('featured_image')->store('case-studies', 'public');
        } else {
            unset($data['featured_image']);
        }
        
        // Handle other images
        $imageFields = ['challenges_image', 'solutions_image', 'results_image'];
        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('case-studies', 'public');
            } else {
                unset($data[$field]);
            }
        }
        
        // Handle client testimonial image
        if ($request->hasFile('client_testimonial.image')) {
            $testimonial = $data['client_testimonial'] ?? $caseStudy->client_testimonial ?? [];
            $testimonial['image'] = $request->file('client_testimonial.image')->store('case-studies', 'public');
            $data['client_testimonial'] = $testimonial;
        }
        
        // Handle sections images
        if (isset($data['sections']) && is_array($data['sections'])) {
            foreach ($data['sections'] as $index => $section) {
                if ($request->hasFile("sections.{$index}.image")) {
                    $data['sections'][$index]['image'] = $request->file("sections.{$index}.image")->store('case-studies', 'public');
                }
            }
        }

        // Handle JSON fields
        $jsonFields = ['sections', 'work_process', 'technologies', 'client_testimonial'];
        foreach ($jsonFields as $field) {
            if (isset($data[$field])) {
                $data[$field] = is_array($data[$field]) ? $data[$field] : json_decode($data[$field], true);
            }
        }

        $caseStudy->update($data);

        return redirect()->route('admin.case-studies.index')->with('success', 'Case study updated successfully!');
    }

    public function destroy(CaseStudyNew $caseStudy)
    {
        if ($caseStudy->featured_image) {
            Storage::disk('public')->delete($caseStudy->featured_image);
        }
        
        $caseStudy->delete();

        return redirect()->route('admin.case-studies.index')->with('success', 'Case study deleted successfully!');
    }
}