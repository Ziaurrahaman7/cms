@extends('dashboard')

@section('title', 'Create Case Study')

@section('content')
<div class="container-fluid">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Create Case Study</h2>
        <a href="{{ route('admin.case-studies.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg">Back to List</a>
    </div>

    <form action="{{ route('admin.case-studies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Tab Navigation -->
        <div class="bg-white rounded-lg shadow mb-6">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8 px-6">
                    <button type="button" class="tab-btn active py-4 px-1 border-b-2 border-blue-500 font-medium text-sm text-blue-600" data-tab="basic">Basic Info</button>
                    <button type="button" class="tab-btn py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="sections">Sections</button>
                    <button type="button" class="tab-btn py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="process">Work Process</button>
                    <button type="button" class="tab-btn py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="technologies">Technologies</button>
                    <button type="button" class="tab-btn py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="challenges">Challenges</button>
                    <button type="button" class="tab-btn py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="solutions">Solutions</button>
                    <button type="button" class="tab-btn py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="results">Results</button>
                    <button type="button" class="tab-btn py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="testimonial">Testimonial</button>
                    <button type="button" class="tab-btn py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="seo">SEO</button>
                </nav>
            </div>

            <!-- Basic Info Tab -->
            <div id="basic-tab" class="tab-content p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                        <input type="text" name="title" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Service *</label>
                        <select name="service_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('service_id') border-red-500 @enderror" required>
                            <option value="">Select a service</option>
                            @foreach(App\Models\Service::orderBy('title')->get() as $service)
                                <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>{{ $service->title }}</option>
                            @endforeach
                        </select>
                        @error('service_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Client</label>
                        <input type="text" name="client" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Project URL</label>
                        <input type="url" name="project_url" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Project Date</label>
                        <input type="date" name="project_date" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
                        <input type="file" name="featured_image" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
                <div class="mt-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                    <textarea name="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>
            </div>

            <!-- Sections Tab -->
            <div id="sections-tab" class="tab-content p-6 hidden">
                <div class="mb-4">
                    <button type="button" id="add-section" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">Add Section</button>
                </div>
                <div id="sections-container"></div>
            </div>

            <!-- Work Process Tab -->
            <div id="process-tab" class="tab-content p-6 hidden">
                <div class="mb-4">
                    <button type="button" id="add-process" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">Add Process Step</button>
                </div>
                <div id="process-container"></div>
            </div>

            <!-- Technologies Tab -->
            <div id="technologies-tab" class="tab-content p-6 hidden">
                <div class="text-center mb-6">
                    <div class="inline-flex items-center justify-content-center mb-3" style="width: 60px; height: 60px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%;">
                        <i class="text-white bi bi-gear-fill" style="font-size: 1.5rem;"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Technologies Used</h3>
                    <p class="text-gray-600">Add technologies with icons and descriptions</p>
                </div>
                <div class="mb-4">
                    <button type="button" id="add-technology" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
                        <i class="bi bi-plus-circle me-2"></i>Add Technology
                    </button>
                </div>
                <div id="technologies-container"></div>
            </div>

            <!-- Challenges Tab -->
            <div id="challenges-tab" class="tab-content p-6 hidden">
                <div class="text-center mb-6">
                    <div class="inline-flex items-center justify-content-center mb-3" style="width: 60px; height: 60px; background: linear-gradient(45deg, #f093fb, #f5576c); border-radius: 50%;">
                        <i class="text-white bi bi-exclamation-triangle-fill" style="font-size: 1.5rem;"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Project Challenges</h3>
                    <p class="text-gray-600">Describe the main challenges faced during this project</p>
                </div>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Challenges Image</label>
                        <input type="file" name="challenges_image" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Challenges</label>
                        <textarea name="challenges" rows="6" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Describe the technical, business, or design challenges encountered..."></textarea>
                    </div>
                </div>
            </div>

            <!-- Solutions Tab -->
            <div id="solutions-tab" class="tab-content p-6 hidden">
                <div class="text-center mb-6">
                    <div class="inline-flex items-center justify-content-center mb-3" style="width: 60px; height: 60px; background: linear-gradient(45deg, #4ecdc4, #44a08d); border-radius: 50%;">
                        <i class="text-white bi bi-lightbulb-fill" style="font-size: 1.5rem;"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Solutions Provided</h3>
                    <p class="text-gray-600">Explain how you solved the challenges and implemented solutions</p>
                </div>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Solutions Image</label>
                        <input type="file" name="solutions_image" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Solutions</label>
                        <textarea name="solutions" rows="6" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Describe the solutions, methodologies, and approaches used..."></textarea>
                    </div>
                </div>
            </div>

            <!-- Results Tab -->
            <div id="results-tab" class="tab-content p-6 hidden">
                <div class="text-center mb-6">
                    <div class="inline-flex items-center justify-content-center mb-3" style="width: 60px; height: 60px; background: linear-gradient(45deg, #feca57, #ff9ff3); border-radius: 50%;">
                        <i class="text-white bi bi-trophy-fill" style="font-size: 1.5rem;"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Project Results</h3>
                    <p class="text-gray-600">Highlight the outcomes, achievements, and impact of the project</p>
                </div>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Results Image</label>
                        <input type="file" name="results_image" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Results & Outcomes</label>
                        <textarea name="results" rows="6" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Describe the measurable results, performance improvements, user feedback..."></textarea>
                    </div>
                </div>
            </div>

            <!-- Testimonial Tab -->
            <div id="testimonial-tab" class="tab-content p-6 hidden">
                <div class="text-center mb-6">
                    <div class="inline-flex items-center justify-content-center mb-3" style="width: 60px; height: 60px; background: linear-gradient(45deg, #a8edea, #fed6e3); border-radius: 50%;">
                        <i class="text-white bi bi-chat-heart-fill" style="font-size: 1.5rem;"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Client Testimonial</h3>
                    <p class="text-gray-600">Add client feedback and testimonial for this project</p>
                </div>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Client Image</label>
                        <input type="file" name="client_testimonial[image]" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Client Name</label>
                            <input type="text" name="client_testimonial[name]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="John Doe">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Client Position</label>
                            <input type="text" name="client_testimonial[position]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="CEO, Company Name">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Testimonial Message</label>
                        <textarea name="client_testimonial[message]" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="The team delivered exceptional results and exceeded our expectations..."></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                        <select name="client_testimonial[rating]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="5" selected>5 Stars</option>
                            <option value="4">4 Stars</option>
                            <option value="3">3 Stars</option>
                            <option value="2">2 Stars</option>
                            <option value="1">1 Star</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- SEO Tab -->
            <div id="seo-tab" class="tab-content p-6 hidden">
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                        <input type="text" name="meta_title" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Meta Keywords</label>
                        <input type="text" name="meta_keywords" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.case-studies.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-md">Cancel</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md">Create Case Study</button>
        </div>
    </form>
</div>

<script>
// Tab functionality
document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const tabName = this.dataset.tab;
        
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
        
        // Show selected tab content
        document.getElementById(tabName + '-tab').classList.remove('hidden');
    });
});

// Add section functionality
let sectionCount = 0;
document.getElementById('add-section').addEventListener('click', function() {
    const container = document.getElementById('sections-container');
    const sectionHtml = `
        <div class="section-item border border-gray-200 rounded-md p-4 mb-4">
            <div class="flex justify-between items-center mb-4">
                <h4 class="font-medium">Section ${sectionCount + 1}</h4>
                <button type="button" class="remove-section text-red-600 hover:text-red-800">Remove</button>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Section Title</label>
                <input type="text" name="sections[${sectionCount}][title]" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Section Image</label>
                <input type="file" name="sections[${sectionCount}][image]" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Section Content</label>
                <textarea name="sections[${sectionCount}][content]" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
            </div>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', sectionHtml);
    sectionCount++;
});

// Add process functionality
let processCount = 0;
document.getElementById('add-process').addEventListener('click', function() {
    const container = document.getElementById('process-container');
    const processHtml = `
        <div class="process-item border border-gray-200 rounded-md p-4 mb-4">
            <div class="flex justify-between items-center mb-4">
                <h4 class="font-medium">Process Step ${processCount + 1}</h4>
                <button type="button" class="remove-process text-red-600 hover:text-red-800">Remove</button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Step Title</label>
                    <input type="text" name="work_process[${processCount}][title]" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Step Order</label>
                    <input type="number" name="work_process[${processCount}][order]" value="${processCount + 1}" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>
            </div>
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Step Description</label>
                <textarea name="work_process[${processCount}][description]" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
            </div>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', processHtml);
    processCount++;
});

// Add technology functionality
let technologyCount = 0;
document.getElementById('add-technology').addEventListener('click', function() {
    const container = document.getElementById('technologies-container');
    const technologyHtml = `
        <div class="technology-item border border-gray-200 rounded-md p-4 mb-4">
            <div class="flex justify-between items-center mb-4">
                <h4 class="font-medium">Technology ${technologyCount + 1}</h4>
                <button type="button" class="remove-technology text-red-600 hover:text-red-800">
                    <i class="bi bi-x-circle"></i> Remove
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Technology Name</label>
                    <input type="text" name="technologies[${technologyCount}][name]" class="w-full px-3 py-2 border border-gray-300 rounded-md" placeholder="e.g., Laravel">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Icon Class</label>
                    <input type="text" name="technologies[${technologyCount}][icon]" class="w-full px-3 py-2 border border-gray-300 rounded-md" placeholder="e.g., bi bi-code-slash">
                </div>
            </div>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', technologyHtml);
    technologyCount++;
});

// Remove functionality
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-section')) {
        e.target.closest('.section-item').remove();
    }
    if (e.target.classList.contains('remove-process')) {
        e.target.closest('.process-item').remove();
    }
    if (e.target.classList.contains('remove-technology') || e.target.closest('.remove-technology')) {
        e.target.closest('.technology-item').remove();
    }
});
</script>
@endsection