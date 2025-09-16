@extends('dashboard')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Edit Achievement</h1>
                <p class="text-gray-600 mt-1">Update achievement information</p>
            </div>
            <a href="{{ route('admin.achievements.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Achievements
            </a>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6">
            <form action="{{ route('admin.achievements.update', $achievement) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $achievement->title) }}" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                    <select id="category" name="category" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('category') border-red-500 @enderror">
                        <option value="">Select Category</option>
                        <option value="certificate" {{ old('category', $achievement->category) == 'certificate' ? 'selected' : '' }}>Certificate</option>
                        <option value="achievement" {{ old('category', $achievement->category) == 'achievement' ? 'selected' : '' }}>Achievement</option>
                        <option value="award" {{ old('category', $achievement->category) == 'award' ? 'selected' : '' }}>Award</option>
                    </select>
                    @error('category')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                    <textarea id="description" name="description" rows="4" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror">{{ old('description', $achievement->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Image -->
                @if($achievement->image && file_exists(public_path('storage/achievements/' . $achievement->image)))
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
                    <img src="{{ asset('storage/achievements/' . $achievement->image) }}" alt="{{ $achievement->title }}" class="h-20 object-contain border rounded-lg p-2 bg-gray-50">
                </div>
                @endif

                <!-- Image Upload -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                    <input type="file" id="image" name="image" accept="image/*"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <p class="mt-1 text-sm text-gray-500">Upload new image to replace current one (PNG, JPG, SVG recommended)</p>
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Year -->
                <div>
                    <label for="year" class="block text-sm font-medium text-gray-700 mb-2">Year *</label>
                    <input type="text" id="year" name="year" value="{{ old('year', $achievement->year) }}" required maxlength="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('year') border-red-500 @enderror">
                    @error('year')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Sort Order -->
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                    <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $achievement->sort_order) }}" min="0"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Settings -->
                <div>
                    <div class="flex items-center">
                        <input type="checkbox" id="is_active" name="is_active" {{ old('is_active', $achievement->is_active) ? 'checked' : '' }}
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="is_active" class="ml-2 block text-sm text-gray-900">
                            Active Achievement
                        </label>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end gap-3 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.achievements.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                        Update Achievement
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection