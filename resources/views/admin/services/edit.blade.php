@extends('dashboard')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Edit Service</h1>
                <p class="text-gray-600 mt-1">Update comprehensive service with all sections</p>
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
            <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!-- Tab Navigation -->
                <div class="border-b border-gray-200 mb-6">
                    <nav class="-mb-px flex space-x-8">
                        <button type="button" class="tab-btn active py-2 px-1 border-b-2 border-blue-500 font-medium text-sm text-blue-600" data-tab="basic">
                            Basic Info
                        </button>
                        <button type="button" class="tab-btn py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="section">
                            Section
                        </button>
                        <button type="button" class="tab-btn py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="serve">
                            We Serve
                        </button>
                        <button type="button" class="tab-btn py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="overview">
                            Overview
                        </button>
                        <button type="button" class="tab-btn py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="technologies">
                            Technologies
                        </button>
                        <button type="button" class="tab-btn py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="process">
                            Process
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
                            <label class="block text-sm font-medium text-gray-700 mb-2">Service Title *</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $service->title) }}" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror">
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Slug *</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug', $service->slug) }}" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('slug') border-red-500 @enderror">
                            @error('slug')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                            <textarea name="description" rows="3" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror">{{ old('description', $service->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                            <textarea id="content" name="content" rows="6" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('content', $service->content) }}</textarea>
                        </div>
                        @if($service->image)
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
                            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-32 h-32 object-cover rounded-lg">
                        </div>
                        @endif
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                            <input type="file" name="image" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                            <input type="number" name="sort_order" value="{{ old('sort_order', $service->sort_order) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="md:col-span-2">
                            <label class="flex items-center">
                                <input type="checkbox" name="is_active" {{ old('is_active', $service->is_active) ? 'checked' : '' }} class="h-4 w-4 text-blue-600 rounded">
                                <span class="ml-2 text-sm text-gray-900">Active Service</span>
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- Section Tab -->
                <div class="tab-content hidden" id="section">
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Service Sections</h3>
                        <div id="sections-container" class="space-y-4">
                            @forelse($service->sections ?? [] as $index => $section)
                            <div class="section-item border border-gray-200 p-4 rounded-lg">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Section Title</label>
                                        <input type="text" name="sections[{{ $index }}][title]" value="{{ old('sections.' . $index . '.title', $section['title'] ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Section Image</label>
                                        @if(isset($section['image']) && $section['image'])
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $section['image']) }}" alt="Current Image" class="w-20 h-20 object-cover rounded border" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                                            <p class="text-xs text-red-500 mt-1" style="display:none;">Image not found: {{ $section['image'] }}</p>
                                            <p class="text-xs text-gray-500 mt-1">Current Image</p>
                                        </div>
                                        @endif
                                        <input type="file" name="sections[{{ $index }}][image]" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                        <textarea name="sections[{{ $index }}][description]" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('sections.' . $index . '.description', $section['description'] ?? '') }}</textarea>
                                    </div>
                                    <div class="md:col-span-2">
                                        <button type="button" onclick="this.closest('.section-item').remove()" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200">Remove</button>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="section-item border border-gray-200 p-4 rounded-lg">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Section Title</label>
                                        <input type="text" name="sections[0][title]" placeholder="Why Choose Us" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Section Image</label>
                                        <input type="file" name="sections[0][image]" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                        <textarea name="sections[0][description]" rows="4" placeholder="Section description content" class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                        <button type="button" onclick="addSection()" class="mt-4 px-4 py-2 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200">Add Section</button>
                    </div>
                </div>
                
                <!-- We Serve Tab -->
                <div class="tab-content hidden" id="serve">
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">We Serve</h3>
                        <div id="serve-container" class="space-y-4">
                            @forelse($service->we_serve ?? [] as $index => $serve)
                            <div class="serve-item border border-gray-200 p-4 rounded-lg">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Industry Title</label>
                                        <input type="text" name="we_serve[{{ $index }}][title]" value="{{ old('we_serve.' . $index . '.title', $serve['title'] ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Icon Class</label>
                                        <input type="text" name="we_serve[{{ $index }}][icon]" value="{{ old('we_serve.' . $index . '.icon', $serve['icon'] ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                        <textarea name="we_serve[{{ $index }}][description]" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('we_serve.' . $index . '.description', $serve['description'] ?? '') }}</textarea>
                                    </div>
                                    <div class="md:col-span-2">
                                        <button type="button" onclick="this.closest('.serve-item').remove()" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200">Remove</button>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="serve-item border border-gray-200 p-4 rounded-lg">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Industry Title</label>
                                        <input type="text" name="we_serve[0][title]" placeholder="Enterprise" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Icon Class</label>
                                        <input type="text" name="we_serve[0][icon]" placeholder="bi bi-building" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                        <textarea name="we_serve[0][description]" rows="2" placeholder="How we serve this industry" class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                        <button type="button" onclick="addServe()" class="mt-4 px-4 py-2 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200">Add Industry</button>
                    </div>
                </div>
                
                <!-- Overview Tab -->
                <div class="tab-content hidden" id="overview">
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Service Overview</h3>
                        <div id="overview-container" class="space-y-4">
                            @forelse($service->service_overview ?? [] as $index => $overview)
                            <div class="overview-item border border-gray-200 p-4 rounded-lg">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Overview Title</label>
                                        <input type="text" name="service_overview[{{ $index }}][title]" value="{{ old('service_overview.' . $index . '.title', $overview['title'] ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Icon Class</label>
                                        <input type="text" name="service_overview[{{ $index }}][icon]" value="{{ old('service_overview.' . $index . '.icon', $overview['icon'] ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                        <textarea name="service_overview[{{ $index }}][description]" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('service_overview.' . $index . '.description', $overview['description'] ?? '') }}</textarea>
                                    </div>
                                    <div class="md:col-span-2">
                                        <button type="button" onclick="this.closest('.overview-item').remove()" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200">Remove</button>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="overview-item border border-gray-200 p-4 rounded-lg">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Overview Title</label>
                                        <input type="text" name="service_overview[0][title]" placeholder="Fast Delivery" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Icon Class</label>
                                        <input type="text" name="service_overview[0][icon]" placeholder="bi bi-lightning" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                        <textarea name="service_overview[0][description]" rows="2" placeholder="Quick turnaround time" class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                        <button type="button" onclick="addOverview()" class="mt-4 px-4 py-2 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200">Add Overview Item</button>
                    </div>
                </div>
                
                <!-- Technologies Tab -->
                <div class="tab-content hidden" id="technologies">
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Technologies We Use</h3>
                        <div id="technologies-container" class="space-y-4">
                            @forelse($service->technologies ?? [] as $index => $tech)
                            <div class="technology-item border border-gray-200 p-4 rounded-lg">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Technology Name</label>
                                        <input type="text" name="technologies[{{ $index }}][name]" value="{{ old('technologies.' . $index . '.name', $tech['name'] ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Icon Class</label>
                                        <input type="text" name="technologies[{{ $index }}][icon]" value="{{ old('technologies.' . $index . '.icon', $tech['icon'] ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div class="md:col-span-2">
                                        <button type="button" onclick="this.closest('.technology-item').remove()" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200">Remove</button>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="technology-item border border-gray-200 p-4 rounded-lg">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Technology Name</label>
                                        <input type="text" name="technologies[0][name]" placeholder="HTML5/CSS3" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Icon Class</label>
                                        <input type="text" name="technologies[0][icon]" placeholder="bi bi-code-slash" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                        <button type="button" onclick="addTechnology()" class="mt-4 px-4 py-2 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200">Add Technology</button>
                    </div>
                </div>
                

                
                <!-- Process Tab -->
                <div class="tab-content hidden" id="process">
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Our Process</h3>
                        <div id="process-container" class="space-y-4">
                            @forelse($service->process_steps ?? [] as $index => $step)
                            <div class="process-item border border-gray-200 p-4 rounded-lg">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Step Number</label>
                                        <input type="number" name="process_steps[{{ $index }}][step]" value="{{ old('process_steps.' . $index . '.step', $step['step'] ?? ($index + 1)) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Step Title</label>
                                        <input type="text" name="process_steps[{{ $index }}][title]" value="{{ old('process_steps.' . $index . '.title', $step['title'] ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Icon Class</label>
                                        <input type="text" name="process_steps[{{ $index }}][icon]" value="{{ old('process_steps.' . $index . '.icon', $step['icon'] ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div class="md:col-span-3">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                        <textarea name="process_steps[{{ $index }}][description]" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('process_steps.' . $index . '.description', $step['description'] ?? '') }}</textarea>
                                    </div>
                                    <div class="md:col-span-3">
                                        <button type="button" onclick="this.closest('.process-item').remove()" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200">Remove</button>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="process-item border border-gray-200 p-4 rounded-lg">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Step Number</label>
                                        <input type="number" name="process_steps[0][step]" value="1" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Step Title</label>
                                        <input type="text" name="process_steps[0][title]" placeholder="Planning" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Icon Class</label>
                                        <input type="text" name="process_steps[0][icon]" placeholder="bi bi-clipboard-check" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div class="md:col-span-3">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                        <textarea name="process_steps[0][description]" rows="2" placeholder="Step description" class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                        <button type="button" onclick="addProcess()" class="mt-4 px-4 py-2 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200">Add Process Step</button>
                    </div>
                </div>
                
                <!-- SEO Tab -->
                <div class="tab-content hidden" id="seo">
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">SEO Settings</h3>
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                                <input type="text" name="meta_title" value="{{ old('meta_title', $service->meta_title) }}" placeholder="Custom meta title for this service" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <p class="text-xs text-gray-500 mt-1">Leave empty to use service title + site name</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                                <textarea name="meta_description" rows="3" placeholder="Brief description for search engines (150-160 characters recommended)" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('meta_description', $service->meta_description) }}</textarea>
                                <p class="text-xs text-gray-500 mt-1">Leave empty to use service description</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Meta Keywords</label>
                                <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $service->meta_keywords) }}" placeholder="keyword1, keyword2, keyword3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <p class="text-xs text-gray-500 mt-1">Comma-separated keywords related to this service</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Submit Buttons -->
                <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.services.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200">Cancel</a>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Update Service</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Auto-generate slug from title
function generateSlug(text) {
    return text
        .toLowerCase()
        .replace(/[^a-z0-9 -]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-')
        .trim('-');
}

// Tab functionality
document.addEventListener('DOMContentLoaded', function() {
    // Auto-generate slug when title changes (only if slug is empty or matches current title)
    const titleInput = document.getElementById('title');
    const slugInput = document.getElementById('slug');
    
    if (titleInput && slugInput) {
        const originalTitle = titleInput.value;
        const originalSlug = slugInput.value;
        
        titleInput.addEventListener('input', function() {
            // Only auto-generate if slug hasn't been manually changed
            if (!slugInput.dataset.manual && (slugInput.value === originalSlug || slugInput.value === generateSlug(originalTitle))) {
                slugInput.value = generateSlug(this.value);
            }
        });
        
        slugInput.addEventListener('input', function() {
            this.dataset.manual = 'true';
        });
    }
    const tabBtns = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const targetTab = this.getAttribute('data-tab');
            
            // Remove active from all buttons
            tabBtns.forEach(b => {
                b.classList.remove('border-blue-500', 'text-blue-600');
                b.classList.add('border-transparent', 'text-gray-500');
            });
            
            // Add active to clicked button
            this.classList.add('border-blue-500', 'text-blue-600');
            this.classList.remove('border-transparent', 'text-gray-500');
            
            // Hide all contents
            tabContents.forEach(content => {
                content.classList.add('hidden');
            });
            
            // Show target content
            document.getElementById(targetTab).classList.remove('hidden');
        });
    });
});

let sectionIndex = {{ count($service->sections ?? []) > 0 ? count($service->sections ?? []) : 1 }};
let serveIndex = {{ count($service->we_serve ?? []) > 0 ? count($service->we_serve ?? []) : 1 }};
let overviewIndex = {{ count($service->service_overview ?? []) > 0 ? count($service->service_overview ?? []) : 1 }};
let technologyIndex = {{ count($service->technologies ?? []) > 0 ? count($service->technologies ?? []) : 1 }};
let processIndex = {{ count($service->process_steps ?? []) > 0 ? count($service->process_steps ?? []) : 1 }};

function addSection() {
    const container = document.getElementById('sections-container');
    const newItem = document.createElement('div');
    newItem.className = 'section-item border border-gray-200 p-4 rounded-lg';
    newItem.innerHTML = `
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Section Title</label>
                <input type="text" name="sections[${sectionIndex}][title]" placeholder="Section Title" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Section Image</label>
                <input type="file" name="sections[${sectionIndex}][image]" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="sections[${sectionIndex}][description]" rows="4" placeholder="Section description content" class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
            </div>
            <div class="md:col-span-2">
                <button type="button" onclick="this.closest('.section-item').remove()" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200">Remove</button>
            </div>
        </div>
    `;
    container.appendChild(newItem);
    sectionIndex++;
}

function addServe() {
    const container = document.getElementById('serve-container');
    const newItem = document.createElement('div');
    newItem.className = 'serve-item border border-gray-200 p-4 rounded-lg';
    newItem.innerHTML = `
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Industry Title</label>
                <input type="text" name="we_serve[${serveIndex}][title]" placeholder="Industry Title" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Icon Class</label>
                <input type="text" name="we_serve[${serveIndex}][icon]" placeholder="bi bi-building" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="we_serve[${serveIndex}][description]" rows="2" placeholder="How we serve this industry" class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
            </div>
            <div class="md:col-span-2">
                <button type="button" onclick="this.closest('.serve-item').remove()" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200">Remove</button>
            </div>
        </div>
    `;
    container.appendChild(newItem);
    serveIndex++;
}

function addOverview() {
    const container = document.getElementById('overview-container');
    const newItem = document.createElement('div');
    newItem.className = 'overview-item border border-gray-200 p-4 rounded-lg';
    newItem.innerHTML = `
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Overview Title</label>
                <input type="text" name="service_overview[${overviewIndex}][title]" placeholder="Overview Title" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Icon Class</label>
                <input type="text" name="service_overview[${overviewIndex}][icon]" placeholder="bi bi-lightning" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="service_overview[${overviewIndex}][description]" rows="2" placeholder="Description" class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
            </div>
            <div class="md:col-span-2">
                <button type="button" onclick="this.closest('.overview-item').remove()" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200">Remove</button>
            </div>
        </div>
    `;
    container.appendChild(newItem);
    overviewIndex++;
}

function addTechnology() {
    const container = document.getElementById('technologies-container');
    const newItem = document.createElement('div');
    newItem.className = 'technology-item border border-gray-200 p-4 rounded-lg';
    newItem.innerHTML = `
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Technology Name</label>
                <input type="text" name="technologies[${technologyIndex}][name]" placeholder="Technology Name" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Icon Class</label>
                <input type="text" name="technologies[${technologyIndex}][icon]" placeholder="bi bi-code-slash" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="md:col-span-2">
                <button type="button" onclick="this.closest('.technology-item').remove()" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200">Remove</button>
            </div>
        </div>
    `;
    container.appendChild(newItem);
    technologyIndex++;
}



function addProcess() {
    const container = document.getElementById('process-container');
    const newItem = document.createElement('div');
    newItem.className = 'process-item border border-gray-200 p-4 rounded-lg';
    newItem.innerHTML = `
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Step Number</label>
                <input type="number" name="process_steps[${processIndex}][step]" value="${processIndex + 1}" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Step Title</label>
                <input type="text" name="process_steps[${processIndex}][title]" placeholder="Step Title" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Icon Class</label>
                <input type="text" name="process_steps[${processIndex}][icon]" placeholder="bi bi-clipboard-check" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="md:col-span-3">
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="process_steps[${processIndex}][description]" rows="2" placeholder="Step description" class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
            </div>
            <div class="md:col-span-3">
                <button type="button" onclick="this.closest('.process-item').remove()" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200">Remove</button>
            </div>
        </div>
    `;
    container.appendChild(newItem);
    processIndex++;
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
});
</script>
@endsection