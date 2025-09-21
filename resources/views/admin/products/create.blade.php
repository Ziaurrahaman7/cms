@extends('dashboard')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Create Product</h1>
                <p class="text-gray-600 mt-1">Add a new product with all details</p>
            </div>
            <a href="{{ route('admin.products.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Products
            </a>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- Tab Navigation -->
                <div class="border-b border-gray-200 mb-6">
                    <nav class="-mb-px flex space-x-8">
                        <button type="button" class="tab-btn active py-2 px-1 border-b-2 border-blue-500 font-medium text-sm text-blue-600" data-tab="basic">
                            Basic Info
                        </button>
                        <button type="button" class="tab-btn py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="features">
                            Features
                        </button>
                        <button type="button" class="tab-btn py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="specifications">
                            Specifications
                        </button>
                        <button type="button" class="tab-btn py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="faqs">
                            FAQs
                        </button>
                        <button type="button" class="tab-btn py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="why-choose">
                            Why Choose
                        </button>
                        <button type="button" class="tab-btn py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="testimonials">
                            Testimonials
                        </button>
                        <button type="button" class="tab-btn py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="sections">
                            General Sections
                        </button>
                        <button type="button" class="tab-btn py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="seo">
                            SEO
                        </button>
                    </nav>
                </div>
                
                <!-- Basic Info Tab -->
                <div class="tab-content" id="basic">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Product Title *</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('title')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Slug *</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('slug')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                            <textarea name="description" rows="3" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                            <textarea id="content" name="content" rows="6" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('content') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                            <input type="file" name="image" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                            <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="md:col-span-2">
                            <label class="flex items-center">
                                <input type="checkbox" name="is_active" {{ old('is_active', true) ? 'checked' : '' }} class="h-4 w-4 text-blue-600 rounded">
                                <span class="ml-2 text-sm text-gray-900">Active Product</span>
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- Features Tab -->
                <div class="tab-content hidden" id="features">
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Product Features</h3>
                        <div id="features-container" class="space-y-4">
                            <div class="feature-item border border-gray-200 p-4 rounded-lg">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Feature Title</label>
                                        <input type="text" name="features[0][title]" value="{{ old('features.0.title') }}" placeholder="Advanced Technology" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Icon Class</label>
                                        <input type="text" name="features[0][icon]" value="{{ old('features.0.icon') }}" placeholder="bi bi-check-circle" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                        <textarea name="features[0][description]" rows="2" placeholder="Brief description" class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('features.0.description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" onclick="addFeature()" class="mt-4 px-4 py-2 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200">Add Feature</button>
                    </div>
                </div>
                
                <!-- Specifications Tab -->
                <div class="tab-content hidden" id="specifications">
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Product Specifications</h3>
                        <div id="specifications-container" class="space-y-4">
                            <div class="specification-item border border-gray-200 p-4 rounded-lg">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Specification Title</label>
                                        <input type="text" name="specifications[0][title]" value="{{ old('specifications.0.title') }}" placeholder="Performance" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Icon Class</label>
                                        <input type="text" name="specifications[0][icon]" value="{{ old('specifications.0.icon') }}" placeholder="bi bi-cpu" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                        <textarea name="specifications[0][description]" rows="2" placeholder="Specification details" class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('specifications.0.description') }}</textarea>
                                    </div>
                                    <div class="md:col-span-2">
                                        <button type="button" onclick="this.closest('.specification-item').remove()" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" onclick="addSpecification()" class="mt-4 px-4 py-2 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200">Add Specification</button>
                    </div>
                </div>
                
                <!-- FAQs Tab -->
                <div class="tab-content hidden" id="faqs">
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Frequently Asked Questions</h3>
                        <div id="faqs-container" class="space-y-4">
                            <div class="faq-item border border-gray-200 p-4 rounded-lg">
                                <div class="grid grid-cols-1 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Question</label>
                                        <input type="text" name="faqs[0][question]" value="{{ old('faqs.0.question') }}" placeholder="What is this product?" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Answer</label>
                                        <textarea name="faqs[0][answer]" rows="3" placeholder="Answer to the question" class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('faqs.0.answer') }}</textarea>
                                    </div>
                                    <div>
                                        <button type="button" onclick="this.closest('.faq-item').remove()" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" onclick="addFaq()" class="mt-4 px-4 py-2 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200">Add FAQ</button>
                    </div>
                </div>
                
                <!-- Why Choose Tab -->
                <div class="tab-content hidden" id="why-choose">
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Why Choose This Product</h3>
                        <div id="why-choose-container" class="space-y-4">
                            <div class="why-choose-item border border-gray-200 p-4 rounded-lg">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Reason Title</label>
                                        <input type="text" name="why_choose[0][title]" value="{{ old('why_choose.0.title') }}" placeholder="Advanced Technology" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Icon Class</label>
                                        <input type="text" name="why_choose[0][icon]" value="{{ old('why_choose.0.icon') }}" placeholder="bi bi-lightning" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                        <textarea name="why_choose[0][description]" rows="2" placeholder="Why this is important" class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('why_choose.0.description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" onclick="addWhyChoose()" class="mt-4 px-4 py-2 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200">Add Reason</button>
                    </div>
                </div>
                
                <!-- Testimonials Tab -->
                <div class="tab-content hidden" id="testimonials">
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Customer Testimonials</h3>
                        <div id="testimonials-container" class="space-y-4">
                            <div class="testimonial-item border border-gray-200 p-4 rounded-lg">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Customer Name</label>
                                        <input type="text" name="testimonials[0][name]" value="{{ old('testimonials.0.name') }}" placeholder="John Smith" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Company</label>
                                        <input type="text" name="testimonials[0][company]" value="{{ old('testimonials.0.company') }}" placeholder="Tech Solutions Inc." class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Customer Image</label>
                                        <input type="file" name="testimonials[0][image]" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                                        <select name="testimonials[0][rating]" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                            <option value="5" {{ old('testimonials.0.rating') == '5' ? 'selected' : '' }}>5 Stars</option>
                                            <option value="4" {{ old('testimonials.0.rating') == '4' ? 'selected' : '' }}>4 Stars</option>
                                            <option value="3" {{ old('testimonials.0.rating') == '3' ? 'selected' : '' }}>3 Stars</option>
                                            <option value="2" {{ old('testimonials.0.rating') == '2' ? 'selected' : '' }}>2 Stars</option>
                                            <option value="1" {{ old('testimonials.0.rating') == '1' ? 'selected' : '' }}>1 Star</option>
                                        </select>
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Testimonial Text</label>
                                        <textarea name="testimonials[0][text]" rows="3" placeholder="This product transformed our business..." class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('testimonials.0.text') }}</textarea>
                                    </div>
                                    <div class="md:col-span-2">
                                        <button type="button" onclick="this.closest('.testimonial-item').remove()" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" onclick="addTestimonial()" class="mt-4 px-4 py-2 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200">Add Testimonial</button>
                    </div>
                </div>
                
                <!-- General Sections Tab -->
                <div class="tab-content hidden" id="sections">
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">General Sections</h3>
                        <div id="sections-container" class="space-y-4">
                            <div class="section-item border border-gray-200 p-4 rounded-lg">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Section Name</label>
                                        <input type="text" name="sections[0][name]" value="{{ old('sections.0.name') }}" placeholder="Section 1" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Section Image</label>
                                        <input type="file" name="sections[0][image]" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Section Title</label>
                                        <input type="text" name="sections[0][title]" value="{{ old('sections.0.title') }}" placeholder="Section Title" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Icon Class</label>
                                        <input type="text" name="sections[0][icon]" value="{{ old('sections.0.icon') }}" placeholder="bi bi-star" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Section Description</label>
                                        <textarea name="sections[0][description]" rows="3" placeholder="Section description" class="summernote w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('sections.0.description') }}</textarea>
                                    </div>
                                    <div class="md:col-span-2">
                                        <button type="button" onclick="this.closest('.section-item').remove()" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" onclick="addSection()" class="mt-4 px-4 py-2 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200">Add Section</button>
                    </div>
                </div>
                
                <!-- SEO Tab -->
                <div class="tab-content hidden" id="seo">
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">SEO Settings</h3>
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                                <input type="text" name="meta_title" value="{{ old('meta_title') }}" placeholder="Custom meta title for this product" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <p class="text-xs text-gray-500 mt-1">Leave empty to use product title + site name</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                                <textarea name="meta_description" rows="3" placeholder="Brief description for search engines (150-160 characters recommended)" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('meta_description') }}</textarea>
                                <p class="text-xs text-gray-500 mt-1">Leave empty to use product description</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Meta Keywords</label>
                                <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}" placeholder="keyword1, keyword2, keyword3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <p class="text-xs text-gray-500 mt-1">Comma-separated keywords related to this product</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Submit Buttons -->
                <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.products.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200">Cancel</a>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Create Product</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Tab functionality
document.addEventListener('DOMContentLoaded', function() {
    const tabBtns = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const targetTab = this.getAttribute('data-tab');
            
            tabBtns.forEach(b => {
                b.classList.remove('border-blue-500', 'text-blue-600');
                b.classList.add('border-transparent', 'text-gray-500');
            });
            
            this.classList.add('border-blue-500', 'text-blue-600');
            this.classList.remove('border-transparent', 'text-gray-500');
            
            tabContents.forEach(content => {
                content.classList.add('hidden');
            });
            
            document.getElementById(targetTab).classList.remove('hidden');
        });
    });
});

let featureIndex = 1;
let specificationIndex = 1;
let faqIndex = 1;
let testimonialIndex = 1;
let sectionIndex = 1;
let whyChooseIndex = 1;

function addFeature() {
    const container = document.getElementById('features-container');
    const newItem = document.createElement('div');
    newItem.className = 'feature-item border border-gray-200 p-4 rounded-lg';
    newItem.innerHTML = `
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Feature Title</label>
                <input type="text" name="features[${featureIndex}][title]" placeholder="Feature Title" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Icon Class</label>
                <input type="text" name="features[${featureIndex}][icon]" placeholder="bi bi-check-circle" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="features[${featureIndex}][description]" rows="2" placeholder="Brief description" class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
            </div>
            <div class="md:col-span-2">
                <button type="button" onclick="this.closest('.feature-item').remove()" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200">Remove</button>
            </div>
        </div>
    `;
    container.appendChild(newItem);
    featureIndex++;
}

function addSpecification() {
    const container = document.getElementById('specifications-container');
    const newItem = document.createElement('div');
    newItem.className = 'specification-item border border-gray-200 p-4 rounded-lg';
    newItem.innerHTML = `
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Specification Title</label>
                <input type="text" name="specifications[${specificationIndex}][title]" placeholder="Specification Title" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Icon Class</label>
                <input type="text" name="specifications[${specificationIndex}][icon]" placeholder="bi bi-cpu" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="specifications[${specificationIndex}][description]" rows="2" placeholder="Specification details" class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
            </div>
            <div class="md:col-span-2">
                <button type="button" onclick="this.closest('.specification-item').remove()" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200">Remove</button>
            </div>
        </div>
    `;
    container.appendChild(newItem);
    specificationIndex++;
}

function addFaq() {
    const container = document.getElementById('faqs-container');
    const newItem = document.createElement('div');
    newItem.className = 'faq-item border border-gray-200 p-4 rounded-lg';
    newItem.innerHTML = `
        <div class="grid grid-cols-1 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Question</label>
                <input type="text" name="faqs[${faqIndex}][question]" placeholder="What is this product?" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Answer</label>
                <textarea name="faqs[${faqIndex}][answer]" rows="3" placeholder="Answer to the question" class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
            </div>
            <div>
                <button type="button" onclick="this.closest('.faq-item').remove()" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200">Remove</button>
            </div>
        </div>
    `;
    container.appendChild(newItem);
    faqIndex++;
}

function addTestimonial() {
    const container = document.getElementById('testimonials-container');
    const newItem = document.createElement('div');
    newItem.className = 'testimonial-item border border-gray-200 p-4 rounded-lg';
    newItem.innerHTML = `
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Customer Name</label>
                <input type="text" name="testimonials[${testimonialIndex}][name]" placeholder="Customer Name" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Company</label>
                <input type="text" name="testimonials[${testimonialIndex}][company]" placeholder="Company Name" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Customer Image</label>
                <input type="file" name="testimonials[${testimonialIndex}][image]" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                <select name="testimonials[${testimonialIndex}][rating]" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    <option value="5">5 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="2">2 Stars</option>
                    <option value="1">1 Star</option>
                </select>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Testimonial Text</label>
                <textarea name="testimonials[${testimonialIndex}][text]" rows="3" placeholder="Customer feedback" class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
            </div>
            <div class="md:col-span-2">
                <button type="button" onclick="this.closest('.testimonial-item').remove()" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200">Remove</button>
            </div>
        </div>
    `;
    container.appendChild(newItem);
    testimonialIndex++;
}

function addSection() {
    const container = document.getElementById('sections-container');
    const newItem = document.createElement('div');
    newItem.className = 'section-item border border-gray-200 p-4 rounded-lg';
    newItem.innerHTML = `
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Section Name</label>
                <input type="text" name="sections[${sectionIndex}][name]" placeholder="Section ${sectionIndex + 1}" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Section Image</label>
                <input type="file" name="sections[${sectionIndex}][image]" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Section Title</label>
                <input type="text" name="sections[${sectionIndex}][title]" placeholder="Section Title" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Icon Class</label>
                <input type="text" name="sections[${sectionIndex}][icon]" placeholder="bi bi-star" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Section Description</label>
                <textarea name="sections[${sectionIndex}][description]" rows="3" placeholder="Section description" class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
            </div>
            <div class="md:col-span-2">
                <button type="button" onclick="this.closest('.section-item').remove()" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200">Remove</button>
            </div>
        </div>
    `;
    container.appendChild(newItem);
    sectionIndex++;
}

function addWhyChoose() {
    const container = document.getElementById('why-choose-container');
    const newItem = document.createElement('div');
    newItem.className = 'why-choose-item border border-gray-200 p-4 rounded-lg';
    newItem.innerHTML = `
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Reason Title</label>
                <input type="text" name="why_choose[${whyChooseIndex}][title]" placeholder="Reason Title" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Icon Class</label>
                <input type="text" name="why_choose[${whyChooseIndex}][icon]" placeholder="bi bi-lightning" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="why_choose[${whyChooseIndex}][description]" rows="2" placeholder="Why this is important" class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
            </div>
            <div class="md:col-span-2">
                <button type="button" onclick="this.closest('.why-choose-item').remove()" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200">Remove</button>
            </div>
        </div>
    `;
    container.appendChild(newItem);
    whyChooseIndex++;
}

</script>

<!-- Summernote CSS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<!-- Summernote JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
$(document).ready(function() {
    $('#content').summernote({
        height: 300,
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
    
    $('.summernote').summernote({
        height: 200,
        toolbar: [
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link']]
        ]
    });
    
    // Auto generate slug from title
    $('#title').on('input', function() {
        let title = $(this).val();
        let slug = title.toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim('-');
        $('#slug').val(slug);
    });
    
    // Preserve form data on validation errors
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function() {
            const formData = new FormData(form);
            const data = {};
            for (let [key, value] of formData.entries()) {
                data[key] = value;
            }
            localStorage.setItem('productFormData', JSON.stringify(data));
        });
        
        if (document.querySelector('.text-red-500')) {
            const savedData = localStorage.getItem('productFormData');
            if (savedData) {
                const data = JSON.parse(savedData);
                Object.keys(data).forEach(key => {
                    const input = form.querySelector(`[name="${key}"]`);
                    if (input && !input.value) {
                        input.value = data[key];
                    }
                });
            }
        } else {
            localStorage.removeItem('productFormData');
        }
    }
});
</script>
@endsection