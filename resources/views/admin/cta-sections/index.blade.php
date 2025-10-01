<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTA Sections Management - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white">
            <div class="p-6">
                <h2 class="text-2xl font-bold">TechnoIT Admin</h2>
            </div>
            <nav class="mt-6">
                <a href="{{ route('dashboard') }}" class="block px-6 py-3 hover:bg-gray-700">Dashboard</a>
                <a href="{{ route('admin.cta-sections.index') }}" class="block px-6 py-3 bg-gray-700 text-white">CTA Sections</a>
                <a href="{{ route('posts.index') }}" class="block px-6 py-3 hover:bg-gray-700">Posts</a>
                <form method="POST" action="{{ route('logout') }}" class="block">
                    @csrf
                    <button type="submit" class="w-full text-left px-6 py-3 hover:bg-gray-700">Logout</button>
                </form>
            </nav>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 p-8">
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Home Page CTA Sections</h3>
                </div>
                
                @if(session('success'))
                    <div class="alert alert-success mx-3 mt-3">{{ session('success') }}</div>
                @endif

                <form action="{{ route('admin.cta-sections.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="p-6">
                        <!-- Ready to Transform Your Business Section -->
                        <div class="mb-8">
                            <h4 class="mb-4 text-xl font-semibold text-blue-600">Ready to Transform Your Business? Section</h4>
                            @php
                                $transformSection = App\Models\CTASection::getSection('transform_business', [
                                    'title' => 'Ready to Transform Your Business?',
                                    'description' => 'Get started with our professional services today',
                                    'button_text' => 'Request Quote',
                                    'button_link' => '/contact',
                                    'secondary_button_text' => 'Contact Us',
                                    'secondary_button_link' => '/contact'
                                ]);
                            @endphp
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                                    <input type="text" name="sections[transform_business][title]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $transformSection->title }}" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                    <input type="text" name="sections[transform_business][description]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $transformSection->description }}">
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Button Text</label>
                                    <input type="text" name="sections[transform_business][button_text]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $transformSection->button_text }}">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Button Link</label>
                                    <input type="text" name="sections[transform_business][button_link]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $transformSection->button_link }}">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Secondary Button Text</label>
                                    <input type="text" name="sections[transform_business][secondary_button_text]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $transformSection->secondary_button_text }}">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Secondary Button Link</label>
                                    <input type="text" name="sections[transform_business][secondary_button_link]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $transformSection->secondary_button_link }}">
                                </div>
                            </div>
                            
                            <div class="flex items-center">
                                <input type="hidden" name="sections[transform_business][is_active]" value="0">
                                <input type="checkbox" name="sections[transform_business][is_active]" value="1" class="rounded" {{ $transformSection->is_active ? 'checked' : '' }}>
                                <label class="ml-2 text-sm font-medium text-gray-700">Active</label>
                            </div>
                        </div>

                        <hr class="my-8">

                        <!-- Let's Discuss your Projects Section -->
                        <div class="mb-6">
                            <h4 class="mb-4 text-xl font-semibold text-blue-600">Let's Discuss your Projects Section</h4>
                            @php
                                $discussSection = App\Models\CTASection::getSection('discuss_projects', [
                                    'title' => "Let's Discuss your Projects",
                                    'description' => 'We pride ourselves with our ability to perform and deliver results. Use the form below to discuss your project needs with our team, we will get back asap',
                                    'button_text' => 'Contact Us',
                                    'button_link' => '/contact'
                                ]);
                            @endphp
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                                    <input type="text" name="sections[discuss_projects][title]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $discussSection->title }}" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Button Text</label>
                                    <input type="text" name="sections[discuss_projects][button_text]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $discussSection->button_text }}">
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Button Link</label>
                                    <input type="text" name="sections[discuss_projects][button_link]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $discussSection->button_link }}">
                                </div>
                                <div class="flex items-center mt-6">
                                    <input type="hidden" name="sections[discuss_projects][is_active]" value="0">
                                    <input type="checkbox" name="sections[discuss_projects][is_active]" value="1" class="rounded" {{ $discussSection->is_active ? 'checked' : '' }}>
                                    <label class="ml-2 text-sm font-medium text-gray-700">Active</label>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                <textarea name="sections[discuss_projects][description]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" rows="3">{{ $discussSection->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="px-6 py-4 bg-gray-50 border-t">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md font-medium transition-colors">
                            <i class="fas fa-save mr-2"></i> Update CTA Sections
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
</body>
</html>