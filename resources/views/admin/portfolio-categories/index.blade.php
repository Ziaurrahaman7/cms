@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            @include('partials.sidebar')
        </div>
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Portfolio Categories</h2>
                <a href="{{ route('admin.portfolio-categories.create') }}" class="btn btn-primary">Add New Category</a>
            </div>

            <!-- Filters -->
            <div class="card mb-4">
                <div class="card-body">
                    <form method="GET" class="row g-3">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control" placeholder="Search categories..." value="{{ request('search') }}">
                        </div>
                        <div class="col-md-3">
                            <select name="status" class="form-select">
                                <option value="">All Status</option>
                                <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-outline-primary">Filter</button>
                        </div>
                        <div class="col-md-3 text-end">
                            <button type="button" class="btn btn-danger" id="bulkDeleteBtn" style="display: none;">Delete Selected</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Categories Table -->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="selectAll"></th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Sort Order</th>
                                    <th>Portfolios Count</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $category)
                                <tr>
                                    <td><input type="checkbox" class="category-checkbox" value="{{ $category->id }}"></td>
                                    <td>{{ $category->name }}</td>
                                    <td><code>{{ $category->slug }}</code></td>
                                    <td>
                                        <span class="badge bg-{{ $category->is_active ? 'success' : 'secondary' }}">
                                            {{ $category->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>{{ $category->sort_order }}</td>
                                    <td>{{ $category->portfolios_count ?? 0 }}</td>
                                    <td>
                                        <a href="{{ route('admin.portfolio-categories.edit', $category) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                        <form action="{{ route('admin.portfolio-categories.destroy', $category) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No categories found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
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