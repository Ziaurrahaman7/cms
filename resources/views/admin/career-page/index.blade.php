@extends('dashboard')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Career Page Settings</h1>
        <p class="text-gray-600">Manage hero section and benefits section content</p>
    </div>

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-blue-500 to-purple-600 px-6 py-4">
            <h3 class="text-white font-semibold text-lg">Career Page Content</h3>
        </div>

        <!-- Tab Navigation -->
        <div class="border-b border-gray-200">
            <nav class="-mb-px flex space-x-8 px-6">
                <button type="button" class="tab-button active py-4 px-1 border-b-2 border-blue-500 font-medium text-sm text-blue-600" data-tab="hero">
                    Hero Section
                </button>
                <button type="button" class="tab-button py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="benefits">
                    Why Join Us
                </button>
            </nav>
        </div>

        <div class="p-6">
            @if($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                    <ul class="list-disc list-inside text-red-700 text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.career-page.update') }}" method="POST" id="career-form">
                @csrf
                @method('PUT')
                
                <!-- Hero Section Tab -->
                <div id="hero-tab" class="tab-content">
                    <h4 class="text-lg font-semibold text-gray-800 mb-4">Hero Section</h4>
                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Hero Title</label>
                            <input type="text" name="hero_title" value="{{ old('hero_title', $settings->hero_title) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Hero Description</label>
                            <textarea name="hero_description" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ old('hero_description', $settings->hero_description) }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Button Text</label>
                            <input type="text" name="hero_button_text" value="{{ old('hero_button_text', $settings->hero_button_text) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    </div>
                </div>

                <!-- Benefits Section Tab -->
                <div id="benefits-tab" class="tab-content hidden p-4">
                    <div class="mb-8">
                        <h4 class="text-lg font-semibold text-gray-800 mb-6">Why Join Us Section</h4>
                    
                    <div class="grid grid-cols-1 gap-6 mb-8">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Section Title</label>
                            <input type="text" name="why_join_title" value="{{ old('why_join_title', $settings->why_join_title) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Section Description</label>
                            <textarea name="why_join_description" rows="2" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ old('why_join_description', $settings->why_join_description) }}</textarea>
                        </div>
                    </div>

                    </div>
                    
                    <div class="mb-8">
                        <h5 class="text-md font-semibold text-gray-800 mb-4">Benefits</h5>
                        <div id="benefits-container">
                        @if($settings->benefits)
                            @foreach($settings->benefits as $index => $benefit)
                                <div class="benefit-item border border-gray-200 rounded-lg p-4 mb-4">
                                    <div class="flex justify-between items-center mb-4">
                                        <h5 class="font-medium text-gray-800">Benefit {{ $index + 1 }}</h5>
                                        <button type="button" class="remove-benefit text-red-600 hover:text-red-800" style="font-size: 1.2rem; line-height: 1;">
                                            ✕
                                        </button>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                                            <input type="text" name="benefits[{{ $index }}][title]" value="{{ old('benefits.'.$index.'.title', $benefit['title'] ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Icon Class</label>
                                            <input type="text" name="benefits[{{ $index }}][icon]" value="{{ old('benefits.'.$index.'.icon', $benefit['icon'] ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md" placeholder="bi bi-people" required>
                                        </div>
                                        <div class="md:col-span-1">
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                            <textarea name="benefits[{{ $index }}][description]" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>{{ old('benefits.'.$index.'.description', $benefit['description'] ?? '') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                        <button type="button" id="add-benefit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                            Add Benefit
                        </button>
                        </div>
                    </div>
                </div>

            </form>
            
            <div class="flex justify-end mt-8 pt-6 border-t border-gray-200">
                <button type="submit" form="career-form" class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white px-8 py-3 rounded-lg">
                    Update Settings
                </button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tab functionality
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const tabName = this.getAttribute('data-tab');
            
            // Remove active class from all buttons
            tabButtons.forEach(btn => {
                btn.classList.remove('active', 'border-blue-500', 'text-blue-600');
                btn.classList.add('border-transparent', 'text-gray-500');
            });
            
            // Hide all tab contents
            tabContents.forEach(content => {
                content.classList.add('hidden');
            });
            
            // Add active class to clicked button
            this.classList.add('active', 'border-blue-500', 'text-blue-600');
            this.classList.remove('border-transparent', 'text-gray-500');
            
            // Show selected tab content
            document.getElementById(tabName + '-tab').classList.remove('hidden');
        });
    });
    
    // Remove this line as we'll use dynamic counting
    
    document.getElementById('add-benefit').addEventListener('click', function() {
        const container = document.getElementById('benefits-container');
        const currentCount = container.querySelectorAll('.benefit-item').length;
        
        const newBenefit = document.createElement('div');
        newBenefit.className = 'benefit-item border border-gray-200 rounded-lg p-4 mb-4';
        newBenefit.innerHTML = `
            <div class="flex justify-between items-center mb-4">
                <h5 class="font-medium text-gray-800">Benefit ${currentCount + 1}</h5>
                <button type="button" class="remove-benefit text-red-600 hover:text-red-800" style="font-size: 1.2rem; line-height: 1;">
                    ✕
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input type="text" name="benefits[${currentCount}][title]" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Icon Class</label>
                    <input type="text" name="benefits[${currentCount}][icon]" class="w-full px-3 py-2 border border-gray-300 rounded-md" placeholder="bi bi-people" required>
                </div>
                <div class="md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="benefits[${currentCount}][description]" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md" required></textarea>
                </div>
            </div>
        `;
        
        container.appendChild(newBenefit);
        
        // Re-index all benefits after adding
        reindexBenefits();
    });
    
    function reindexBenefits() {
        const container = document.getElementById('benefits-container');
        const benefitItems = container.querySelectorAll('.benefit-item');
        
        benefitItems.forEach((item, index) => {
            // Update title
            const title = item.querySelector('h5');
            if (title) {
                title.textContent = `Benefit ${index + 1}`;
            }
            
            // Update input names
            const inputs = item.querySelectorAll('input, textarea');
            inputs.forEach(input => {
                const name = input.getAttribute('name');
                if (name && name.includes('benefits[')) {
                    const newName = name.replace(/benefits\[\d+\]/, `benefits[${index}]`);
                    input.setAttribute('name', newName);
                }
            });
        });
    }
    
    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-benefit')) {
            e.target.closest('.benefit-item').remove();
            reindexBenefits();
        }
    });
});
</script>
@endsection