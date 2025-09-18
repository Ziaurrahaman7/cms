<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'cv' => 'required|file|mimes:pdf|max:5120'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'position' => $request->subject,
            'message' => $request->message,
            'status' => 'new'
        ];

        if ($request->hasFile('cv')) {
            $data['cv_file'] = $request->file('cv')->store('job-applications', 'public');
        }

        JobApplication::create($data);

        return redirect()->back()->with('success', 'Your application has been submitted successfully!');
    }
}