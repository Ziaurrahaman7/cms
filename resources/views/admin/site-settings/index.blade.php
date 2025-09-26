@extends('dashboard')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="p-6 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Site Settings</h2>
                <p class="text-gray-600 mt-1">Manage your website configuration and content</p>
            </div>
            @if($settings->isEmpty())
            <form action="{{ route('admin.site-settings.seed') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition-colors">
                    Create Default Settings
                </button>
            </form>
            @else
            <button onclick="document.getElementById('settings-form').scrollIntoView({behavior: 'smooth'})" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors">
                Go to Settings Form
            </button>
            @endif
        </div>
    </div>
    
    @if($settings->isNotEmpty())
    <div class="p-6">
        <!-- Tab Navigation -->
        <div class="mb-6">
            <nav class="flex space-x-8 border-b border-gray-200" aria-label="Tabs">
                @if(isset($settings['general']))
                <button type="button" class="tab-button active py-2 px-1 border-b-2 border-blue-500 font-medium text-sm text-blue-600" data-tab="general">
                    General
                </button>
                @endif
                @if(isset($settings['seo']))
                <button type="button" class="tab-button py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="seo">
                    SEO
                </button>
                @endif
                @if(isset($settings['contact']))
                <button type="button" class="tab-button py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="contact">
                    Contact
                </button>
                @endif
                @if(isset($settings['social']))
                <button type="button" class="tab-button py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="social">
                    Social
                </button>
                @endif
                @if(isset($settings['hero']))
                <button type="button" class="tab-button py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="hero">
                    Hero
                </button>
                @endif
                @if(isset($settings['footer']))
                <button type="button" class="tab-button py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="footer">
                    Footer
                </button>
                @endif
                @if(isset($settings['about']))
                <button type="button" class="tab-button py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="about">
                    About
                </button>
                @endif
                @if(isset($settings['stats']))
                <button type="button" class="tab-button py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="stats">
                    Stats
                </button>
                @endif
                @if(isset($settings['service']))
                <button type="button" class="tab-button py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="service">
                    Service
                </button>
                @endif
                @if(isset($settings['theme']))
                <button type="button" class="tab-button py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="theme">
                    Theme
                </button>
                @endif
                @if(isset($settings['email']))
                <button type="button" class="tab-button py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="email">
                    Email
                </button>
                @endif
                <button type="button" class="tab-button py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="scripts">
                    Custom Script
                </button>
            </nav>
        </div>
        
        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif
        
        @if($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form id="settings-form" action="{{ route('admin.site-settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Tab Contents -->
            
            <!-- General Settings -->
            @if(isset($settings['general']))
            <div class="tab-content active" id="general-tab">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">General Settings</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($settings['general'] as $setting)
                        <div class="{{ $setting->type === 'textarea' ? 'md:col-span-2' : '' }}">
                            <label for="{{ $setting->key }}" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ ucwords(str_replace('_', ' ', str_replace('site_', '', $setting->key))) }}
                            </label>
                            
                            @if($setting->type === 'image')
                                @if($setting->value)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $setting->value) }}" alt="Current" class="h-16 object-contain border rounded" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                                        <div class="text-sm text-gray-500 p-2 bg-gray-100 rounded" style="display:none;">Current: {{ $setting->value }}</div>
                                    </div>
                                @endif
                                <input type="file" name="files[{{ $setting->key }}]" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <input type="hidden" name="settings[{{ $setting->key }}]" value="{{ $setting->value }}">
                            @elseif($setting->type === 'textarea')
                                <textarea name="settings[{{ $setting->key }}]" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 resize-vertical">{{ $setting->value }}</textarea>
                            @else
                                <input type="{{ $setting->type === 'url' ? 'url' : ($setting->type === 'email' ? 'email' : ($setting->type === 'phone' ? 'tel' : 'text')) }}" name="settings[{{ $setting->key }}]" value="{{ $setting->value }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
            
            <!-- SEO Settings -->
            @if(isset($settings['seo']))
            <div class="tab-content" id="seo-tab">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">SEO Settings</h3>
                <div class="space-y-4">
                    @foreach($settings['seo'] as $setting)
                        <div>
                            <label for="{{ $setting->key }}" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ ucwords(str_replace('_', ' ', str_replace('meta_', '', $setting->key))) }}
                            </label>
                            @if($setting->type === 'textarea')
                                <textarea name="settings[{{ $setting->key }}]" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $setting->value }}</textarea>
                            @else
                                <input type="text" name="settings[{{ $setting->key }}]" value="{{ $setting->value }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
            
            <!-- Contact Settings -->
            @if(isset($settings['contact']))
            <div class="tab-content" id="contact-tab">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">Contact Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    @foreach($settings['contact'] as $setting)
                        <div class="{{ $setting->type === 'textarea' ? 'md:col-span-2' : '' }}">
                            <label for="{{ $setting->key }}" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ ucwords(str_replace('_', ' ', str_replace('contact_', '', $setting->key))) }}
                            </label>
                            @if($setting->type === 'textarea')
                                <textarea name="settings[{{ $setting->key }}]" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $setting->value }}</textarea>
                            @else
                                <input type="{{ $setting->type === 'email' ? 'email' : ($setting->type === 'phone' ? 'tel' : 'text') }}" name="settings[{{ $setting->key }}]" value="{{ $setting->value }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @endif
                        </div>
                    @endforeach
                </div>
                
                <!-- Multiple Office Addresses Section -->
                <div class="border-t border-gray-200 pt-6">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="text-md font-semibold text-gray-900">Office Addresses</h4>
                        <button type="button" onclick="addOfficeAddress()" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-sm transition-colors">
                            <i class="fas fa-plus mr-1"></i>Add Office
                        </button>
                    </div>
                    
                    <div id="office-addresses-container">
                        @php
                            $officeAddresses = json_decode(App\Models\SiteSetting::get('office_addresses', '[]'), true);
                            if (empty($officeAddresses)) {
                                $officeAddresses = [['name' => '', 'address' => '', 'phone' => '', 'email' => '']];
                            }
                        @endphp
                        
                        @foreach($officeAddresses as $index => $office)
                        <div class="office-address-item border border-gray-200 rounded-lg p-4 mb-4" data-index="{{ $index }}">
                            <div class="flex justify-between items-center mb-3">
                                <h5 class="font-medium text-gray-700">Office {{ $index + 1 }}</h5>
                                @if($index > 0)
                                <button type="button" onclick="removeOfficeAddress({{ $index }})" class="text-red-600 hover:text-red-800 text-sm">
                                    <i class="fas fa-trash mr-1"></i>Remove
                                </button>
                                @endif
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Office Name</label>
                                    <input type="text" name="office_addresses[{{ $index }}][name]" value="{{ $office['name'] ?? '' }}" placeholder="Head Office" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                                    <input type="tel" name="office_addresses[{{ $index }}][phone]" value="{{ $office['phone'] ?? '' }}" placeholder="+1 (234) 567-890" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                    <input type="email" name="office_addresses[{{ $index }}][email]" value="{{ $office['email'] ?? '' }}" placeholder="office@example.com" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                                    <textarea name="office_addresses[{{ $index }}][address]" rows="2" placeholder="123 Main St, City, Country" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $office['address'] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            
            <!-- Social Links -->
            @if(isset($settings['social']))
            <div class="tab-content" id="social-tab">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">Social Media Links</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($settings['social'] as $setting)
                        <div>
                            <label for="{{ $setting->key }}" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ ucwords(str_replace('_', ' ', str_replace('social_', '', $setting->key))) }}
                            </label>
                            <input type="url" name="settings[{{ $setting->key }}]" value="{{ $setting->value }}" placeholder="https://{{ str_replace('social_', '', $setting->key) }}.com/username" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
            
            <!-- Hero Section -->
            @if(isset($settings['hero']))
            <div class="tab-content" id="hero-tab">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">Hero Section</h3>
                <div class="space-y-4">
                    @foreach($settings['hero'] as $setting)
                        <div>
                            <label for="{{ $setting->key }}" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ ucwords(str_replace('_', ' ', str_replace('hero_', '', $setting->key))) }}
                            </label>
                            @if($setting->type === 'image')
                                @if($setting->value)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $setting->value) }}" alt="Current" class="h-32 object-contain border rounded" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                                        <div class="text-sm text-gray-500 p-2 bg-gray-100 rounded" style="display:none;">Current: {{ $setting->value }}</div>
                                    </div>
                                @endif
                                <input type="file" name="files[{{ $setting->key }}]" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <input type="hidden" name="settings[{{ $setting->key }}]" value="{{ $setting->value }}">
                            @elseif($setting->type === 'textarea')
                                <textarea name="settings[{{ $setting->key }}]" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $setting->value }}</textarea>
                            @else
                                <input type="text" name="settings[{{ $setting->key }}]" value="{{ $setting->value }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
            
            <!-- Footer Settings -->
            @if(isset($settings['footer']))
            <div class="tab-content" id="footer-tab">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">Footer Settings</h3>
                <div class="space-y-4">
                    @foreach($settings['footer'] as $setting)
                        <div>
                            <label for="{{ $setting->key }}" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ ucwords(str_replace('_', ' ', str_replace('footer_', '', $setting->key))) }}
                            </label>
                            @if($setting->type === 'textarea')
                                <textarea name="settings[{{ $setting->key }}]" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $setting->value }}</textarea>
                            @else
                                <input type="text" name="settings[{{ $setting->key }}]" value="{{ $setting->value }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
            
            <!-- About Page Settings -->
            @if(isset($settings['about']))
            <div class="tab-content" id="about-tab">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">About Page Settings</h3>
                <div class="space-y-4">
                    @foreach($settings['about'] as $setting)
                        <div>
                            <label for="{{ $setting->key }}" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ ucwords(str_replace('_', ' ', str_replace('about_', '', $setting->key))) }}
                            </label>
                            @if($setting->type === 'image')
                                @if($setting->value)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $setting->value) }}" alt="Current" class="h-32 object-contain border rounded" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                                        <div class="text-sm text-gray-500 p-2 bg-gray-100 rounded" style="display:none;">Current: {{ $setting->value }}</div>
                                    </div>
                                @endif
                                <input type="file" name="files[{{ $setting->key }}]" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <input type="hidden" name="settings[{{ $setting->key }}]" value="{{ $setting->value }}">
                            @else
                                <textarea name="settings[{{ $setting->key }}]" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $setting->value }}</textarea>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
            
            <!-- Stats Settings -->
            @if(isset($settings['stats']))
            <div class="tab-content" id="stats-tab">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">About Page Stats</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($settings['stats'] as $setting)
                        <div>
                            <label for="{{ $setting->key }}" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ ucwords(str_replace('_', ' ', str_replace('stats_', '', $setting->key))) }}
                            </label>
                            <input type="text" name="settings[{{ $setting->key }}]" value="{{ $setting->value }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
            
            <!-- Service Section Settings -->
            @if(isset($settings['service']))
            <div class="tab-content" id="service-tab">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">Service Section Settings</h3>
                <div class="space-y-4">
                    @foreach($settings['service'] as $setting)
                        <div>
                            <label for="{{ $setting->key }}" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ ucwords(str_replace('_', ' ', str_replace('service_section_', '', $setting->key))) }}
                            </label>
                            @if($setting->type === 'summernote')
                                <textarea name="settings[{{ $setting->key }}]" id="{{ $setting->key }}" class="summernote w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $setting->value }}</textarea>
                            @else
                                <input type="text" name="settings[{{ $setting->key }}]" value="{{ $setting->value }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
            
            <!-- Theme Settings -->
            @if(isset($settings['theme']))
            <div class="tab-content" id="theme-tab">
                <div class="flex justify-between items-center mb-4 pb-2 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Theme Colors</h3>
                    <button type="button" onclick="resetThemeColors()" class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded text-sm transition-colors">
                        <i class="fas fa-undo mr-1"></i>Reset to Default
                    </button>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($settings['theme'] as $setting)
                        <div>
                            <label for="{{ $setting->key }}" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ ucwords(str_replace('_', ' ', str_replace('theme_', '', $setting->key))) }}
                            </label>
                            <div class="flex items-center space-x-3">
                                <input type="color" id="color_{{ $setting->key }}" value="{{ $setting->value }}" class="w-16 h-10 border border-gray-300 rounded cursor-pointer" onchange="updateTextInput('{{ $setting->key }}', this.value)">
                                <input type="text" name="settings[{{ $setting->key }}]" id="text_{{ $setting->key }}" value="{{ $setting->value }}" class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" pattern="^#[0-9A-Fa-f]{6}$" onchange="updateColorPicker('{{ $setting->key }}', this.value)">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
            
            <!-- Email Settings -->
            @if(isset($settings['email']))
            <div class="tab-content" id="email-tab">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">Email Configuration</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($settings['email'] as $setting)
                        <div class="{{ in_array($setting->key, ['mail_from_address', 'mail_from_name']) ? 'md:col-span-2' : '' }}">
                            <label for="{{ $setting->key }}" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ ucwords(str_replace('_', ' ', str_replace('mail_', '', $setting->key))) }}
                            </label>
                            @if($setting->key === 'mail_password')
                                <input type="password" name="settings[{{ $setting->key }}]" value="{{ $setting->value }}" placeholder="Enter email password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @elseif($setting->key === 'mail_mailer')
                                <select name="settings[{{ $setting->key }}]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="smtp" {{ $setting->value === 'smtp' ? 'selected' : '' }}>SMTP</option>
                                    <option value="log" {{ $setting->value === 'log' ? 'selected' : '' }}>Log (Testing)</option>
                                    <option value="sendmail" {{ $setting->value === 'sendmail' ? 'selected' : '' }}>Sendmail</option>
                                </select>
                            @elseif($setting->key === 'mail_encryption')
                                <select name="settings[{{ $setting->key }}]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="tls" {{ $setting->value === 'tls' ? 'selected' : '' }}>TLS</option>
                                    <option value="ssl" {{ $setting->value === 'ssl' ? 'selected' : '' }}>SSL</option>
                                    <option value="" {{ $setting->value === '' ? 'selected' : '' }}>None</option>
                                </select>
                            @else
                                <input type="{{ $setting->type === 'email' ? 'email' : 'text' }}" name="settings[{{ $setting->key }}]" value="{{ $setting->value }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @endif
                            @if($setting->key === 'mail_username')
                                <p class="mt-1 text-sm text-gray-500">Your email address for SMTP authentication</p>
                            @elseif($setting->key === 'mail_password')
                                <p class="mt-1 text-sm text-gray-500">App password for Gmail or email password</p>
                            @elseif($setting->key === 'mail_from_address')
                                <p class="mt-1 text-sm text-gray-500">Email address that appears as sender</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
            
            <!-- Custom Script Settings -->
            <div class="tab-content" id="scripts-tab">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">Custom Scripts</h3>
                <div class="space-y-4">
                    @php
                        $headerScript = App\Models\SiteSetting::where('key', 'custom_header_script')->first();
                        $bodyScript = App\Models\SiteSetting::where('key', 'custom_body_script')->first();
                    @endphp
                    
                    <div>
                        <label for="custom_header_script" class="block text-sm font-medium text-gray-700 mb-2">
                            Header Script
                        </label>
                        <textarea name="settings[custom_header_script]" rows="8" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 font-mono text-sm resize-vertical" placeholder="Enter your JavaScript code here..." style="width: 100% !important; min-height: 200px;">{{ $headerScript ? $headerScript->value : '' }}</textarea>
                        <p class="mt-1 text-sm text-gray-500">This script will be added to the &lt;head&gt; section of all pages</p>
                    </div>
                    
                    <div>
                        <label for="custom_body_script" class="block text-sm font-medium text-gray-700 mb-2">
                            Body Script
                        </label>
                        <textarea name="settings[custom_body_script]" rows="8" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 font-mono text-sm resize-vertical" placeholder="Enter your JavaScript code here..." style="width: 100% !important; min-height: 200px;">{{ $bodyScript ? $bodyScript->value : '' }}</textarea>
                        <p class="mt-1 text-sm text-gray-500">This script will be added before the closing &lt;/body&gt; tag of all pages</p>
                    </div>
                </div>
            </div>
            
            <!-- Submit Button -->
            <div class="flex justify-end pt-6 border-t border-gray-200 mt-6">
                <button type="button" id="update-btn" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition-colors" onclick="validateAndSubmit()">
                    <span id="btn-text">Update Settings</span>
                    <span id="btn-loader" class="hidden">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Updating...
                    </span>
                </button>
            </div>
        </form>
    </div>
    @else
    <div class="p-12 text-center">
        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
        </svg>
        <h3 class="text-lg font-medium text-gray-900 mb-2">No settings found</h3>
        <p class="text-gray-500 mb-4">Create default settings to get started.</p>
    </div>
    @endif
</div>

<!-- Summernote CSS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

<style>
.tab-content {
    display: none;
    visibility: hidden;
    height: 0;
    overflow: hidden;
}

.tab-content.active {
    display: block;
    visibility: visible;
    height: auto;
    overflow: visible;
}

.tab-button.active {
    border-color: #3b82f6 !important;
    color: #2563eb !important;
}

/* Force all form fields to be included in form submission */
form input[type="hidden"],
form input[name^="settings"],
form input[name^="files"],
form textarea[name^="settings"],
form select[name^="settings"] {
    position: relative !important;
    left: auto !important;
    top: auto !important;
    width: auto !important;
    height: auto !important;
    opacity: 1 !important;
    visibility: visible !important;
}

/* Loader styles */
.hidden {
    display: none;
}

.animate-spin {
    animation: spin 1s linear infinite;
}

@keyframes spin {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

.opacity-75 {
    opacity: 0.75;
}

.cursor-not-allowed {
    cursor: not-allowed;
}

/* Enhanced form styling */
.form-control, input[type="text"], input[type="email"], input[type="url"], input[type="tel"], input[type="password"], input[type="file"], textarea, select {
    transition: all 0.3s ease !important;
    border: 2px solid #e5e7eb !important;
}

.form-control:focus, input:focus, textarea:focus, select:focus {
    border-color: #3b82f6 !important;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1) !important;
    outline: none !important;
}

/* File input styling */
input[type="file"] {
    padding: 8px !important;
    background: #f9fafb !important;
}

/* Select dropdown styling */
select {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e") !important;
    background-position: right 8px center !important;
    background-repeat: no-repeat !important;
    background-size: 16px 12px !important;
    padding-right: 40px !important;
}

/* Textarea resize */
textarea {
    resize: vertical !important;
    min-height: 80px !important;
}

/* Color input */
input[type="color"] {
    height: 40px !important;
    border-radius: 6px !important;
    cursor: pointer !important;
}

/* Force full width for all form elements */
.tab-content input, .tab-content textarea, .tab-content select {
    width: 100% !important;
    display: block !important;
    box-sizing: border-box !important;
}

/* Specific fixes for different input types */
.tab-content input[type="file"] {
    padding: 8px 12px !important;
    background: #f8f9fa !important;
    border: 2px dashed #dee2e6 !important;
}

.tab-content textarea {
    min-height: 100px !important;
    font-family: 'Courier New', monospace !important;
}

.tab-content select {
    appearance: none !important;
    -webkit-appearance: none !important;
    -moz-appearance: none !important;
}

/* Ultra strong CSS to force full width */
form input, form textarea, form select {
    width: 100% !important;
    max-width: 100% !important;
    min-width: 100% !important;
    display: block !important;
    box-sizing: border-box !important;
}

/* Override any conflicting styles */
* {
    box-sizing: border-box !important;
}

/* Specific targeting for site settings form */
#settings-form input[type="text"],
#settings-form input[type="email"],
#settings-form input[type="url"],
#settings-form input[type="tel"],
#settings-form input[type="password"],
#settings-form input[type="file"],
#settings-form textarea,
#settings-form select {
    width: 100% !important;
    display: block !important;
    box-sizing: border-box !important;
    margin: 0 !important;
    padding: 8px 12px !important;
    border: 1px solid #d1d5db !important;
    border-radius: 6px !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');
    
    // Check if theme was reset and activate theme tab
    @if(session('reset_theme'))
    const themeTab = document.querySelector('[data-tab="theme"]');
    if (themeTab) {
        themeTab.click();
    }
    @endif
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetTab = this.getAttribute('data-tab');
            
            // Remove active class from all buttons
            tabButtons.forEach(btn => {
                btn.classList.remove('active');
                btn.classList.remove('border-blue-500', 'text-blue-600');
                btn.classList.add('border-transparent', 'text-gray-500');
            });
            
            // Add active class to clicked button
            this.classList.add('active');
            this.classList.remove('border-transparent', 'text-gray-500');
            this.classList.add('border-blue-500', 'text-blue-600');
            
            // Hide all tab contents
            tabContents.forEach(content => {
                content.classList.remove('active');
            });
            
            // Show target tab content
            const targetContent = document.getElementById(targetTab + '-tab');
            if (targetContent) {
                targetContent.classList.add('active');
            }
        });
    });
});

function validateAndSubmit() {
    // Show loader
    const updateBtn = document.getElementById('update-btn');
    const btnText = document.getElementById('btn-text');
    const btnLoader = document.getElementById('btn-loader');
    
    updateBtn.disabled = true;
    updateBtn.classList.add('opacity-75', 'cursor-not-allowed');
    btnText.classList.add('hidden');
    btnLoader.classList.remove('hidden');
    
    // Temporarily show all tab contents to ensure all form fields are submitted
    const tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach(content => {
        content.style.display = 'block';
        content.style.visibility = 'visible';
        content.style.height = 'auto';
        content.style.overflow = 'visible';
        content.style.position = 'static';
    });
    
    // Submit the form
    setTimeout(() => {
        document.getElementById('settings-form').submit();
    }, 100);
    
    return false; // Prevent default form submission
}

function updateTextInput(key, value) {
    document.getElementById('text_' + key).value = value;
}

function updateColorPicker(key, value) {
    if (value.match(/^#[0-9A-Fa-f]{6}$/)) {
        document.getElementById('color_' + key).value = value;
    }
}

function resetThemeColors() {
    const defaultColors = {
        'theme_primary_color': '#667eea',
        'theme_secondary_color': '#764ba2',
        'theme_accent_color': '#ffc107',
        'theme_success_color': '#28a745',
        'theme_info_color': '#17a2b8',
        'theme_warning_color': '#ffc107',
        'theme_danger_color': '#dc3545'
    };
    
    // Update color pickers and text inputs
    Object.keys(defaultColors).forEach(key => {
        const colorPicker = document.getElementById('color_' + key);
        const textInput = document.getElementById('text_' + key);
        
        if (colorPicker && textInput) {
            colorPicker.value = defaultColors[key];
            textInput.value = defaultColors[key];
        }
    });
    
    // Submit the form to save changes
    validateAndSubmit();
}

// Office Address Functions
function addOfficeAddress() {
    const container = document.getElementById('office-addresses-container');
    const items = container.querySelectorAll('.office-address-item');
    const newIndex = items.length;
    
    const newOfficeHtml = `
        <div class="office-address-item border border-gray-200 rounded-lg p-4 mb-4" data-index="${newIndex}">
            <div class="flex justify-between items-center mb-3">
                <h5 class="font-medium text-gray-700">Office ${newIndex + 1}</h5>
                <button type="button" onclick="removeOfficeAddress(${newIndex})" class="text-red-600 hover:text-red-800 text-sm">
                    <i class="fas fa-trash mr-1"></i>Remove
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Office Name</label>
                    <input type="text" name="office_addresses[${newIndex}][name]" value="" placeholder="Branch Office" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                    <input type="tel" name="office_addresses[${newIndex}][phone]" value="" placeholder="+1 (234) 567-890" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="office_addresses[${newIndex}][email]" value="" placeholder="office@example.com" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                    <textarea name="office_addresses[${newIndex}][address]" rows="2" placeholder="123 Main St, City, Country" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', newOfficeHtml);
}

function removeOfficeAddress(index) {
    const item = document.querySelector(`[data-index="${index}"]`);
    if (item) {
        item.remove();
        // Reindex remaining items
        reindexOfficeAddresses();
    }
}

function reindexOfficeAddresses() {
    const items = document.querySelectorAll('.office-address-item');
    items.forEach((item, index) => {
        item.setAttribute('data-index', index);
        item.querySelector('h5').textContent = `Office ${index + 1}`;
        
        // Update input names
        const inputs = item.querySelectorAll('input, textarea');
        inputs.forEach(input => {
            const name = input.getAttribute('name');
            if (name && name.includes('office_addresses[')) {
                const newName = name.replace(/office_addresses\[\d+\]/, `office_addresses[${index}]`);
                input.setAttribute('name', newName);
            }
        });
        
        // Update remove button onclick
        const removeBtn = item.querySelector('button[onclick*="removeOfficeAddress"]');
        if (removeBtn && index > 0) {
            removeBtn.setAttribute('onclick', `removeOfficeAddress(${index})`);
        }
    });
}
</script>

<!-- Summernote JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
$(document).ready(function() {
    $('.summernote').summernote({
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['forecolor', 'backcolor']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video', 'hr']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        callbacks: {
            onImageUpload: function(files) {
                uploadImage(files[0], this);
            }
        }
    });
});

function uploadImage(file, editor) {
    let data = new FormData();
    data.append('image', file);
    data.append('_token', '{{ csrf_token() }}');
    
    $.ajax({
        url: '{{ route("admin.upload-image") }}',
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: 'POST',
        success: function(response) {
            if(response.success) {
                $(editor).summernote('insertImage', response.url);
            } else {
                alert('Image upload failed: ' + response.message);
            }
        },
        error: function(xhr) {
            alert('Image upload failed. Please try again.');
        }
    });
}
</script>
@endsection