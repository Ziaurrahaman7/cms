@extends('dashboard')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Features</h2>
            <p class="text-gray-600 mt-1">Manage Why Choose Us features</p>
        </div>
        <a href="{{ route('admin.features.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Add New Feature
        </a>
    </div>

    <!-- Features by Position -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Left Features -->
        <div>
            <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-200">Left Column Features</h3>
            <div class="space-y-4">
                @forelse($features->where('position', 'left') as $feature)
                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex items-center">
                            @if($feature->icon)
                                <i class="{{ $feature->icon }} text-blue-600 text-xl mr-3"></i>
                            @else
                                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                    </svg>
                                </div>
                            @endif
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $feature->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $feature->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                        <span class="text-sm text-gray-500">Order: {{ $feature->sort_order }}</span>
                    </div>
                    
                    <h4 class="font-semibold text-gray-900 mb-2">{{ $feature->title }}</h4>
                    <p class="text-sm text-gray-600 mb-3">{{ Str::limit($feature->description, 100) }}</p>
                    
                    <div class="flex gap-2">
                        <a href="{{ route('admin.features.edit', $feature) }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-3 rounded-lg transition-colors text-sm font-medium">
                            Edit
                        </a>
                        <form action="{{ route('admin.features.destroy', $feature) }}" method="POST" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-2 px-3 rounded-lg transition-colors text-sm font-medium" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="text-center py-8 text-gray-500">
                    <p>No left features found</p>
                    <a href="{{ route('admin.features.create') }}" class="text-blue-600 hover:text-blue-800 text-sm">Add first left feature</a>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Right Features -->
        <div>
            <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-200">Right Column Features</h3>
            <div class="space-y-4">
                @forelse($features->where('position', 'right') as $feature)
                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex items-center">
                            @if($feature->icon)
                                <i class="{{ $feature->icon }} text-blue-600 text-xl mr-3"></i>
                            @else
                                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                    </svg>
                                </div>
                            @endif
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $feature->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $feature->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                        <span class="text-sm text-gray-500">Order: {{ $feature->sort_order }}</span>
                    </div>
                    
                    <h4 class="font-semibold text-gray-900 mb-2">{{ $feature->title }}</h4>
                    <p class="text-sm text-gray-600 mb-3">{{ Str::limit($feature->description, 100) }}</p>
                    
                    <div class="flex gap-2">
                        <a href="{{ route('admin.features.edit', $feature) }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-3 rounded-lg transition-colors text-sm font-medium">
                            Edit
                        </a>
                        <form action="{{ route('admin.features.destroy', $feature) }}" method="POST" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-2 px-3 rounded-lg transition-colors text-sm font-medium" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="text-center py-8 text-gray-500">
                    <p>No right features found</p>
                    <a href="{{ route('admin.features.create') }}" class="text-blue-600 hover:text-blue-800 text-sm">Add first right feature</a>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection