@extends('layouts.app')

@section('title', 'Case Study - ' . App\Models\SiteSetting::get('site_name', 'Technoit'))
@section('description', 'Explore our successful case studies and project portfolios showcasing our expertise.')

@section('content')
<!-- Case Study Hero Banner -->
<section id="case-study-hero" class="hero sticked-header-offset" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 60vh; position: relative; overflow: hidden;">
  <div id="particles-js"></div>
  <div class="container position-relative">
    <div class="text-center row gy-5 align-items-center justify-content-center" style="min-height: 60vh;">
      <div class="col-lg-8">
        <h1 class="mb-4 text-white" data-aos="fade-up" style="font-size: 3.5rem; font-weight: 700; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">Case Studies</h1>
        <p class="mb-4 text-white-50 fs-5" data-aos="fade-up" data-aos-delay="200">Discover how we've helped businesses achieve their goals through innovative solutions and strategic implementations.</p>
        <div class="gap-3 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="400">
          <a href="#case-studies" class="px-4 py-3 btn btn-light btn-lg rounded-pill">
            <i class="bi bi-arrow-down me-2"></i>View Projects
          </a>
          <a href="{{ route('contact.index') }}" class="px-4 py-3 btn btn-outline-light btn-lg rounded-pill">
            <i class="bi bi-chat-dots me-2"></i>Discuss Your Project
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

<!-- Case Studies Section -->
<section id="case-studies" class="py-5 portfolio">
  <div class="container" data-aos="fade-up">
    <div class="mb-5 text-center section-header">
      <h2 class="mb-3">Our Success Stories</h2>
      <p class="text-muted">Real projects, real results - see how we've transformed businesses</p>
    </div>
    
    <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">    
      <div class="row g-4">
        @forelse($caseStudies as $caseStudy)
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
          <div class="border-0 shadow-sm card h-100 portfolio-card">
            <div class="overflow-hidden card-img-top position-relative" style="height: 250px;">
              @if($caseStudy->featured_image)
                <img src="{{ asset('storage/' . $caseStudy->featured_image) }}" class="w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="{{ $caseStudy->title }}">
              @else
                <img src="{{ asset('assets/images/portfolio/product-' . (($loop->index % 6) + 1) . '.jpg') }}" class="w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="{{ $caseStudy->title }}">
              @endif
              {{-- <div class="top-0 position-absolute start-0 w-100 h-100 d-flex align-items-center justify-content-center portfolio-overlay" style="background: rgba(0,0,0,0.7); opacity: 0; transition: all 0.3s ease;">
                @if($caseStudy->project_url)
                  <a href="{{ $caseStudy->project_url }}" target="_blank" class="btn btn-light btn-sm me-2">
                    <i class="bi bi-link-45deg me-1"></i>Live Project
                  </a>
                @endif
                <a href="{{ route('case-study.show', $caseStudy->slug) }}" class="btn btn-warning btn-sm">
                  <i class="bi bi-eye me-1"></i>Case Study
                </a>
              </div> --}}
            </div>
            <div class="card-body d-flex flex-column">
              <div class="mb-2 d-flex justify-content-between align-items-start">
                <span class="badge bg-primary">{{ ucfirst($caseStudy->category) }}</span>
                @if($caseStudy->client)
                  <small class="text-muted">{{ $caseStudy->client }}</small>
                @endif
              </div>
              <h5 class="mb-2 card-title">{{ $caseStudy->title }}</h5>
              <p class="card-text text-muted flex-grow-1">{{ Str::limit(strip_tags($caseStudy->description), 120) }}</p>
              <div class="mt-auto d-flex justify-content-between align-items-center">
                @if($caseStudy->project_date)
                  <small class="text-muted">{{ $caseStudy->project_date->format('M Y') }}</small>
                @endif
                <a href="{{ route('case-study.show', $caseStudy->slug) }}" class="btn btn-sm">View Case Study</a>
              </div>
            </div>
          </div>
        </div>
        @empty
        <div class="py-5 text-center col-12">
          <h3 class="text-muted">No case studies available</h3>
          <p class="text-muted">We're working on showcasing our projects. Check back soon!</p>
        </div>
        @endforelse
      </div>
    </div>
  </div>
</section>

<!-- Call to Action Section -->
<section class="py-5" style="background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);">
  <div class="container text-center">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <h2 class="mb-4 text-white">Ready to Start Your Success Story?</h2>
        <p class="mb-4 text-white-50 fs-5">Let's discuss how we can help transform your business with our proven expertise and innovative solutions.</p>
        <div class="gap-3 d-flex justify-content-center">
          <a href="#contact" class="px-4 py-3 btn btn-light btn-lg rounded-pill">
            <i class="bi bi-chat-dots me-2"></i>Start a Conversation
          </a>
          <a href="{{ route('home') }}#services" class="px-4 py-3 btn btn-outline-light btn-lg rounded-pill">
            <i class="bi bi-gear me-2"></i>View Our Services
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

.portfolio-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
}

.portfolio-card:hover img {
  transform: scale(1.1);
}

.portfolio-card:hover .portfolio-overlay {
  opacity: 1 !important;
}
</style>
@endsection