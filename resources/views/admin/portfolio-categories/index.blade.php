@extends('dashboard')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Portfolio Categories</h2>
            <p class="text-gray-600 mt-1">Manage portfolio categories and organize your work</p>
        </div>
        <a href="{{ route('admin.portfolio-categories.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Add New Category
        </a>
    </div>

    <!-- Filters -->
    <div class="bg-gray-50 rounded-lg p-4 mb-6">
        <form method="GET" class="flex flex-wrap gap-4 items-end">
            <div class="flex-1 min-w-64">
                <label class="block text-sm font-medium text-gray-700 mb-1">Search Categories</label>
                <input type="text" name="search" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Search categories..." value="{{ request('search') }}">
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

    <!-- Categories Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($categories as $category)
        <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-shadow">
            <div class="flex items-start justify-between mb-4">
                <input type="checkbox" class="category-checkbox mt-1" value="{{ $category->id }}">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $category->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                    {{ $category->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>
            
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $category->name }}</h3>
                <p class="text-sm text-gray-500 mb-2">
                    <span class="font-mono bg-gray-100 px-2 py-1 rounded">{{ $category->slug }}</span>
                </p>
                @if($category->description)
                    <p class="text-sm text-gray-600">{{ Str::limit($category->description, 80) }}</p>
                @endif
            </div>
            
            <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                <span>Sort Order: {{ $category->sort_order }}</span>
                <span>{{ $category->portfolios_count ?? 0 }} Portfolios</span>
            </div>
            
            <div class="flex gap-2">
                <a href="{{ route('admin.portfolio-categories.edit', $category) }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-3 rounded-lg transition-colors text-sm font-medium">
                    Edit
                </a>
                <form action="{{ route('admin.portfolio-categories.destroy', $category) }}" method="POST" class="flex-1">
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
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a1.994 1.994 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
            </svg>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No categories found</h3>
            <p class="text-gray-500 mb-4">Get started by creating your first portfolio category.</p>
            <a href="{{ route('admin.portfolio-categories.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add First Category
            </a>
        </div>
        @endforelse
    </div>
    
    @if($categories->hasPages())
        <div class="mt-6">
            {{ $categories->links() }}
        </div>
    @endif
</div>

<script>
document.getElementById('selectAll').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('.category-checkbox');
    checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    toggleBulkDelete();
});

document.querySelectorAll('.category-checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', toggleBulkDelete);
});

function toggleBulkDelete() {
    const selected = document.querySelectorAll('.category-checkbox:checked');
    document.getElementById('bulkDeleteBtn').style.display = selected.length > 0 ? 'block' : 'none';
}

document.getElementById('bulkDeleteBtn').addEventListener('click', function() {
    const selected = Array.from(document.querySelectorAll('.category-checkbox:checked')).map(cb => cb.value);
    if (selected.length > 0 && confirm('Delete selected categories?')) {
        fetch('{{ route("admin.portfolio-categories.bulk-delete") }}', {
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