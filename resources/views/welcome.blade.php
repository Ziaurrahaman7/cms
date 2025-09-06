<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel + Tailwind</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <header class="bg-white shadow-md">
        <nav class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="text-xl font-bold text-gray-800">CMS</div>
                <div class="space-x-6">
                    <a href="#" class="text-gray-600 hover:text-blue-600">Home</a>
                    <a href="#" class="text-gray-600 hover:text-blue-600">About</a>
                    <a href="#" class="text-gray-600 hover:text-blue-600">Services</a>
                    <a href="#" class="text-gray-600 hover:text-blue-600">Contact</a>
                </div>
            </div>
        </nav>
    </header>
    
    <main class="flex items-center justify-center py-20">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Laravel + Tailwind CSS</h1>
            <p class="text-gray-600 mb-6">Tailwind CSS is working!</p>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Click me
            </button>
        </div>
    </main>
</body>
</html>