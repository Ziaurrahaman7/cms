@extends('dashboard')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Edit Partner</h1>
                <p class="text-gray-600 mt-1">Update partner information</p>
            </div>
            <a href="{{ route('admin.partners.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Partners
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6">
            <form action="{{ route('admin.partners.update', $partner) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!-- Tab Navigation -->
                <div class="border-b border-gray-200 mb-6">
                    <nav class="-mb-px flex space-x-8">
                        <button type="button" class="tab-btn active py-2 px-1 border-b-2 border-blue-500 font-medium text-sm text-blue-600" data-tab="basic-info">
                            Basic Info
                        </button>
                        <button type="button" class="tab-btn py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="seo">
                            SEO
                        </button>
                        <button type="button" class="tab-btn py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="sections">
                            Sections
                        </button>
                    </nav>
                </div>
                
                <!-- Basic Info Tab -->
                <div id="basic-info" class="tab-content">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Partner Name *</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $partner->name) }}" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Slug *</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug', $partner->slug) }}" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('slug')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Partner Type *</label>
                            <select name="type" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Select Type</option>
                                @foreach(\App\Models\PartnerType::active()->ordered()->get() as $partnerType)
                                    <option value="{{ $partnerType->slug }}" {{ old('type', $partner->type) === $partnerType->slug ? 'selected' : '' }}>{{ $partnerType->name }}</option>
                                @endforeach
                            </select>
                            @error('type')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Website URL</label>
                            <input type="url" name="website" value="{{ old('website', $partner->website) }}" placeholder="https://example.com" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('website')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                            <textarea name="description" rows="3" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $partner->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                            @if($partner->logo)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $partner->logo) }}" alt="Current image" class="h-16 w-16 object-cover rounded">
                                </div>
                            @endif
                            <input type="file" name="logo" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                            @error('logo')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                            <input type="number" name="sort_order" value="{{ old('sort_order', $partner->sort_order) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                            @error('sort_order')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="flex items-center">
                                <input type="checkbox" name="active" {{ old('active', $partner->is_active) ? 'checked' : '' }} class="h-4 w-4 text-blue-600 rounded">
                                <span class="ml-2 text-sm text-gray-900">Active Partner</span>
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- SEO Tab -->
                <div id="seo" class="tab-content hidden">
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                            <input type="text" name="meta_title" value="{{ old('meta_title', $partner->meta_title) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('meta_title')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                            <textarea name="meta_description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('meta_description', $partner->meta_description) }}</textarea>
                            @error('meta_description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Meta Keywords</label>
                            <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $partner->meta_keywords) }}" placeholder="keyword1, keyword2, keyword3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('meta_keywords')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <!-- Sections Tab -->
                <div id="sections" class="tab-content hidden">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Partner Sections</h3>
                        <button type="button" id="add-section" class="px-4 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
                            + Add Section
                        </button>
                    </div>
                    <div id="sections-container">
                        @if($partner->sections && count($partner->sections) > 0)
                            @foreach($partner->sections as $index => $section)
                            <div class="section-item border border-gray-200 rounded-lg p-4 mb-4">
                                <div class="flex justify-between items-center mb-3">
                                    <h4 class="text-sm font-medium text-gray-700">Section {{ $index + 1 }}</h4>
                                    <button type="button" class="remove-section text-red-600 hover:text-red-800">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                                        <input type="text" name="sections[{{ $index }}][title]" value="{{ $section['title'] ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                                        @if(isset($section['image']) && $section['image'])
                                            <div class="mb-2">
                                                <img src="{{ asset('storage/' . $section['image']) }}" alt="Section image" class="h-12 w-12 object-cover rounded">
                                            </div>
                                        @endif
                                        <input type="file" name="sections[{{ $index }}][image]" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                        <textarea name="sections[{{ $index }}][description]" rows="3" class="summernote w-full px-3 py-2 border border-gray-300 rounded-md text-sm">{{ $section['description'] ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                
                <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.partners.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200">Cancel</a>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Update Partner</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tab functionality
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const targetTab = this.dataset.tab;
            
            // Remove active class from all tabs
            document.querySelectorAll('.tab-btn').forEach(b => {
                b.classList.remove('active', 'border-blue-500', 'text-blue-600');
                b.classList.add('border-transparent', 'text-gray-500');
            });
            
            // Add active class to clicked tab
            this.classList.add('active', 'border-blue-500', 'text-blue-600');
            this.classList.remove('border-transparent', 'text-gray-500');
            
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            
            // Show target tab content
            document.getElementById(targetTab).classList.remove('hidden');
        });
    });

    // General sections functionality
    let sectionIndex = {{ $partner->sections ? count($partner->sections) : 0 }};

    document.getElementById('add-section').addEventListener('click', function() {
        const container = document.getElementById('sections-container');
        const sectionHtml = `
            <div class="section-item border border-gray-200 rounded-lg p-4 mb-4">
                <div class="flex justify-between items-center mb-3">
                    <h4 class="text-sm font-medium text-gray-700">Section ${sectionIndex + 1}</h4>
                    <button type="button" class="remove-section text-red-600 hover:text-red-800">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                        <input type="text" name="sections[${sectionIndex}][title]" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                        <input type="file" name="sections[${sectionIndex}][image]" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="sections[${sectionIndex}][description]" rows="3" class="summernote w-full px-3 py-2 border border-gray-300 rounded-md text-sm"></textarea>
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', sectionHtml);
        // Initialize Summernote for the new textarea
        $(container).find('.section-item:last .summernote').summernote({
            height: 150,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        sectionIndex++;
    });

    // Remove section functionality
    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-section')) {
            e.preventDefault();
            e.target.closest('.section-item').remove();
        }
    });

    // Auto generate slug from name
    document.getElementById('name').addEventListener('input', function() {
        let name = this.value;
        let slug = name.toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim('-');
        document.getElementById('slug').value = slug;
    });
});
</script>
@endsection