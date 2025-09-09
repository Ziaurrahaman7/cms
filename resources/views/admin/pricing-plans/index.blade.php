@extends('dashboard')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Pricing Plans</h2>
            <p class="text-gray-600 mt-1">Manage your pricing plans and packages</p>
        </div>
        <a href="{{ route('admin.pricing-plans.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Add New Plan
        </a>
    </div>

    <!-- Filters -->
    <div class="bg-gray-50 rounded-lg p-4 mb-6">
        <form method="GET" class="flex flex-wrap gap-4 items-end">
            <div class="flex-1 min-w-64">
                <label class="block text-sm font-medium text-gray-700 mb-1">Search Plans</label>
                <input type="text" name="search" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Search plans..." value="{{ request('search') }}">
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
            <button type="button" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition-colors hidden" id="bulkDeleteBtn">Delete Selected</button>
        </form>
    </div>

    <!-- Plans Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($plans as $plan)
        <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-shadow {{ $plan->is_popular ? 'ring-2 ring-blue-500' : '' }}">
            <div class="flex items-start justify-between mb-4">
                <input type="checkbox" class="plan-checkbox mt-1" value="{{ $plan->id }}">
                @if($plan->is_popular)
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Popular</span>
                @endif
            </div>
            
            <div class="text-center mb-6">
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $plan->name }}</h3>
                <div class="text-3xl font-bold text-gray-900 mb-1">
                    @if($plan->currency === 'BDT')
                        ৳{{ number_format($plan->price, 0) }}
                    @elseif($plan->currency === 'EUR')
                        €{{ number_format($plan->price, 2) }}
                    @else
                        ${{ number_format($plan->price, 2) }}
                    @endif
                </div>
                <p class="text-gray-600">per {{ $plan->period }}</p>
            </div>
            
            <div class="mb-6">
                <p class="text-sm font-medium text-gray-700 mb-2">Features ({{ count($plan->features) }})</p>
                <ul class="space-y-1">
                    @foreach(array_slice($plan->features, 0, 3) as $feature)
                        <li class="flex items-center text-sm text-gray-600">
                            <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $feature }}
                        </li>
                    @endforeach
                    @if(count($plan->features) > 3)
                        <li class="text-sm text-gray-500">+{{ count($plan->features) - 3 }} more features</li>
                    @endif
                </ul>
            </div>
            
            <div class="flex items-center justify-between mb-4">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $plan->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                    {{ $plan->is_active ? 'Active' : 'Inactive' }}
                </span>
                <span class="text-sm text-gray-500">Order: {{ $plan->sort_order }}</span>
            </div>
            
            <div class="flex gap-2">
                <a href="{{ route('admin.pricing-plans.edit', $plan) }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-3 rounded-lg transition-colors text-sm font-medium">
                    Edit
                </a>
                <form action="{{ route('admin.pricing-plans.destroy', $plan) }}" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-2 px-3 rounded-lg transition-colors text-sm font-medium" onclick="return confirm('Are you sure?')">
                        Delete
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-12">
            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No pricing plans found</h3>
            <p class="text-gray-500 mb-4">Get started by creating your first pricing plan.</p>
            <a href="{{ route('admin.pricing-plans.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add First Plan
            </a>
        </div>
        @endforelse
    </div>
    
    @if($plans->hasPages())
        <div class="mt-6">
            {{ $plans->links() }}
        </div>
    @endif
    </div>
</div>

<script>
document.getElementById('selectAll').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('.plan-checkbox');
    checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    toggleBulkDelete();
});

document.querySelectorAll('.plan-checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', toggleBulkDelete);
});

function toggleBulkDelete() {
    const selected = document.querySelectorAll('.plan-checkbox:checked');
    document.getElementById('bulkDeleteBtn').style.display = selected.length > 0 ? 'block' : 'none';
}

document.getElementById('bulkDeleteBtn').addEventListener('click', function() {
    const selected = Array.from(document.querySelectorAll('.plan-checkbox:checked')).map(cb => cb.value);
    if (selected.length > 0 && confirm('Delete selected plans?')) {
        fetch('{{ route("admin.pricing-plans.bulk-delete") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ids: selected})
        }).then(() => location.reload());
    }
});
</script>
@endsection