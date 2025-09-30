@extends('dashboard')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header Section -->
    <div class="mb-6">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 mb-2">Edit Portfolio Category</h1>
                <p class="text-gray-600">Update category information and settings</p>
            </div>
            <a href="{{ route('admin.portfolio-categories.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors duration-200">
                <i class="bi bi-arrow-left me-2"></i>Back to Categories
            </a>
        </div>
    </div>

    <!-- Main Form Card -->
    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <!-- Card Header -->
        <div class="bg-gradient-to-r from-blue-500 to-purple-600 px-6 py-4">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-white bg-opacity-20 rounded-lg flex items-center justify-center mr-3">
                    <i class="bi bi-folder text-white text-lg"></i>
                </div>
                <div>
                    <h3 class="text-white font-semibold text-lg">Category Information</h3>
                    <p class="text-blue-100 text-sm">Manage portfolio category details</p>
                </div>
            </div>
        </div>

        <!-- Form Content -->
        <div class="p-6">
            @if($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                    <div class="flex items-center mb-2">
                        <i class="bi bi-exclamation-triangle text-red-500 mr-2"></i>
                        <h4 class="text-red-800 font-medium">Please fix the following errors:</h4>
                    </div>
                    <ul class="list-disc list-inside text-red-700 text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.portfolio-categories.update', $portfolioCategory) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <!-- Basic Information Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            <i class="bi bi-tag mr-1 text-blue-500"></i>Category Name *
                        </label>
                        <input type="text" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('name') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
                               id="name" 
                               name="name" 
                               value="{{ old('name', $portfolioCategory->name) }}" 
                               placeholder="Enter category name"
                               required>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="space-y-2">
                        <label for="sort_order" class="block text-sm font-medium text-gray-700">
                            <i class="bi bi-sort-numeric-up mr-1 text-green-500"></i>Sort Order
                        </label>
                        <input type="number" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('sort_order') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
                               id="sort_order" 
                               name="sort_order" 
                               value="{{ old('sort_order', $portfolioCategory->sort_order) }}" 
                               placeholder="0"
                               min="0">
                        @error('sort_order')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-gray-500 text-xs">Lower numbers appear first</p>
                    </div>
                </div>

                <!-- Description Section -->
                <div class="space-y-2">
                    <label for="description" class="block text-sm font-medium text-gray-700">
                        <i class="bi bi-text-paragraph mr-1 text-purple-500"></i>Description
                    </label>
                    <textarea class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('description') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
                              id="description" 
                              name="description" 
                              rows="4"
                              placeholder="Enter category description (optional)">{{ old('description', $portfolioCategory->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status Section -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex items-center space-x-3">
                        <div class="flex items-center">
                            <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" 
                                   type="checkbox" 
                                   id="is_active" 
                                   name="is_active" 
                                   {{ old('is_active', $portfolioCategory->is_active) ? 'checked' : '' }}>
                            <label class="ml-2 text-sm font-medium text-gray-700" for="is_active">
                                <i class="bi bi-check-circle mr-1 text-green-500"></i>Active Status
                            </label>
                        </div>
                        <div class="text-xs text-gray-500">
                            Enable this category to be visible on the website
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.portfolio-categories.index') }}" 
                       class="inline-flex items-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors duration-200">
                        <i class="bi bi-x-circle mr-2"></i>Cancel
                    </a>
                    <button type="submit" 
                            class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white rounded-lg transition-all duration-200 transform hover:scale-105 shadow-lg">
                        <i class="bi bi-check-circle mr-2"></i>Update Category
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Additional Info Card -->
    <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
        <div class="flex items-start">
            <i class="bi bi-info-circle text-blue-500 mt-0.5 mr-3"></i>
            <div>
                <h4 class="text-blue-800 font-medium mb-1">Category Information</h4>
                <p class="text-blue-700 text-sm">Categories help organize your portfolio projects. Make sure to use descriptive names that clearly represent the type of work.</p>
            </div>
        </div>
    </div>
</div>
@endsection