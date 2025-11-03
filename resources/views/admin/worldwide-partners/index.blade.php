@extends('dashboard')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="p-6 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Worldwide Partners</h2>
                <p class="text-gray-600 mt-1">Manage worldwide partner listings</p>
            </div>
            <a href="{{ route('admin.worldwide-partners.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors">
                Add New Partner
            </a>
        </div>
    </div>
    
    @if(session('success'))
        <div class="m-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Logo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Country</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($partners as $partner)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($partner->logo)
                            <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="h-10 w-10 object-contain">
                        @else
                            <div class="h-10 w-10 bg-gray-200 rounded flex items-center justify-center">
                                <span class="text-gray-400 text-xs">No Logo</span>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $partner->name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $partner->country }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $partner->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $partner->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('admin.worldwide-partners.edit', $partner) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                        <form action="{{ route('admin.worldwide-partners.destroy', $partner) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                        No worldwide partners found. <a href="{{ route('admin.worldwide-partners.create') }}" class="text-blue-600 hover:text-blue-800">Add the first one</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($partners->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $partners->links() }}
        </div>
    @endif
</div>
@endsection