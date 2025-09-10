@extends('dashboard')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Add New Service</h1>
                <p class="text-gray-600 mt-1">Create a new service offering</p>
            </div>
            <a href="{{ route('admin.services.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Services
            </a>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6">
            <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <!-- Basic Information -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Service Title *</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Short Description *</label>
                    <textarea id="description" name="description" rows="3" required placeholder="Brief description for service card..."
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content -->
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Detailed Content</label>
                    <textarea id="content" name="content" rows="10" placeholder="Detailed service content with images and videos..."
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('content') }}</textarea>
                    <p class="mt-1 text-sm text-gray-500">You can add images and videos using the rich text editor</p>
                </div>

                <!-- Image Upload -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Service Image</label>
                    <input type="file" id="image" name="image" accept="image/*"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <p class="mt-1 text-sm text-gray-500">Upload an image for your service (optional)</p>
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Icon -->
                <div>
                    <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">Icon Class (Optional)</label>
                    <input type="text" id="icon" name="icon" value="{{ old('icon') }}" placeholder="e.g., fas fa-laptop-code"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <p class="mt-1 text-sm text-gray-500">Font Awesome icon class (used if no image uploaded)</p>
                </div>

                <!-- Sort Order -->
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                    <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- SEO Section -->
                <div class="border-t border-gray-200 pt-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">SEO Settings</h3>
                    <div class="space-y-4">
                        <div>
                            <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                            <input type="text" id="meta_title" name="meta_title" value="{{ old('meta_title') }}" maxlength="60"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <p class="mt-1 text-sm text-gray-500">Recommended: 50-60 characters</p>
                        </div>
                        <div>
                            <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                            <textarea id="meta_description" name="meta_description" rows="3" maxlength="160" placeholder="Brief description for search engines..."
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('meta_description') }}</textarea>
                            <p class="mt-1 text-sm text-gray-500">Recommended: 150-160 characters</p>
                        </div>
                        <div>
                            <label for="meta_keywords" class="block text-sm font-medium text-gray-700 mb-2">Meta Keywords</label>
                            <input type="text" id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords') }}" placeholder="keyword1, keyword2, keyword3"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <p class="mt-1 text-sm text-gray-500">Separate keywords with commas</p>
                        </div>
                    </div>
                </div>

                <!-- Service FAQs -->
                <div class="border-t border-gray-200 pt-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Service FAQs</h3>
                    <div id="faqs-container" class="space-y-4">
                        @if(old('faqs'))
                            @foreach(old('faqs') as $index => $faq)
                                <div class="faq-item bg-gray-50 p-4 rounded-lg">
                                    <div class="flex justify-between items-start mb-3">
                                        <h4 class="font-medium text-gray-900">FAQ {{ $index + 1 }}</h4>
                                        <button type="button" class="text-red-600 hover:text-red-800 remove-faq">Remove</button>
                                    </div>
                                    <div class="space-y-3">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Question</label>
                                            <input type="text" name="faqs[{{ $index }}][question]" value="{{ $faq['question'] ?? '' }}" placeholder="Enter question"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Answer</label>
                                            <textarea name="faqs[{{ $index }}][answer]" rows="3" placeholder="Enter answer"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $faq['answer'] ?? '' }}</textarea>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox" name="faqs[{{ $index }}][is_active]" value="1" {{ ($faq['is_active'] ?? true) ? 'checked' : '' }}
                                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                            <label class="ml-2 text-sm text-gray-900">Active</label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="faq-item bg-gray-50 p-4 rounded-lg">
                                <div class="flex justify-between items-start mb-3">
                                    <h4 class="font-medium text-gray-900">FAQ 1</h4>
                                    <button type="button" class="text-red-600 hover:text-red-800 remove-faq">Remove</button>
                                </div>
                                <div class="space-y-3">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Question</label>
                                        <input type="text" name="faqs[0][question]" placeholder="Enter question"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Answer</label>
                                        <textarea name="faqs[0][answer]" rows="3" placeholder="Enter answer"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="faqs[0][is_active]" value="1" checked
                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                        <label class="ml-2 text-sm text-gray-900">Active</label>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <button type="button" id="add-faq" class="mt-3 inline-flex items-center px-3 py-2 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add FAQ
                    </button>
                </div>

                <!-- Settings -->
                <div class="border-t border-gray-200 pt-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="is_active" name="is_active" {{ old('is_active', true) ? 'checked' : '' }}
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="is_active" class="ml-2 block text-sm text-gray-900">
                            Active Service
                        </label>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end gap-3 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.services.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                        Create Service
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
let faqIndex = {{ old('faqs') ? count(old('faqs')) : 1 }};

document.getElementById('add-faq').addEventListener('click', function() {
    const container = document.getElementById('faqs-container');
    const newFaq = document.createElement('div');
    newFaq.className = 'faq-item bg-gray-50 p-4 rounded-lg';
    newFaq.innerHTML = `
        <div class="flex justify-between items-start mb-3">
            <h4 class="font-medium text-gray-900">FAQ ${faqIndex + 1}</h4>
            <button type="button" class="text-red-600 hover:text-red-800 remove-faq">Remove</button>
        </div>
        <div class="space-y-3">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Question</label>
                <input type="text" name="faqs[${faqIndex}][question]" placeholder="Enter question"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Answer</label>
                <textarea name="faqs[${faqIndex}][answer]" rows="3" placeholder="Enter answer"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>
            <div class="flex items-center">
                <input type="checkbox" name="faqs[${faqIndex}][is_active]" value="1" checked
                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label class="ml-2 text-sm text-gray-900">Active</label>
            </div>
        </div>
    `;
    container.appendChild(newFaq);
    faqIndex++;
});

document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-faq')) {
        const faqItems = document.querySelectorAll('.faq-item');
        if (faqItems.length > 1) {
            e.target.closest('.faq-item').remove();
        }
    }
});
</script>

<!-- CKEditor Rich Text Editor -->
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script>
ClassicEditor
    .create(document.querySelector('#content'), {
        toolbar: {
            items: [
                'heading', '|',
                'bold', 'italic', 'underline', 'strikethrough', '|',
                'fontSize', 'fontColor', 'fontBackgroundColor', '|',
                'alignment', '|',
                'numberedList', 'bulletedList', '|',
                'outdent', 'indent', '|',
                'link', 'insertImage', 'mediaEmbed', 'insertTable', '|',
                'blockQuote', 'codeBlock', '|',
                'undo', 'redo', '|',
                'sourceEditing'
            ]
        },
        language: 'en',
        image: {
            toolbar: [
                'imageTextAlternative',
                'imageStyle:inline',
                'imageStyle:block',
                'imageStyle:side'
            ]
        },
        table: {
            contentToolbar: [
                'tableColumn',
                'tableRow',
                'mergeTableCells'
            ]
        }
    })
    .catch(error => {
        console.error(error);
    });
</script>
@endsection