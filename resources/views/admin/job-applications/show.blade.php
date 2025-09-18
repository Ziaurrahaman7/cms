@extends('dashboard')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Job Application Details</h1>
        <a href="{{ route('admin.job-applications.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg">
            Back to Applications
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <p class="text-lg text-gray-900">{{ $jobApplication->name }}</p>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <p class="text-lg text-gray-900">{{ $jobApplication->email }}</p>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700">Phone</label>
                <p class="text-lg text-gray-900">{{ $jobApplication->phone ?: 'Not provided' }}</p>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700">Position Applied</label>
                <p class="text-lg text-gray-900">{{ $jobApplication->position }}</p>
            </div>
        </div>
        
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Status</label>
                <form action="{{ route('admin.job-applications.update-status', $jobApplication) }}" method="POST" class="flex gap-2">
                    @csrf
                    @method('PATCH')
                    <select name="status" class="px-3 py-2 border border-gray-300 rounded-md">
                        <option value="new" {{ $jobApplication->status == 'new' ? 'selected' : '' }}>New</option>
                        <option value="reviewed" {{ $jobApplication->status == 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                        <option value="shortlisted" {{ $jobApplication->status == 'shortlisted' ? 'selected' : '' }}>Shortlisted</option>
                        <option value="rejected" {{ $jobApplication->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Update</button>
                </form>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700">CV File</label>
                @if($jobApplication->cv_file)
                    <a href="{{ route('admin.job-applications.download-cv', $jobApplication) }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Download CV
                    </a>
                @else
                    <p class="text-gray-500">No CV uploaded</p>
                @endif
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700">Applied Date</label>
                <p class="text-lg text-gray-900">{{ $jobApplication->created_at->format('M d, Y h:i A') }}</p>
            </div>
        </div>
    </div>
    
    <div class="mt-6">
        <label class="block text-sm font-medium text-gray-700 mb-2">Cover Letter</label>
        <div class="bg-gray-50 p-4 rounded-lg">
            <p class="text-gray-900 whitespace-pre-wrap">{{ $jobApplication->message }}</p>
        </div>
    </div>
</div>
@endsection