@extends('dashboard')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Clients</h2>
            <p class="text-gray-600 mt-1">Manage your client logos and websites</p>
        </div>
        <a href="{{ route('admin.clients.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Add New Client
        </a>
    </div>

    <!-- Filters -->
    <div class="bg-gray-50 rounded-lg p-4 mb-6">
        <form method="GET" class="flex flex-wrap gap-4 items-end">
            <div class="flex-1 min-w-64">
                <label class="block text-sm font-medium text-gray-700 mb-1">Search Clients</label>
                <input type="text" name="search" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Search clients..." value="{{ request('search') }}">
            </div>
            <div class="min-w-48">
                <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select name="category" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Categories</option>
                    <option value="private" {{ request('category') === 'private' ? 'selected' : '' }}>Private Companies</option>
                    <option value="government" {{ request('category') === 'government' ? 'selected' : '' }}>Government</option>
                    <option value="global" {{ request('category') === 'global' ? 'selected' : '' }}>Global Clients</option>
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

    <!-- Clients Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($clients as $client)
        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition-shadow">
            <div class="h-32 bg-gray-50 flex items-center justify-center p-4">
                @if($client->logo && file_exists(public_path('storage/clients/' . $client->logo)))
                    <img src="{{ asset('storage/clients/' . $client->logo) }}" alt="{{ $client->name }}" class="max-h-full max-w-full object-contain">
                @else
                    <div class="text-center">
                        <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <span class="text-sm text-gray-500">No Logo</span>
                    </div>
                @endif
            </div>
            
            <div class="p-4">
                <div class="flex items-start justify-between mb-3">
                    <input type="checkbox" class="client-checkbox mt-1" value="{{ $client->id }}">
                    <div class="flex gap-2">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                            @if($client->category === 'private') bg-blue-100 text-blue-800
                            @elseif($client->category === 'government') bg-purple-100 text-purple-800
                            @else bg-orange-100 text-orange-800 @endif">
                            {{ ucfirst($client->category) }}
                        </span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $client->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $client->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>
                
                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $client->name }}</h3>
                
                @if($client->website_url)
                    <p class="text-sm text-blue-600 mb-2">
                        <a href="{{ $client->website_url }}" target="_blank" class="hover:underline flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                            {{ parse_url($client->website_url, PHP_URL_HOST) }}
                        </a>
                    </p>
                @endif
                
                @if($client->description)
                    <p class="text-sm text-gray-600 mb-4">{{ Str::limit($client->description, 80) }}</p>
                @endif
                
                <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                    <span>Order: {{ $client->sort_order }}</span>
                </div>
                
                <div class="flex gap-2">
                    <a href="{{ route('admin.clients.edit', $client) }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-3 rounded-lg transition-colors text-sm font-medium">
                        Edit
                    </a>
                    <form action="{{ route('admin.clients.destroy', $client) }}" method="POST" class="flex-1">
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
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
            </svg>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No clients found</h3>
            <p class="text-gray-500 mb-4">Get started by adding your first client.</p>
            <a href="{{ route('admin.clients.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add First Client
            </a>
        </div>
        @endforelse
    </div>
    
    @if($clients->hasPages())
        <div class="mt-6">
            {{ $clients->links() }}
        </div>
    @endif
</div>
@endsection