<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Content - TechnoIT Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white">
            <div class="p-6">
                <h2 class="text-2xl font-bold">TechnoIT Admin</h2>
            </div>
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="block px-6 py-3 hover:bg-gray-700">Dashboard</a>
                <a href="{{ route('admin.cta-sections.index') }}" class="block px-6 py-3 hover:bg-gray-700">CTA Sections</a>
                <a href="{{ route('admin.content') }}" class="block px-6 py-3 bg-gray-700 text-white">Website Content</a>
                <a href="{{ route('posts.index') }}" class="block px-6 py-3 hover:bg-gray-700">Posts</a>
                <form method="POST" action="{{ route('logout') }}" class="block">
                    @csrf
                    <button type="submit" class="w-full text-left px-6 py-3 hover:bg-gray-700">Logout</button>
                </form>
            </nav>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-8">Website Content Management</h1>
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif
            
            <form action="{{ route('admin.content.update') }}" method="POST">
                @csrf
                
                <!-- Hero Section -->
                <div class="bg-white p-6 rounded-lg shadow mb-6">
                    <h3 class="text-xl font-semibold mb-4">Hero Section</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-2">Company Name</label>
                            <input type="text" name="content[hero][company_name]" value="{{ \App\Models\WebsiteContent::getContent('hero', 'company_name', 'TechnoIT') }}" class="w-full px-3 py-2 border rounded-lg">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Tagline</label>
                            <input type="text" name="content[hero][tagline]" value="{{ \App\Models\WebsiteContent::getContent('hero', 'tagline', 'Modern Software Solutions') }}" class="w-full px-3 py-2 border rounded-lg">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium mb-2">Hero Description</label>
                            <textarea name="content[hero][description]" rows="3" class="w-full px-3 py-2 border rounded-lg">{{ \App\Models\WebsiteContent::getContent('hero', 'description', 'We build cutting-edge software that transforms businesses and drives innovation in the digital age.') }}</textarea>
                        </div>
                    </div>
                </div>
                
                <!-- About Section -->
                <div class="bg-white p-6 rounded-lg shadow mb-6">
                    <h3 class="text-xl font-semibold mb-4">About Section</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-2">About Title</label>
                            <input type="text" name="content[about][title]" value="{{ \App\Models\WebsiteContent::getContent('about', 'title', 'About TechnoIT') }}" class="w-full px-3 py-2 border rounded-lg">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Years of Experience</label>
                            <input type="text" name="content[about][experience]" value="{{ \App\Models\WebsiteContent::getContent('about', 'experience', '10+') }}" class="w-full px-3 py-2 border rounded-lg">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium mb-2">About Description</label>
                            <textarea name="content[about][description]" rows="4" class="w-full px-3 py-2 border rounded-lg">{{ \App\Models\WebsiteContent::getContent('about', 'description', 'We are a team of passionate developers and designers committed to delivering exceptional software solutions.') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Projects Completed</label>
                            <input type="text" name="content[about][projects]" value="{{ \App\Models\WebsiteContent::getContent('about', 'projects', '500+') }}" class="w-full px-3 py-2 border rounded-lg">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Happy Clients</label>
                            <input type="text" name="content[about][clients]" value="{{ \App\Models\WebsiteContent::getContent('about', 'clients', '50+') }}" class="w-full px-3 py-2 border rounded-lg">
                        </div>
                    </div>
                </div>
                
                <!-- Services Section -->
                <div class="bg-white p-6 rounded-lg shadow mb-6">
                    <h3 class="text-xl font-semibold mb-4">Services Section</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium mb-2">Services Title</label>
                            <input type="text" name="content[services][title]" value="{{ \App\Models\WebsiteContent::getContent('services', 'title', 'Our Services') }}" class="w-full px-3 py-2 border rounded-lg">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Services Description</label>
                            <textarea name="content[services][description]" rows="2" class="w-full px-3 py-2 border rounded-lg">{{ \App\Models\WebsiteContent::getContent('services', 'description', 'We offer comprehensive software development services to help your business thrive in the digital world.') }}</textarea>
                        </div>
                        
                        <!-- Service 1 -->
                        <div class="border-t pt-4">
                            <h4 class="font-medium mb-2">Service 1</h4>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium mb-2">Service 1 Title</label>
                                    <input type="text" name="content[services][service1_title]" value="{{ \App\Models\WebsiteContent::getContent('services', 'service1_title', 'Web Development') }}" class="w-full px-3 py-2 border rounded-lg">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-2">Service 1 Description</label>
                                    <textarea name="content[services][service1_desc]" rows="2" class="w-full px-3 py-2 border rounded-lg">{{ \App\Models\WebsiteContent::getContent('services', 'service1_desc', 'Custom web applications built with modern technologies and best practices.') }}</textarea>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Service 2 -->
                        <div class="border-t pt-4">
                            <h4 class="font-medium mb-2">Service 2</h4>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium mb-2">Service 2 Title</label>
                                    <input type="text" name="content[services][service2_title]" value="{{ \App\Models\WebsiteContent::getContent('services', 'service2_title', 'Mobile Apps') }}" class="w-full px-3 py-2 border rounded-lg">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-2">Service 2 Description</label>
                                    <textarea name="content[services][service2_desc]" rows="2" class="w-full px-3 py-2 border rounded-lg">{{ \App\Models\WebsiteContent::getContent('services', 'service2_desc', 'Native and cross-platform mobile applications for iOS and Android.') }}</textarea>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Service 3 -->
                        <div class="border-t pt-4">
                            <h4 class="font-medium mb-2">Service 3</h4>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium mb-2">Service 3 Title</label>
                                    <input type="text" name="content[services][service3_title]" value="{{ \App\Models\WebsiteContent::getContent('services', 'service3_title', 'Data Analytics') }}" class="w-full px-3 py-2 border rounded-lg">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-2">Service 3 Description</label>
                                    <textarea name="content[services][service3_desc]" rows="2" class="w-full px-3 py-2 border rounded-lg">{{ \App\Models\WebsiteContent::getContent('services', 'service3_desc', 'Advanced analytics and business intelligence solutions for data-driven decisions.') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Section -->
                <div class="bg-white p-6 rounded-lg shadow mb-6">
                    <h3 class="text-xl font-semibold mb-4">Contact Section</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-2">Contact Title</label>
                            <input type="text" name="content[contact][title]" value="{{ \App\Models\WebsiteContent::getContent('contact', 'title', 'Get In Touch') }}" class="w-full px-3 py-2 border rounded-lg">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Phone</label>
                            <input type="text" name="content[contact][phone]" value="{{ \App\Models\WebsiteContent::getContent('contact', 'phone', '+880 1234 567890') }}" class="w-full px-3 py-2 border rounded-lg">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Email</label>
                            <input type="email" name="content[contact][email]" value="{{ \App\Models\WebsiteContent::getContent('contact', 'email', 'info@technoit.com') }}" class="w-full px-3 py-2 border rounded-lg">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Address</label>
                            <input type="text" name="content[contact][address]" value="{{ \App\Models\WebsiteContent::getContent('contact', 'address', 'Dhaka, Bangladesh') }}" class="w-full px-3 py-2 border rounded-lg">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium mb-2">Contact Description</label>
                            <textarea name="content[contact][description]" rows="2" class="w-full px-3 py-2 border rounded-lg">{{ \App\Models\WebsiteContent::getContent('contact', 'description', 'Ready to start your next project? Contact us today and let\'s discuss how we can help your business grow.') }}</textarea>
                        </div>
                    </div>
                </div>
                
                <div class="text-center">
                    <button type="submit" class="bg-blue-500 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-600">Update Website Content</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>