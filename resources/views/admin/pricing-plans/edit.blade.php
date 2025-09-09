@extends('dashboard')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="mb-1">Edit Pricing Plan</h2>
                <p class="text-muted mb-0">Update pricing plan details</p>
            </div>
            <a href="{{ route('admin.pricing-plans.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-2"></i>Back to Plans
            </a>
        </div>
    </div>
    
    <div class="card-body">
                    <form action="{{ route('admin.pricing-plans.update', $pricingPlan) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Plan Name *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $pricingPlan->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price *</label>
                                    <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $pricingPlan->price) }}" required>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="currency" class="form-label">Currency *</label>
                                    <select class="form-select @error('currency') is-invalid @enderror" id="currency" name="currency" required>
                                        <option value="USD" {{ old('currency', $pricingPlan->currency) === 'USD' ? 'selected' : '' }}>USD ($)</option>
                                        <option value="BDT" {{ old('currency', $pricingPlan->currency) === 'BDT' ? 'selected' : '' }}>BDT (৳)</option>
                                        <option value="EUR" {{ old('currency', $pricingPlan->currency) === 'EUR' ? 'selected' : '' }}>EUR (€)</option>
                                    </select>
                                    @error('currency')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="period" class="form-label">Period *</label>
                                    <select class="form-select @error('period') is-invalid @enderror" id="period" name="period" required>
                                        <option value="month" {{ old('period', $pricingPlan->period) === 'month' ? 'selected' : '' }}>Monthly</option>
                                        <option value="year" {{ old('period', $pricingPlan->period) === 'year' ? 'selected' : '' }}>Yearly</option>
                                        <option value="one-time" {{ old('period', $pricingPlan->period) === 'one-time' ? 'selected' : '' }}>One Time</option>
                                    </select>
                                    @error('period')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sort_order" class="form-label">Sort Order</label>
                                    <input type="number" class="form-control @error('sort_order') is-invalid @enderror" id="sort_order" name="sort_order" value="{{ old('sort_order', $pricingPlan->sort_order) }}" min="0">
                                    @error('sort_order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $pricingPlan->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Features *</label>
                            <div id="features-container">
                                @php
                                    $features = old('features', $pricingPlan->features ?? []);
                                @endphp
                                @foreach($features as $index => $feature)
                                    <div class="input-group mb-2 feature-item">
                                        <input type="text" class="form-control" name="features[]" value="{{ $feature }}" placeholder="Enter feature" required>
                                        <button type="button" class="btn btn-outline-danger remove-feature">Remove</button>
                                    </div>
                                @endforeach
                                @if(empty($features))
                                    <div class="input-group mb-2 feature-item">
                                        <input type="text" class="form-control" name="features[]" placeholder="Enter feature" required>
                                        <button type="button" class="btn btn-outline-danger remove-feature">Remove</button>
                                    </div>
                                @endif
                            </div>
                            <button type="button" class="btn btn-outline-primary btn-sm" id="add-feature">Add Feature</button>
                            @error('features')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="is_popular" name="is_popular" {{ old('is_popular', $pricingPlan->is_popular) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_popular">
                                            Mark as Popular
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{ old('is_active', $pricingPlan->is_active) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            Active
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update Plan</button>
                <a href="{{ route('admin.pricing-plans.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
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