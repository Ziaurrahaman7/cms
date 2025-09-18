<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminJobApplicationController extends Controller
{
    public function index(Request $request)
    {
        $query = JobApplication::query();
        
        if ($request->status) {
            $query->where('status', $request->status);
        }
        
        if ($request->position) {
            $query->where('position', 'like', '%' . $request->position . '%');
        }
        
        $applications = $query->latest()->paginate(10);
        $positions = JobApplication::distinct()->pluck('position');
        
        return view('admin.job-applications.index', compact('applications', 'positions'));
    }

    public function show(JobApplication $jobApplication)
    {
        return view('admin.job-applications.show', compact('jobApplication'));
    }

    public function updateStatus(Request $request, JobApplication $jobApplication)
    {
        $request->validate([
            'status' => 'required|in:new,reviewed,shortlisted,rejected'
        ]);

        $jobApplication->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Status updated successfully.');
    }

    public function downloadCv(JobApplication $jobApplication)
    {
        if ($jobApplication->cv_file && Storage::disk('public')->exists($jobApplication->cv_file)) {
            return Storage::disk('public')->download($jobApplication->cv_file, $jobApplication->name . '_CV.pdf');
        }
        return redirect()->back()->with('error', 'CV file not found.');
    }

    public function destroy(JobApplication $jobApplication)
    {
        if ($jobApplication->cv_file) {
            Storage::disk('public')->delete($jobApplication->cv_file);
        }
        $jobApplication->delete();
        return redirect()->route('admin.job-applications.index')->with('success', 'Application deleted successfully.');
    }
}
