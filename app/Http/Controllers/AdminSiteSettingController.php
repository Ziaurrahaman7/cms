<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSiteSettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->groupBy('group');
        return view('admin.site-settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'settings' => 'required|array',
        ]);
        
        // Debug: Check what's being sent
        \Log::info('Settings update request:', $request->all());

        foreach ($request->settings as $key => $value) {
            $setting = SiteSetting::where('key', $key)->first();
            
            if ($setting) {
                // Handle file uploads
                if ($setting->type === 'image' && $request->hasFile("files.{$key}")) {
                    // Delete old file
                    if ($setting->value && Storage::disk('public')->exists($setting->value)) {
                        Storage::disk('public')->delete($setting->value);
                    }
                    
                    // Upload new file
                    $file = $request->file("files.{$key}");
                    $path = $file->store('settings', 'public');
                    $value = $path;
                } elseif ($setting->type === 'image' && $request->hasFile('files') && isset($request->file('files')[$key])) {
                    // Handle array notation files[key]
                    // Delete old file
                    if ($setting->value && Storage::disk('public')->exists($setting->value)) {
                        Storage::disk('public')->delete($setting->value);
                    }
                    
                    // Upload new file
                    $file = $request->file('files')[$key];
                    $path = $file->store('settings', 'public');
                    $value = $path;
                }
                
                $setting->update(['value' => $value]);
                
                // Clear cache for this setting
                \Illuminate\Support\Facades\Cache::forget("setting_{$key}");
                
                \Log::info("Updated setting: {$key} = {$value}");
            } else {
                \Log::warning("Setting not found: {$key}");
            }
        }
        
        // Clear all settings cache
        \Illuminate\Support\Facades\Cache::flush();
        
        \Log::info('Settings updated successfully');

        return redirect()->route('admin.site-settings.index')->with('success', 'Settings updated successfully!');
    }

    public function seed()
    {
        $defaultSettings = [
            // General Settings
            ['key' => 'site_name', 'value' => 'Technoit', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_tagline', 'value' => 'IT Solutions & Business Services', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_logo', 'value' => '', 'type' => 'image', 'group' => 'general'],
            ['key' => 'site_favicon', 'value' => '', 'type' => 'image', 'group' => 'general'],
            
            // SEO Settings
            ['key' => 'meta_title', 'value' => 'Technoit - IT Solutions & Business Services', 'type' => 'text', 'group' => 'seo'],
            ['key' => 'meta_description', 'value' => 'Professional IT Solutions and Business Services for your company', 'type' => 'textarea', 'group' => 'seo'],
            ['key' => 'meta_keywords', 'value' => 'IT solutions, web development, business services', 'type' => 'text', 'group' => 'seo'],
            
            // Contact Settings
            ['key' => 'contact_phone', 'value' => '+1 (234) 567-890', 'type' => 'phone', 'group' => 'contact'],
            ['key' => 'contact_email', 'value' => 'info@example.com', 'type' => 'email', 'group' => 'contact'],
            ['key' => 'contact_whatsapp', 'value' => '+1234567890', 'type' => 'phone', 'group' => 'contact'],
            ['key' => 'contact_address', 'value' => '11 West Town, PBo 12345, United States', 'type' => 'textarea', 'group' => 'contact'],
            
            // Social Links
            ['key' => 'social_facebook', 'value' => '', 'type' => 'url', 'group' => 'social'],
            ['key' => 'social_twitter', 'value' => '', 'type' => 'url', 'group' => 'social'],
            ['key' => 'social_linkedin', 'value' => '', 'type' => 'url', 'group' => 'social'],
            ['key' => 'social_instagram', 'value' => '', 'type' => 'url', 'group' => 'social'],
            ['key' => 'social_youtube', 'value' => '', 'type' => 'url', 'group' => 'social'],
            
            // Hero Section
            ['key' => 'hero_title', 'value' => 'Delivering Superior Services IT Solutions', 'type' => 'text', 'group' => 'hero'],
            ['key' => 'hero_subtitle', 'value' => 'You can easily change any design to your own. It is also highly customizable SEO friendly template.', 'type' => 'textarea', 'group' => 'hero'],
            ['key' => 'hero_bg_image', 'value' => '', 'type' => 'image', 'group' => 'hero'],
            ['key' => 'hero_button_text', 'value' => 'Get Quotes', 'type' => 'text', 'group' => 'hero'],
            ['key' => 'hero_button_link', 'value' => '#contact', 'type' => 'text', 'group' => 'hero'],
            
            // Footer Settings
            ['key' => 'footer_copyright', 'value' => '© 2024 Technoit. All rights reserved.', 'type' => 'text', 'group' => 'footer'],
            ['key' => 'footer_description', 'value' => 'Professional IT solutions and business services to help your company grow and succeed in the digital world.', 'type' => 'textarea', 'group' => 'footer'],
            
            // About Page Settings
            ['key' => 'about_who_we_are', 'value' => 'We are a passionate team of technology experts dedicated to delivering innovative IT solutions that drive business growth and success.', 'type' => 'textarea', 'group' => 'about'],
            ['key' => 'about_mission', 'value' => 'To empower businesses with innovative technology solutions that drive growth, efficiency, and success in the digital age. We strive to be the trusted partner for all your IT needs.', 'type' => 'textarea', 'group' => 'about'],
            ['key' => 'about_vision', 'value' => 'To be the leading IT solutions provider globally, recognized for our innovation, quality, and commitment to client success. We envision a future where technology seamlessly enhances every business.', 'type' => 'textarea', 'group' => 'about'],
            ['key' => 'about_image', 'value' => '', 'type' => 'image', 'group' => 'about'],
            
            // Email Settings
            ['key' => 'mail_mailer', 'value' => 'smtp', 'type' => 'text', 'group' => 'email'],
            ['key' => 'mail_host', 'value' => 'smtp.gmail.com', 'type' => 'text', 'group' => 'email'],
            ['key' => 'mail_port', 'value' => '587', 'type' => 'text', 'group' => 'email'],
            ['key' => 'mail_username', 'value' => '', 'type' => 'email', 'group' => 'email'],
            ['key' => 'mail_password', 'value' => '', 'type' => 'text', 'group' => 'email'],
            ['key' => 'mail_encryption', 'value' => 'tls', 'type' => 'text', 'group' => 'email'],
            ['key' => 'mail_from_address', 'value' => '', 'type' => 'email', 'group' => 'email'],
            ['key' => 'mail_from_name', 'value' => 'Technoit', 'type' => 'text', 'group' => 'email'],
        ];

        foreach ($defaultSettings as $setting) {
            SiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
        
        // Clear all cache
        \Illuminate\Support\Facades\Cache::flush();

        return redirect()->route('admin.site-settings.index')->with('success', 'Default settings created successfully!');
    }
}