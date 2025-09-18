<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'title' => 'Web Applications',
            'slug' => 'web-applications',
            'description' => 'Custom web applications built with modern technologies for your business needs',
            'content' => 'Our web applications are designed to streamline your business processes and enhance user experience.',
            'image' => 'products/web-app.jpg',
            'features' => [
                ['title' => 'Responsive Design', 'icon' => 'bi bi-phone', 'description' => 'Works perfectly on all devices'],
                ['title' => 'Modern UI/UX', 'icon' => 'bi bi-palette', 'description' => 'Beautiful and intuitive user interface'],
                ['title' => 'Secure & Scalable', 'icon' => 'bi bi-shield-check', 'description' => 'Enterprise-grade security and scalability']
            ],
            'specifications' => [
                ['title' => 'Performance', 'icon' => 'bi bi-cpu', 'description' => 'High-performance architecture with optimized code'],
                ['title' => 'Security', 'icon' => 'bi bi-shield-lock', 'description' => 'Advanced security measures and encryption'],
                ['title' => 'Scalability', 'icon' => 'bi bi-arrows-fullscreen', 'description' => 'Easily scalable to handle growing demands']
            ],
            'faqs' => [
                ['question' => 'What technologies do you use?', 'answer' => 'We use modern technologies like Laravel, React, and Vue.js'],
                ['question' => 'How long does development take?', 'answer' => 'Development typically takes 4-8 weeks depending on complexity']
            ],
            'testimonials' => [
                ['name' => 'John Smith', 'company' => 'Tech Corp', 'rating' => 5, 'text' => 'Excellent web application that transformed our business']
            ],
            'sections' => [
                ['name' => 'Section 1', 'title' => 'Advanced Features', 'icon' => 'bi bi-gear', 'description' => 'Cutting-edge features for modern businesses']
            ],
            'why_choose' => [
                ['title' => 'Expert Team', 'icon' => 'bi bi-people', 'description' => 'Experienced developers with proven track record'],
                ['title' => 'Latest Technology', 'icon' => 'bi bi-lightning', 'description' => 'Using cutting-edge frameworks and tools'],
                ['title' => '24/7 Support', 'icon' => 'bi bi-headset', 'description' => 'Round-the-clock technical support'],
                ['title' => 'Fast Delivery', 'icon' => 'bi bi-rocket', 'description' => 'Quick turnaround time without compromising quality']
            ],
            'is_active' => true,
            'sort_order' => 1
        ]);

        Product::create([
            'title' => 'Mobile Apps',
            'slug' => 'mobile-apps',
            'description' => 'Native and cross-platform mobile applications for iOS and Android',
            'content' => 'Professional mobile app development services for both native and cross-platform solutions.',
            'image' => 'products/mobile-app.jpg',
            'features' => [
                ['title' => 'iOS & Android', 'icon' => 'bi bi-phone', 'description' => 'Native apps for both platforms'],
                ['title' => 'Cross-platform', 'icon' => 'bi bi-layers', 'description' => 'Single codebase for multiple platforms'],
                ['title' => 'App Store Ready', 'icon' => 'bi bi-shop', 'description' => 'Ready for app store submission']
            ],
            'specifications' => [
                ['title' => 'Native Performance', 'icon' => 'bi bi-lightning', 'description' => 'Optimized for mobile performance'],
                ['title' => 'Offline Support', 'icon' => 'bi bi-wifi-off', 'description' => 'Works without internet connection'],
                ['title' => 'Push Notifications', 'icon' => 'bi bi-bell', 'description' => 'Real-time notifications']
            ],
            'faqs' => [
                ['question' => 'Do you develop for both iOS and Android?', 'answer' => 'Yes, we develop native apps for both platforms'],
                ['question' => 'What about app store submission?', 'answer' => 'We handle the complete app store submission process']
            ],
            'testimonials' => [
                ['name' => 'Sarah Johnson', 'company' => 'Mobile Tech', 'rating' => 5, 'text' => 'Amazing mobile app that exceeded our expectations']
            ],
            'why_choose' => [
                ['title' => 'Native Performance', 'icon' => 'bi bi-lightning', 'description' => 'Optimized performance for mobile devices'],
                ['title' => 'Cross-Platform', 'icon' => 'bi bi-layers', 'description' => 'Single codebase for multiple platforms'],
                ['title' => 'App Store Ready', 'icon' => 'bi bi-shop', 'description' => 'Ready for immediate app store submission']
            ],
            'is_active' => true,
            'sort_order' => 2
        ]);

        Product::create([
            'title' => 'E-commerce Solutions',
            'slug' => 'e-commerce-solutions',
            'description' => 'Complete e-commerce platforms for online business success',
            'content' => 'Full-featured e-commerce solutions with payment gateways, inventory management, and more.',
            'features' => [
                ['title' => 'Payment Gateway', 'icon' => 'bi bi-credit-card', 'description' => 'Secure payment processing'],
                ['title' => 'Inventory Management', 'icon' => 'bi bi-box', 'description' => 'Complete inventory control'],
                ['title' => 'Multi-vendor Support', 'icon' => 'bi bi-people', 'description' => 'Support for multiple vendors']
            ],
            'specifications' => [
                ['title' => 'SEO Optimized', 'icon' => 'bi bi-search', 'description' => 'Built-in SEO optimization'],
                ['title' => 'Mobile Responsive', 'icon' => 'bi bi-phone', 'description' => 'Perfect on all devices'],
                ['title' => 'Analytics', 'icon' => 'bi bi-graph-up', 'description' => 'Detailed sales analytics']
            ],
            'faqs' => [
                ['question' => 'What payment gateways do you support?', 'answer' => 'We support all major payment gateways including PayPal, Stripe, and local options'],
                ['question' => 'Can you integrate with existing systems?', 'answer' => 'Yes, we can integrate with your existing ERP and CRM systems']
            ],
            'testimonials' => [
                ['name' => 'Michael Brown', 'company' => 'Online Store', 'rating' => 5, 'text' => 'Perfect e-commerce solution that boosted our sales significantly']
            ],
            'why_choose' => [
                ['title' => 'Complete Solution', 'icon' => 'bi bi-check-all', 'description' => 'Everything you need for online business'],
                ['title' => 'Secure Payments', 'icon' => 'bi bi-shield-check', 'description' => 'PCI compliant secure payment processing'],
                ['title' => 'SEO Ready', 'icon' => 'bi bi-search', 'description' => 'Built-in SEO optimization for better rankings']
            ],
            'is_active' => true,
            'sort_order' => 3
        ]);
    }
}
