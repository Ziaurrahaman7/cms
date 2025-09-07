@extends('dashboard')

@section('content')
@if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Add Team Member</h3>
        </div>
        <div class="p-6">
            <form action="{{ route('admin.teams.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror" 
                               id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="position" class="block text-sm font-medium text-gray-700 mb-2">Position *</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('position') border-red-500 @enderror" 
                               id="position" name="position" value="{{ old('position') }}" required>
                        @error('position')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="mt-6">
                    <label for="bio" class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
                    <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('bio') border-red-500 @enderror" 
                              id="bio" name="bio" rows="4">{{ old('bio') }}</textarea>
                    @error('bio')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mt-6">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Profile Image</label>
                    <input type="file" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('image') border-red-500 @enderror" 
                           id="image" name="image" accept="image/*">
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label for="facebook" class="block text-sm font-medium text-gray-700 mb-2">Facebook URL</label>
                        <input type="url" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('facebook') border-red-500 @enderror" 
                               id="facebook" name="facebook" value="{{ old('facebook') }}">
                        @error('facebook')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="twitter" class="block text-sm font-medium text-gray-700 mb-2">Twitter URL</label>
                        <input type="url" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('twitter') border-red-500 @enderror" 
                               id="twitter" name="twitter" value="{{ old('twitter') }}">
                        @error('twitter')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="linkedin" class="block text-sm font-medium text-gray-700 mb-2">LinkedIn URL</label>
                        <input type="url" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('linkedin') border-red-500 @enderror" 
                               id="linkedin" name="linkedin" value="{{ old('linkedin') }}">
                        @error('linkedin')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="instagram" class="block text-sm font-medium text-gray-700 mb-2">Instagram URL</label>
                        <input type="url" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('instagram') border-red-500 @enderror" 
                               id="instagram" name="instagram" value="{{ old('instagram') }}">
                        @error('instagram')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                        <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('sort_order') border-red-500 @enderror" 
                               id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}">
                        @error('sort_order')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="flex items-center mt-8">
                        <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="rounded">
                        <label for="is_active" class="ml-2 text-sm font-medium text-gray-700">Active</label>
                    </div>
                </div>
                
                <div class="flex justify-between mt-8">
                    <a href="{{ route('admin.teams.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition-colors">Cancel</a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition-colors">Add Team Member</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection