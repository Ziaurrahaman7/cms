@extends('dashboard')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Achievements</h2>
            <p class="text-gray-600 mt-1">Manage certificates, awards, and achievements</p>
        </div>
        <a href="{{ route('admin.achievements.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Add Achievement
        </a>
    </div>

    <!-- Filters -->
    <div class="bg-gray-50 rounded-lg p-4 mb-6">
        <form method="GET" class="flex flex-wrap gap-4 items-end">
            <div class="flex-1 min-w-64">
                <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <input type="text" name="search" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Search achievements..." value="{{ request('search') }}">
            </div>
            <div class="min-w-48">
                <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select name="category" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Categories</option>
                    <option value="certificate" {{ request('category') === 'certificate' ? 'selected' : '' }}>Certificate</option>
                    <option value="achievement" {{ request('category') === 'achievement' ? 'selected' : '' }}>Achievement</option>
                    <option value="award" {{ request('category') === 'award' ? 'selected' : '' }}>Award</option>
                </select>
            </div>
            <div class="min-w-48">
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Status</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors">Filter</button>
        </form>
    </div>

    <!-- Achievements Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($achievements as $achievement)
        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition-shadow">
            <div class="h-32 bg-gray-50 flex items-center justify-center p-4">
                @if($achievement->image && file_exists(public_path('storage/achievements/' . $achievement->image)))
                    <img src="{{ asset('storage/achievements/' . $achievement->image) }}" alt="{{ $achievement->title }}" class="max-h-full max-w-full object-contain">
                @else
                    <div class="text-center">
                        <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                        <span class="text-sm text-gray-500">No Image</span>
                    </div>
                @endif
            </div>
            
            <div class="p-4">
                <div class="flex items-start justify-between mb-3">
                    <div class="flex gap-2">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                            @if($achievement->category === 'certificate') bg-blue-100 text-blue-800
                            @elseif($achievement->category === 'achievement') bg-green-100 text-green-800
                            @else bg-yellow-100 text-yellow-800 @endif">
                            {{ ucfirst($achievement->category) }}
                        </span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $achievement->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $achievement->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>
                
                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $achievement->title }}</h3>
                <p class="text-sm text-gray-600 mb-3">{{ Str::limit($achievement->description, 80) }}</p>
                
                <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                    <span>Year: {{ $achievement->year }}</span>
                    <span>Order: {{ $achievement->sort_order }}</span>
                </div>
                
                <div class="flex gap-2">
                    <a href="{{ route('admin.achievements.edit', $achievement) }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-3 rounded-lg transition-colors text-sm font-medium">
                        Edit
                    </a>
                    <form action="{{ route('admin.achievements.destroy', $achievement) }}" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-2 px-3 rounded-lg transition-colors text-sm font-medium" onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-12">
            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
            </svg>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No achievements found</h3>
            <p class="text-gray-500 mb-4">Get started by adding your first achievement.</p>
            <a href="{{ route('admin.achievements.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add First Achievement
            </a>
        </div>
        @endforelse
    </div>
    
    @if($achievements->hasPages())
        <div class="mt-6">
            {{ $achievements->links() }}
        </div>
    @endif
</div>
@endsection