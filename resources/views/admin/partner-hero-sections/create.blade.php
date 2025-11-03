@extends('dashboard')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="p-6 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Create Partner Hero Section</h2>
                <p class="text-gray-600 mt-1">Add hero section content for partner page</p>
            </div>
            <a href="{{ route('admin.partner-hero-sections.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition-colors">
                Back to List
            </a>
        </div>
    </div>
    
    <div class="p-6">
        <form action="{{ route('admin.partner-hero-sections.store') }}" method="POST">
            @csrf
            
            <div class="space-y-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="short_description" class="block text-sm font-medium text-gray-700 mb-2">Short Description</label>
                    <textarea name="short_description" id="short_description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('short_description') }}</textarea>
                    @error('short_description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="our_partners_title" class="block text-sm font-medium text-gray-700 mb-2">Our Partners Section Title</label>
                    <input type="text" name="our_partners_title" id="our_partners_title" value="{{ old('our_partners_title', 'Our Partners') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @error('our_partners_title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="our_partners_description" class="block text-sm font-medium text-gray-700 mb-2">Our Partners Section Description</label>
                    <textarea name="our_partners_description" id="our_partners_description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('our_partners_description', 'Detailed information about our business partners') }}</textarea>
                    @error('our_partners_description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="worldwide_partners_title" class="block text-sm font-medium text-gray-700 mb-2">Worldwide Partners Section Title</label>
                    <input type="text" name="worldwide_partners_title" id="worldwide_partners_title" value="{{ old('worldwide_partners_title', 'Partners Worldwide') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @error('worldwide_partners_title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="worldwide_partners_description" class="block text-sm font-medium text-gray-700 mb-2">Worldwide Partners Section Description</label>
                    <textarea name="worldwide_partners_description" id="worldwide_partners_description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('worldwide_partners_description', 'Our global network of trusted partners') }}</textarea>
                    @error('worldwide_partners_description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="flex justify-end pt-6 border-t border-gray-200 mt-6">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition-colors">
                    Create Hero Section
                </button>
            </div>
        </form>
    </div>
</div>
@endsection