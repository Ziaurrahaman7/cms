@extends('dashboard')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="p-6 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Partner Hero Section</h2>
                <p class="text-gray-600 mt-1">Manage partner page hero section content</p>
            </div>
            @if(!$heroSection)
            <a href="{{ route('admin.partner-hero-sections.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors">
                Create Hero Section
            </a>
            @else
            <a href="{{ route('admin.partner-hero-sections.edit', $heroSection) }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition-colors">
                Edit Hero Section
            </a>
            @endif
        </div>
    </div>
    
    @if(session('success'))
        <div class="m-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="p-6">
        @if($heroSection)
        <div class="bg-gray-50 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Current Hero Section</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                    <p class="text-gray-900">{{ $heroSection->title }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Short Description</label>
                    <p class="text-gray-900">{{ $heroSection->short_description }}</p>
                </div>
                <div class="text-sm text-gray-500">
                    Last updated: {{ $heroSection->updated_at->format('M d, Y \a\t g:i A') }}
                </div>
            </div>
        </div>
        @else
        <div class="text-center py-12">
            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h4a1 1 0 011 1v2m-6 0h8m-8 0a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V6a2 2 0 00-2-2"></path>
            </svg>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No Hero Section Found</h3>
            <p class="text-gray-500 mb-4">Create a hero section for the partner page.</p>
            <a href="{{ route('admin.partner-hero-sections.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors">
                Create Hero Section
            </a>
        </div>
        @endif
    </div>
</div>
@endsection