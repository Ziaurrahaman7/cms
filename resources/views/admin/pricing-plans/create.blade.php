@extends('dashboard')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Add New Pricing Plan</h1>
                <p class="text-gray-600 mt-1">Create a new pricing plan for your services</p>
            </div>
            <a href="{{ route('admin.pricing-plans.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Plans
            </a>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6">
            <form action="{{ route('admin.pricing-plans.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Basic Information -->
                <div class="border-b border-gray-200 pb-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Basic Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="md:col-span-2">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Plan Name *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                            <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                </div>

                <!-- Pricing -->
                <div class="border-b border-gray-200 pb-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Pricing Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price *</label>
                            <input type="number" step="0.01" id="price" name="price" value="{{ old('price') }}" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('price') border-red-500 @enderror">
                            @error('price')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="currency" class="block text-sm font-medium text-gray-700 mb-2">Currency *</label>
                            <select id="currency" name="currency" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="USD" {{ old('currency') === 'USD' ? 'selected' : '' }}>USD ($)</option>
                                <option value="BDT" {{ old('currency') === 'BDT' ? 'selected' : '' }}>BDT (৳)</option>
                                <option value="EUR" {{ old('currency') === 'EUR' ? 'selected' : '' }}>EUR (€)</option>
                            </select>
                        </div>
                        <div>
                            <label for="period" class="block text-sm font-medium text-gray-700 mb-2">Period *</label>
                            <select id="period" name="period" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="month" {{ old('period') === 'month' ? 'selected' : '' }}>Monthly</option>
                                <option value="year" {{ old('period') === 'year' ? 'selected' : '' }}>Yearly</option>
                                <option value="one-time" {{ old('period') === 'one-time' ? 'selected' : '' }}>One Time</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="border-b border-gray-200 pb-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Description</h3>
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Plan Description</label>
                        <textarea id="description" name="description" rows="3" placeholder="Brief description of this plan..."
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('description') }}</textarea>
                    </div>
                </div>

                <!-- Features -->
                <div class="border-b border-gray-200 pb-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Plan Features *</h3>
                    <div id="features-container" class="space-y-2">
                        @if(old('features'))
                            @foreach(old('features') as $index => $feature)
                                <div class="flex gap-2 feature-item">
                                    <input type="text" name="features[]" value="{{ $feature }}" placeholder="Enter feature" required
                                        class="flex-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <button type="button" class="px-3 py-2 bg-red-100 text-red-700 rounded-md hover:bg-red-200 transition-colors remove-feature">
                                        Remove
                                    </button>
                                </div>
                            @endforeach
                        @else
                            <div class="flex gap-2 feature-item">
                                <input type="text" name="features[]" placeholder="Enter feature" required
                                    class="flex-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <button type="button" class="px-3 py-2 bg-red-100 text-red-700 rounded-md hover:bg-red-200 transition-colors remove-feature">
                                    Remove
                                </button>
                            </div>
                        @endif
                    </div>
                    <button type="button" id="add-feature" class="mt-3 inline-flex items-center px-3 py-2 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add Feature
                    </button>
                    @error('features')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Settings -->
                <div>
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Plan Settings</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex items-center">
                            <input type="checkbox" id="is_popular" name="is_popular" {{ old('is_popular') ? 'checked' : '' }}
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="is_popular" class="ml-2 block text-sm text-gray-900">
                                Mark as Popular Plan
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="is_active" name="is_active" {{ old('is_active', true) ? 'checked' : '' }}
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="is_active" class="ml-2 block text-sm text-gray-900">
                                Active Plan
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end gap-3 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.pricing-plans.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                        Create Plan
                    </button>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('add-feature').addEventListener('click', function() {
    const container = document.getElementById('features-container');
    const newFeature = document.createElement('div');
    newFeature.className = 'flex gap-2 feature-item';
    newFeature.innerHTML = `
        <input type="text" name="features[]" placeholder="Enter feature" required
            class="flex-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        <button type="button" class="px-3 py-2 bg-red-100 text-red-700 rounded-md hover:bg-red-200 transition-colors remove-feature">
            Remove
        </button>
    `;
    container.appendChild(newFeature);
});

document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-feature')) {
        const featureItems = document.querySelectorAll('.feature-item');
        if (featureItems.length > 1) {
            e.target.closest('.feature-item').remove();
        }
    }
});
</script>
@endsection