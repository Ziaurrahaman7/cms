@extends('dashboard')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="mb-6">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 mb-2">Partner Types</h1>
                <p class="text-gray-600">Manage partner type categories</p>
            </div>
            <a href="{{ route('admin.partner-types.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">
                <i class="bi bi-plus me-2"></i>Add Partner Type
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-4 alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    
    @if(session('error'))
        <div class="mb-4 alert alert-danger alert-dismissible fade show" role="alert" style="background-color: #f8d7da; border-color: #f5c6cb; color: #721c24; font-weight: 500;">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-blue-500 to-purple-600 px-6 py-4">
            <h3 class="text-white font-semibold text-lg">Partner Types List</h3>
        </div>

        <div class="p-6">
            @if($partnerTypes->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>

                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sort Order</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($partnerTypes as $partnerType)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <div class="font-medium text-gray-900">{{ $partnerType->name }}</div>
                                    </td>

                                    <td class="px-4 py-4">
                                        <div class="text-sm text-gray-600">{{ Str::limit($partnerType->description, 50) }}</div>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <span class="text-sm text-gray-900">{{ $partnerType->sort_order }}</span>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        @if($partnerType->is_active)
                                            <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">Active</span>
                                        @else
                                            <span class="px-2 py-1 text-xs bg-red-100 text-red-800 rounded-full">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('admin.partner-types.edit', $partnerType) }}" class="inline-flex items-center px-3 py-1 bg-blue-100 hover:bg-blue-200 text-blue-700 rounded-md transition-colors">
                                                <i class="bi bi-pencil me-1"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.partner-types.destroy', $partnerType) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this partner type?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-100 hover:bg-red-200 text-red-700 rounded-md transition-colors">
                                                    <i class="bi bi-trash me-1"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-12">
                    <i class="bi bi-folder text-gray-400 text-5xl mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No Partner Types</h3>
                    <p class="text-gray-500 mb-4">Get started by creating your first partner type.</p>
                    <a href="{{ route('admin.partner-types.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                        <i class="bi bi-plus me-2"></i>Add Partner Type
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection