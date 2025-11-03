@extends('dashboard')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="p-6 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Worldwide Partners</h2>
                <p class="text-gray-600 mt-1">Partners with country information for worldwide display</p>
            </div>
            <a href="{{ route('admin.partners.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition-colors">
                Back to All Partners
            </a>
        </div>
    </div>
    
    <div class="p-6">
        @if($partners->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($partners as $partner)
            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                @if($partner->logo)
                    <div class="flex justify-center mb-3">
                        <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="h-16 w-auto object-contain">
                    </div>
                @endif
                <div class="text-center">
                    <h3 class="font-semibold text-gray-900 mb-1">{{ $partner->name }}</h3>
                    <p class="text-gray-600 text-sm">{{ $partner->country }}</p>
                    <span class="inline-block mt-2 px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">
                        {{ ucwords(str_replace('-', ' ', $partner->type)) }}
                    </span>
                </div>
                <div class="mt-3 text-center">
                    <a href="{{ route('admin.partners.edit', $partner) }}" class="text-blue-600 hover:text-blue-800 text-sm">
                        Edit Partner
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12">
            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No Worldwide Partners Found</h3>
            <p class="text-gray-500 mb-4">Partners need to have country information to appear here.</p>
            <a href="{{ route('admin.partners.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors">
                Add New Partner
            </a>
        </div>
        @endif
    </div>
</div>
@endsection