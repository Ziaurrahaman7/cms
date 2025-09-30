@extends('dashboard')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Add Portfolio</h1>
                <p class="text-gray-600 mt-1">Create a comprehensive portfolio with all sections</p>
            </div>
            <a href="{{ route('admin.portfolios.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Portfolios
            </a>
        </div>
    </div>

    <!-- Validation Errors -->
    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">There were {{ $errors->count() }} error(s) with your submission</h3>
                    <div class="mt-2 text-sm text-red-700">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Portfolio Information</h3>
        </div>
        <div class="p-6">
            <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- Tab Navigation -->
                <div class="border-b border-gray-200 mb-6">
                    <nav class="-mb-px flex space-x-8">
                        <button type="button" class="tab-button active py-2 px-1 border-b-2 border-blue-500 font-medium text-sm text-blue-600" data-tab="basic">
                            Basic Info
                        </button>
                        <button type="button" class="tab-button py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="work-process">
                            Work Process
                        </button>
                        <button type="button" class="tab-button py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="business-cases">
                            Specialist Business Cases
                        </button>
                        <button type="button" class="tab-button py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="client-reviews">
                            Client Reviews
                        </button>
                        <button type="button" class="tab-button py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="seo">
                            SEO
                        </button>
                    </nav>
                </div>
                
                <!-- Basic Info Tab -->
                <div id="basic-tab" class="tab-content">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror" 
                                   id="title" name="title" value="{{ old('title') }}" required>
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('category') border-red-500 @enderror" 
                                    id="category" name="category" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->slug }}" {{ old('category') == $category->slug ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Short Description *</label>
                        <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror" 
                                  id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mt-6">
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Project Image *</label>
                        <input type="file" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('image') border-red-500 @enderror" 
                               id="image" name="image" accept="image/*" required>
                        @error('image')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        <div>
                            <label for="client" class="block text-sm font-medium text-gray-700 mb-2">Client</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                   id="client" name="client" value="{{ old('client') }}">
                        </div>
                        
                        <div>
                            <label for="project_url" class="block text-sm font-medium text-gray-700 mb-2">Project URL</label>
                            <input type="url" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                   id="project_url" name="project_url" value="{{ old('project_url') }}">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                        <div>
                            <label for="project_date" class="block text-sm font-medium text-gray-700 mb-2">Project Date</label>
                            <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                   id="project_date" name="project_date" value="{{ old('project_date') }}">
                        </div>
                        
                        <div>
                            <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                            <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                   id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}">
                        </div>
                        
                        <div class="flex items-center mt-8">
                            <input type="checkbox" id="is_active" name="is_active" value="1" checked class="rounded">
                            <label for="is_active" class="ml-2 text-sm font-medium text-gray-700">Active</label>
                        </div>
                    </div>
                </div>
                
                <!-- Work Process Tab -->
                <div id="work-process-tab" class="tab-content hidden">
                    <div id="work-process-sections">
                        <div class="work-process-section border border-gray-200 rounded-lg p-4 mb-4">
                            <div class="flex justify-between items-center mb-4">
                                <h4 class="text-md font-medium text-gray-800">Work Process Step</h4>
                                <button type="button" class="remove-work-process text-red-600 hover:text-red-800">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                                    <input type="text" name="work_process[0][title]" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                                    <input type="file" name="work_process[0][image]" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                </div>
                            </div>
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                <textarea name="work_process[0][description]" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="add-work-process" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                        Add Work Process Step
                    </button>
                </div>
                
                <!-- Business Cases Tab -->
                <div id="business-cases-tab" class="tab-content hidden">
                    <div id="business-cases-sections">
                        <div class="business-case-section border border-gray-200 rounded-lg p-4 mb-4">
                            <div class="flex justify-between items-center mb-4">
                                <h4 class="text-md font-medium text-gray-800">Business Case</h4>
                                <button type="button" class="remove-business-case text-red-600 hover:text-red-800">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                                    <input type="text" name="business_cases[0][title]" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                                    <input type="file" name="business_cases[0][image]" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                </div>
                            </div>
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                <textarea name="business_cases[0][description]" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="add-business-case" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                        Add Business Case
                    </button>
                </div>
                
                <!-- Client Reviews Tab -->
                <div id="client-reviews-tab" class="tab-content hidden">
                    <div id="client-reviews-sections">
                        <div class="client-review-section border border-gray-200 rounded-lg p-4 mb-4">
                            <div class="flex justify-between items-center mb-4">
                                <h4 class="text-md font-medium text-gray-800">Client Review</h4>
                                <button type="button" class="remove-client-review text-red-600 hover:text-red-800">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Client Name</label>
                                    <input type="text" name="client_reviews[0][name]" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Position</label>
                                    <input type="text" name="client_reviews[0][position]" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                                    <select name="client_reviews[0][rating]" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                        <option value="5">5 Stars</option>
                                        <option value="4">4 Stars</option>
                                        <option value="3">3 Stars</option>
                                        <option value="2">2 Stars</option>
                                        <option value="1">1 Star</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Client Image</label>
                                    <input type="file" name="client_reviews[0][image]" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                </div>
                            </div>
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Review Message</label>
                                <textarea name="client_reviews[0][message]" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="add-client-review" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                        Add Client Review
                    </button>
                </div>
                
                <!-- SEO Tab -->
                <div id="seo-tab" class="tab-content hidden">
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">SEO Settings</h3>
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                                <input type="text" name="meta_title" value="{{ old('meta_title') }}" placeholder="Custom meta title for this portfolio" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <p class="text-xs text-gray-500 mt-1">Leave empty to use portfolio title + site name</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                                <textarea name="meta_description" rows="3" placeholder="Brief description for search engines (150-160 characters recommended)" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('meta_description') }}</textarea>
                                <p class="text-xs text-gray-500 mt-1">Leave empty to use portfolio description</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Meta Keywords</label>
                                <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}" placeholder="keyword1, keyword2, keyword3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <p class="text-xs text-gray-500 mt-1">Comma-separated keywords related to this portfolio</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-between mt-8">
                    <a href="{{ route('admin.portfolios.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition-colors">Cancel</a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition-colors">Add Portfolio</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Tab functionality
document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const tabName = this.getAttribute('data-tab');
            
            // Remove active class from all buttons and contents
            tabButtons.forEach(btn => {
                btn.classList.remove('active', 'border-blue-500', 'text-blue-600');
                btn.classList.add('border-transparent', 'text-gray-500');
            });
            tabContents.forEach(content => content.classList.add('hidden'));
            
            // Add active class to clicked button and show content
            this.classList.add('active', 'border-blue-500', 'text-blue-600');
            this.classList.remove('border-transparent', 'text-gray-500');
            document.getElementById(tabName + '-tab').classList.remove('hidden');
        });
    });
    
    // Add work process functionality
    let workProcessIndex = 1;
    document.getElementById('add-work-process').addEventListener('click', function() {
        const container = document.getElementById('work-process-sections');
        const newSection = document.querySelector('.work-process-section').cloneNode(true);
        
        // Update input names
        newSection.querySelectorAll('input, textarea').forEach(input => {
            const name = input.getAttribute('name');
            if (name) {
                input.setAttribute('name', name.replace('[0]', '[' + workProcessIndex + ']'));
                input.value = '';
            }
        });
        
        container.appendChild(newSection);
        workProcessIndex++;
    });
    
    // Add business case functionality
    let businessCaseIndex = 1;
    document.getElementById('add-business-case').addEventListener('click', function() {
        const container = document.getElementById('business-cases-sections');
        const newSection = document.querySelector('.business-case-section').cloneNode(true);
        
        newSection.querySelectorAll('input, textarea').forEach(input => {
            const name = input.getAttribute('name');
            if (name) {
                input.setAttribute('name', name.replace('[0]', '[' + businessCaseIndex + ']'));
                input.value = '';
            }
        });
        
        container.appendChild(newSection);
        businessCaseIndex++;
    });
    
    // Add client review functionality
    let clientReviewIndex = 1;
    document.getElementById('add-client-review').addEventListener('click', function() {
        const container = document.getElementById('client-reviews-sections');
        const newSection = document.querySelector('.client-review-section').cloneNode(true);
        
        newSection.querySelectorAll('input, textarea, select').forEach(input => {
            const name = input.getAttribute('name');
            if (name) {
                input.setAttribute('name', name.replace('[0]', '[' + clientReviewIndex + ']'));
                if (input.type === 'file') {
                    input.value = '';
                } else {
                    input.value = '';
                }
            }
        });
        
        container.appendChild(newSection);
        clientReviewIndex++;
    });
    
    // Remove section functionality
    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-work-process')) {
            e.preventDefault();
            e.target.closest('.work-process-section').remove();
        }
        if (e.target.closest('.remove-business-case')) {
            e.preventDefault();
            e.target.closest('.business-case-section').remove();
        }
        if (e.target.closest('.remove-client-review')) {
            e.preventDefault();
            e.target.closest('.client-review-section').remove();
        }
    });
});
</script>
@endsection