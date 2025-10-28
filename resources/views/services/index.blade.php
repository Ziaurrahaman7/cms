@extends('layouts.app')

@section('title', 'Our Services - ' . App\Models\SiteSetting::get('site_name', 'Technoit'))
@section('description', 'Explore our comprehensive range of IT services and solutions designed to help your business grow.')

@section('content')
<!-- Services Hero Banner -->
<section id="services-hero" class="hero sticked-header-offset" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 60vh; position: relative; overflow: hidden;">
  <div id="particles-js"></div>
  <div class="container position-relative">
    <div class="text-center row gy-5 align-items-center justify-content-center" style="min-height: 60vh;">
      <div class="col-lg-8">
        <h1 class="mb-4 text-white" data-aos="fade-up" style="font-size: 3.5rem; font-weight: 700; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">Our Services</h1>
        <p class="mb-4 text-white-50 fs-5" data-aos="fade-up" data-aos-delay="200">Comprehensive IT solutions tailored to meet your business needs and drive digital transformation.</p>
        <div class="gap-3 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="400">
          <a href="#services-list" class="px-4 py-3 btn btn-light btn-lg rounded-pill">
            <i class="bi bi-arrow-down me-2"></i>Explore Services
          </a>
          <a href="{{ route('contact.index') }}" class="px-4 py-3 btn btn-outline-light btn-lg rounded-pill">
            <i class="bi bi-chat-dots me-2"></i>Get Quote
          </a>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Animated Background Elements -->
  <div class="position-absolute" style="top: 10%; left: 10%; width: 100px; height: 100px; background: rgba(255,255,255,0.1); border-radius: 50%; animation: float 6s ease-in-out infinite;"></div>
  <div class="position-absolute" style="top: 60%; right: 15%; width: 150px; height: 150px; background: rgba(255,255,255,0.05); border-radius: 50%; animation: float 8s ease-in-out infinite reverse;"></div>
  <div class="position-absolute" style="bottom: 20%; left: 20%; width: 80px; height: 80px; background: rgba(255,255,255,0.08); border-radius: 50%; animation: float 7s ease-in-out infinite;"></div>
</section>

<!-- Service Section from Site Settings -->
@php
  $serviceTitle = App\Models\SiteSetting::get('service_section_title', 'Our Services');
  $serviceDescription = App\Models\SiteSetting::get('service_section_description', 'Comprehensive IT solutions to drive your business forward');
@endphp
@if($serviceTitle || $serviceDescription)
<section class="py-5 bg-light">
  <div class="container">
    <div class="mb-5 text-center ">
      @if($serviceTitle)
        <h2 class="mb-3">{{ $serviceTitle }}</h2>
      @endif
      @if($serviceDescription)
        <div class="card-text">{!! $serviceDescription !!}</div>
      @endif
    </div>
  </div>
</section>
@endif

<!-- Services List Section -->
<section id="services-list" class="py-5">
  <div class="container">
    <div class="mb-5 text-center section-header">
      <h2 class="mb-3">Service we Serve</h2>
      <p class="text-muted">Professional IT solutions designed to accelerate your business growth</p>
    </div>
    
    <div class="row g-4">
      @forelse($services as $service)
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index + 1) * 100 }}">
        <div class="overflow-hidden bg-white shadow-lg service-card rounded-4" style="transition: all 0.3s ease; border: none; height: 500px; display: flex; flex-direction: column;">
          <div class="service-image position-relative" style="height: 250px; overflow: hidden; flex-shrink: 0;">
            @if($service->image && file_exists(public_path('storage/services/' . $service->image)))
              <img src="{{ asset('storage/services/' . $service->image) }}" class="w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="{{ $service->title }}">
            @else
              <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background: linear-gradient(45deg, #f093fb 0%, #f5576c 100%);">
                @if($service->icon)
                  <i class="{{ $service->icon }} text-white" style="font-size: 3rem;"></i>
                @else
                  <svg class="text-white" width="60" height="60" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                  </svg>
                @endif
              </div>
            @endif
            <div class="top-0 service-overlay position-absolute start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(0,0,0,0.7); opacity: 0; transition: all 0.3s ease;">
              <span class="text-white fw-bold">Learn More</span>
            </div>
          </div>
          
          <div class="p-4 d-flex flex-column" style="flex: 1;">
            <h4 class="mb-3 fw-bold" style="color: #2c3e50; height: 60px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $service->title }}</h4>
            <p class="mb-4 text-muted" style="flex: 1; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{ $service->description }}</p>
            <div class="d-flex align-items-center justify-content-between" style="margin-top: auto;">
              <a href="{{ route('services.show', $service->slug) }}" class="px-4 py-2 btn btn-primary btn-sm rounded-pill" style="background: linear-gradient(45deg, #667eea, #764ba2); border: none;">
                Learn More
              </a>
              <div class="text-muted fw-bold" style="font-size: 2rem; opacity: 0.1;">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
            </div>
          </div>
        </div>
      </div>
      @empty
      <div class="text-center col-12">
        <p class="text-muted">No services available at the moment.</p>
      </div>
      @endforelse
    </div>
  </div>
</section>

<!-- Call to Action Section -->
<section class="py-5" style="background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);">
  <div class="container text-center">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <h2 class="mb-4 text-white">Need a Custom Solution?</h2>
        <p class="mb-4 text-white-50 fs-5">Can't find exactly what you're looking for? Let's discuss your specific requirements and create a tailored solution.</p>
        <div class="gap-3 d-flex justify-content-center">
          <a href="{{ route('contact.index') }}" class="px-4 py-3 btn btn-light btn-lg rounded-pill">
            <i class="bi bi-chat-dots me-2"></i>Discuss Your Needs
          </a>
          <a href="{{ route('about.index') }}" class="px-4 py-3 btn btn-outline-light btn-lg rounded-pill">
            <i class="bi bi-people me-2"></i>Meet Our Team
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-20px); }
}

.service-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
}

.service-card:hover .service-image img {
  transform: scale(1.1);
}

.service-card:hover .service-overlay {
  opacity: 1;
}
</style>
@endsection