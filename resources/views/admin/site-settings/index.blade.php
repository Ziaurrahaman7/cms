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
                                <input type="file" name="files[{{ $setting->key }}]" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <input type="hidden" name="settings[{{ $setting->key }}]" value="{{ $setting->value }}">
                            @elseif($setting->type === 'textarea')
                                <textarea name="settings[{{ $setting->key }}]" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $setting->value }}</textarea>
                            @else
                                <input type="{{ $setting->type === 'url' ? 'url' : ($setting->type === 'email' ? 'email' : 'text') }}" name="settings[{{ $setting->key }}]" value="{{ $setting->value }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
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
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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