<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - TechnoIT</title>
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
                <a href="{{ route('admin.dashboard') }}" class="block px-6 py-3 bg-gray-700 text-white">Dashboard</a>
                <a href="{{ route('admin.content') }}" class="block px-6 py-3 hover:bg-gray-700">Website Content</a>
                <a href="{{ route('posts.index') }}" class="block px-6 py-3 hover:bg-gray-700">Posts</a>
                <form method="POST" action="{{ route('logout') }}" class="block">
                    @csrf
                    <button type="submit" class="w-full text-left px-6 py-3 hover:bg-gray-700">Logout</button>
                </form>
            </nav>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-8">Dashboard</h1>
            
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Total Posts</h3>
                    <p class="text-3xl font-bold text-blue-600">{{ \App\Models\Post::count() }}</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Website Sections</h3>
                    <p class="text-3xl font-bold text-green-600">{{ \App\Models\WebsiteContent::distinct('section')->count() }}</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Content Items</h3>
                    <p class="text-3xl font-bold text-purple-600">{{ \App\Models\WebsiteContent::count() }}</p>
                </div>
            </div>
            
            <div class="mt-8 bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-4">Quick Actions</h3>
                <div class="space-x-4">
                    <a href="{{ route('admin.content') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit Website Content</a>
                    <a href="{{ route('posts.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Add New Post</a>
                    <a href="/" target="_blank" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">View Website</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>