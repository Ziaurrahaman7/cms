<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - TechnoIT</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1f2937',
                        secondary: '#3b82f6'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-primary text-white shadow-lg flex flex-col h-screen">
            <div class="p-6 border-b border-gray-700 flex-shrink-0">
                <h2 class="text-2xl font-bold text-center">TechnoIT</h2>
                <p class="text-gray-300 text-sm text-center mt-1">Admin Panel</p>
            </div>
            
            <nav class="mt-6 flex-1 overflow-y-auto">
                <div class="px-4 py-2">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Main</p>
                </div>
                
                <a href="{{ route('dashboard') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('dashboard') ? 'bg-secondary text-white border-r-4 border-blue-400' : 'text-gray-300 hover:bg-gray-700 hover:text-white transition-colors' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2v0a2 2 0 002-2h14a2 2 0 012 2v0"></path>
                    </svg>
                    Dashboard
                </a>
                

                
                <a href="{{ route('admin.posts.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('admin.posts.*') ? 'bg-secondary text-white border-r-4 border-blue-400' : 'text-gray-300 hover:bg-gray-700 hover:text-white transition-colors' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                    Posts
                    <span class="ml-auto bg-blue-500 text-xs px-2 py-1 rounded-full">{{ \App\Models\Post::count() }}</span>
                </a>
                
                <a href="{{ route('admin.teams.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('admin.teams.*') ? 'bg-secondary text-white border-r-4 border-blue-400' : 'text-gray-300 hover:bg-gray-700 hover:text-white transition-colors' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    Team
                    <span class="ml-auto bg-green-500 text-xs px-2 py-1 rounded-full">{{ \App\Models\Team::count() }}</span>
                </a>
                
                <a href="{{ route('admin.achievements.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('admin.achievements.*') ? 'bg-secondary text-white border-r-4 border-blue-400' : 'text-gray-300 hover:bg-gray-700 hover:text-white transition-colors' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                    Achievements
                    <span class="ml-auto bg-yellow-500 text-xs px-2 py-1 rounded-full">{{ \App\Models\Achievement::count() }}</span>
                </a>
                
                <a href="{{ route('admin.faqs.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('admin.faqs.*') ? 'bg-secondary text-white border-r-4 border-blue-400' : 'text-gray-300 hover:bg-gray-700 hover:text-white transition-colors' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    FAQs
                    <span class="ml-auto bg-purple-500 text-xs px-2 py-1 rounded-full">{{ \App\Models\Faq::count() }}</span>
                </a>
                
                <a href="{{ route('admin.testimonials.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('admin.testimonials.*') ? 'bg-secondary text-white border-r-4 border-blue-400' : 'text-gray-300 hover:bg-gray-700 hover:text-white transition-colors' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                    </svg>
                    Testimonials
                    <span class="ml-auto bg-pink-500 text-xs px-2 py-1 rounded-full">{{ \App\Models\Testimonial::count() }}</span>
                </a>
                
                <a href="{{ route('admin.portfolios.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('admin.portfolios.*') ? 'bg-secondary text-white border-r-4 border-blue-400' : 'text-gray-300 hover:bg-gray-700 hover:text-white transition-colors' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    Portfolio
                    <span class="ml-auto bg-indigo-500 text-xs px-2 py-1 rounded-full">{{ \App\Models\Portfolio::count() }}</span>
                </a>
                
                <a href="{{ route('admin.portfolio-categories.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('admin.portfolio-categories.*') ? 'bg-secondary text-white border-r-4 border-blue-400' : 'text-gray-300 hover:bg-gray-700 hover:text-white transition-colors' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a1.994 1.994 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    Portfolio Categories
                    <span class="ml-auto bg-cyan-500 text-xs px-2 py-1 rounded-full">{{ \App\Models\PortfolioCategory::count() }}</span>
                </a>
                
                <a href="{{ route('admin.pricing-plans.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('admin.pricing-plans.*') ? 'bg-secondary text-white border-r-4 border-blue-400' : 'text-gray-300 hover:bg-gray-700 hover:text-white transition-colors' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Pricing Plans
                    <span class="ml-auto bg-yellow-500 text-xs px-2 py-1 rounded-full">{{ \App\Models\PricingPlan::count() }}</span>
                </a>
                
                <a href="{{ route('admin.services.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('admin.services.*') ? 'bg-secondary text-white border-r-4 border-blue-400' : 'text-gray-300 hover:bg-gray-700 hover:text-white transition-colors' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                    </svg>
                    Services
                    <span class="ml-auto bg-orange-500 text-xs px-2 py-1 rounded-full">{{ \App\Models\Service::count() }}</span>
                </a>
                
                <a href="{{ route('admin.products.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('admin.products.*') ? 'bg-secondary text-white border-r-4 border-blue-400' : 'text-gray-300 hover:bg-gray-700 hover:text-white transition-colors' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    Products
                    <span class="ml-auto bg-blue-500 text-xs px-2 py-1 rounded-full">{{ \App\Models\Product::count() }}</span>
                </a>
                
                <a href="{{ route('admin.industries.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('admin.industries.*') ? 'bg-secondary text-white border-r-4 border-blue-400' : 'text-gray-300 hover:bg-gray-700 hover:text-white transition-colors' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    Industries
                    <span class="ml-auto bg-green-500 text-xs px-2 py-1 rounded-full">{{ \App\Models\Industry::count() }}</span>
                </a>
                
                <a href="{{ route('admin.clients.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('admin.clients.*') ? 'bg-secondary text-white border-r-4 border-blue-400' : 'text-gray-300 hover:bg-gray-700 hover:text-white transition-colors' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    Clients
                    <span class="ml-auto bg-purple-500 text-xs px-2 py-1 rounded-full">{{ \App\Models\Client::count() }}</span>
                </a>
                
                <a href="{{ route('admin.partners.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('admin.partners.*') ? 'bg-secondary text-white border-r-4 border-blue-400' : 'text-gray-300 hover:bg-gray-700 hover:text-white transition-colors' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    Partners
                    <span class="ml-auto bg-indigo-500 text-xs px-2 py-1 rounded-full">{{ \App\Models\Partner::count() }}</span>
                </a>
                
                <a href="{{ route('admin.features.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('admin.features.*') ? 'bg-secondary text-white border-r-4 border-blue-400' : 'text-gray-300 hover:bg-gray-700 hover:text-white transition-colors' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                    Features
                    <span class="ml-auto bg-teal-500 text-xs px-2 py-1 rounded-full">{{ \App\Models\Feature::count() }}</span>
                </a>
                
                <a href="{{ route('admin.contacts.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('admin.contacts.*') ? 'bg-secondary text-white border-r-4 border-blue-400' : 'text-gray-300 hover:bg-gray-700 hover:text-white transition-colors' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Contact Forms
                    <span class="ml-auto bg-red-500 text-xs px-2 py-1 rounded-full">{{ \App\Models\ContactForm::where('status', 'new')->count() }}</span>
                </a>
                
                <a href="{{ route('admin.site-settings.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('admin.site-settings.*') ? 'bg-secondary text-white border-r-4 border-blue-400' : 'text-gray-300 hover:bg-gray-700 hover:text-white transition-colors' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Site Settings
                </a>
                
                <div class="px-4 py-2 mt-6">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Settings</p>
                </div>
                

                
                <a href="{{ route('home') }}" target="_blank" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                    View Website
                </a>
            </nav>
            

        </div>
        
        <!-- Main Content -->
        <div class="flex-1 overflow-hidden">
            <!-- Top Header -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="flex items-center justify-between px-6 py-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
                        <p class="text-gray-600">Welcome back, {{ Auth::user()->name }}!</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-right">
                            <p class="text-sm text-gray-500">{{ now()->format('l, F j, Y') }}</p>
                            <p class="text-xs text-gray-400">{{ now()->format('g:i A') }}</p>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-lg text-sm transition-colors">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>
            
            <!-- Dashboard Content -->
            <main class="p-6 overflow-y-auto" style="height: calc(100vh - 80px);">
                @yield('content')
                @if(!View::hasSection('content'))
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-center">
                            <div class="p-3 bg-blue-100 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Posts</p>
                                <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Post::count() }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-center">
                            <div class="p-3 bg-green-100 rounded-lg">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Content Sections</p>
                                <p class="text-2xl font-bold text-gray-900">{{ \App\Models\WebsiteContent::distinct('section')->count() ?: '4' }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-center">
                            <div class="p-3 bg-purple-100 rounded-lg">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Content Items</p>
                                <p class="text-2xl font-bold text-gray-900">{{ \App\Models\WebsiteContent::count() ?: '12' }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-center">
                            <div class="p-3 bg-yellow-100 rounded-lg">
                                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Team Members</p>
                                <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Team::count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Actions -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h3>
                        <div class="space-y-3">

                            
                            <a href="{{ route('admin.posts.create') }}" class="flex items-center p-3 bg-green-50 hover:bg-green-100 rounded-lg transition-colors">
                                <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span class="text-green-700 font-medium">Add New Post</span>
                            </a>
                            
                            <a href="{{ route('admin.teams.create') }}" class="flex items-center p-3 bg-orange-50 hover:bg-orange-100 rounded-lg transition-colors">
                                <svg class="w-5 h-5 text-orange-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                </svg>
                                <span class="text-orange-700 font-medium">Add Team Member</span>
                            </a>
                            
                            <a href="{{ route('admin.faqs.create') }}" class="flex items-center p-3 bg-purple-50 hover:bg-purple-100 rounded-lg transition-colors">
                                <svg class="w-5 h-5 text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span class="text-purple-700 font-medium">Add FAQ</span>
                            </a>
                            
                            <a href="{{ route('admin.testimonials.create') }}" class="flex items-center p-3 bg-pink-50 hover:bg-pink-100 rounded-lg transition-colors">
                                <svg class="w-5 h-5 text-pink-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span class="text-pink-700 font-medium">Add Testimonial</span>
                            </a>
                            
                            <a href="{{ route('admin.portfolios.create') }}" class="flex items-center p-3 bg-indigo-50 hover:bg-indigo-100 rounded-lg transition-colors">
                                <svg class="w-5 h-5 text-indigo-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span class="text-indigo-700 font-medium">Add Portfolio</span>
                            </a>
                            
                            <a href="{{ route('admin.portfolio-categories.create') }}" class="flex items-center p-3 bg-cyan-50 hover:bg-cyan-100 rounded-lg transition-colors">
                                <svg class="w-5 h-5 text-cyan-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a1.994 1.994 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                <span class="text-cyan-700 font-medium">Add Portfolio Category</span>
                            </a>
                            
                            <a href="{{ route('admin.pricing-plans.create') }}" class="flex items-center p-3 bg-yellow-50 hover:bg-yellow-100 rounded-lg transition-colors">
                                <svg class="w-5 h-5 text-yellow-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-yellow-700 font-medium">Add Pricing Plan</span>
                            </a>
                            
                            <a href="/" target="_blank" class="flex items-center p-3 bg-purple-50 hover:bg-purple-100 rounded-lg transition-colors">
                                <svg class="w-5 h-5 text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                                <span class="text-purple-700 font-medium">View Website</span>
                            </a>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Recent Posts</h3>
                        <div class="space-y-3">
                            @forelse(\App\Models\Post::latest()->take(3)->get() as $post)
                            <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                <div class="w-2 h-2 bg-blue-500 rounded-full mr-3"></div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-800">{{ Str::limit($post->title, 30) }}</p>
                                    <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                                </div>
                                <span class="px-2 py-1 text-xs bg-{{ $post->status == 'published' ? 'green' : 'yellow' }}-100 text-{{ $post->status == 'published' ? 'green' : 'yellow' }}-800 rounded-full">
                                    {{ ucfirst($post->status) }}
                                </span>
                            </div>
                            @empty
                            <div class="text-center py-8">
                                <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                                <p class="text-gray-500">No posts yet</p>
                                <a href="{{ route('admin.posts.create') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Create your first post</a>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                
                <!-- System Info -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">System Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-600">Laravel Version</p>
                            <p class="text-lg font-semibold text-gray-800">{{ app()->version() }}</p>
                        </div>
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-600">PHP Version</p>
                            <p class="text-lg font-semibold text-gray-800">{{ PHP_VERSION }}</p>
                        </div>
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-600">Environment</p>
                            <p class="text-lg font-semibold text-gray-800">{{ app()->environment() }}</p>
                        </div>
                    </div>
                </div>
                @endif
            </main>
        </div>
    </div>
</body>
</html>