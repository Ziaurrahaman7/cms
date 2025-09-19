@extends('dashboard')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="p-6 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Site Settings</h2>
                <p class="text-gray-600 mt-1">Manage your website configuration and content</p>
            </div>
            <form action="{{ route('admin.site-settings.seed') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition-colors">
                    {{ $settings->isEmpty() ? 'Create Default Settings' : 'Update Settings' }}
                </button>
            </form>
        </div>
    </div>
    
    @if($settings->isNotEmpty())
    <div class="p-6">
        <form action="{{ route('admin.site-settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- General Settings -->
            @if(isset($settings['general']))
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">General Settings</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($settings['general'] as $setting)
                        <div class="{{ $setting->type === 'textarea' ? 'md:col-span-2' : '' }}">
                            <label for="{{ $setting->key }}" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ ucwords(str_replace('_', ' ', str_replace('site_', '', $setting->key))) }}
                            </label>
                            
                            @if($setting->type === 'image')
                                @if($setting->value && file_exists(public_path('storage/' . $setting->value)))
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $setting->value) }}" alt="Current" class="h-16 object-contain border rounded">
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
            <div class="mb-8">
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
            <div class="mb-8">
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
            <div class="mb-8">
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
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">Hero Section</h3>
                <div class="space-y-4">
                    @foreach($settings['hero'] as $setting)
                        <div>
                            <label for="{{ $setting->key }}" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ ucwords(str_replace('_', ' ', str_replace('hero_', '', $setting->key))) }}
                            </label>
                            @if($setting->type === 'image')
                                @if($setting->value && file_exists(public_path('storage/' . $setting->value)))
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $setting->value) }}" alt="Current" class="h-32 object-contain border rounded">
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
            <div class="mb-8">
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
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">About Page Settings</h3>
                <div class="space-y-4">
                    @foreach($settings['about'] as $setting)
                        <div>
                            <label for="{{ $setting->key }}" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ ucwords(str_replace('_', ' ', str_replace('about_', '', $setting->key))) }}
                            </label>
                            @if($setting->type === 'image')
                                @if($setting->value && file_exists(public_path('storage/' . $setting->value)))
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $setting->value) }}" alt="Current" class="h-32 object-contain border rounded">
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
            
            <!-- Email Settings -->
            @if(isset($settings['email']))
            <div class="mb-8">
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
            <div class="flex justify-end pt-6 border-t border-gray-200">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition-colors">
                    Update Settings
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
@endsection