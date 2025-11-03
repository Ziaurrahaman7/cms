@extends('dashboard')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="p-6 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Create Worldwide Partner</h2>
                <p class="text-gray-600 mt-1">Add a new worldwide partner</p>
            </div>
            <a href="{{ route('admin.worldwide-partners.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition-colors">
                Back to List
            </a>
        </div>
    </div>
    
    <div class="p-6">
        <form action="{{ route('admin.worldwide-partners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Partner Name *</label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Country *</label>
                    <input type="text" name="country" value="{{ old('country') }}" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('country')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Logo</label>
                    <input type="file" name="logo" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    @error('logo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    @error('sort_order')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="md:col-span-2">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="h-4 w-4 text-blue-600 rounded">
                        <span class="ml-2 text-sm text-gray-900">Active</span>
                    </label>
                </div>
            </div>
            
            <div class="flex justify-end pt-6 border-t border-gray-200 mt-6">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition-colors">
                    Create Partner
                </button>
            </div>
        </form>
    </div>
</div>
@endsection