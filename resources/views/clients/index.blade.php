@extends('layouts.app')

@section('title', 'Our Clients - ' . App\Models\SiteSetting::get('site_name', 'Technoit'))
@section('description', 'Meet our valued clients from government, private sector, international organizations, and various industries.')

@section('content')
<!-- Clients Hero Banner -->
<section id="clients-hero" class="hero sticked-header-offset" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 60vh; position: relative; overflow: hidden;">
  <div id="particles-js"></div>
  <div class="container position-relative">
    <div class="row gy-5 align-items-center justify-content-center text-center" style="min-height: 60vh;">
      <div class="col-lg-8">
        <h1 class="text-white mb-4" data-aos="fade-up" style="font-size: 3.5rem; font-weight: 700; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">Our Clients</h1>
        <p class="text-white-50 mb-4 fs-5" data-aos="fade-up" data-aos-delay="200">We're proud to serve a diverse range of clients across government, private sector, international organizations, and various industries.</p>
        <div class="d-flex justify-content-center gap-3" data-aos="fade-up" data-aos-delay="400">
          <a href="#government" class="btn btn-light btn-lg px-4 py-3 rounded-pill">
            <i class="bi bi-building me-2"></i>Government
          </a>
          <a href="#private" class="btn btn-outline-light btn-lg px-4 py-3 rounded-pill">
            <i class="bi bi-briefcase me-2"></i>Private Sector
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

<!-- Government Clients Section -->
<section id="government" class="clients section py-5">
  <div class="container" data-aos="zoom-out">
    <div class="section-header text-center mb-5">
      <h2>Government Clients</h2>
      <p>Trusted by government agencies and public sector organizations</p>
    </div>
    <div class="clients-slider swiper">
      <div class="swiper-wrapper align-items-center">
        <div class="swiper-slide">
          <a href="#" class="client-link" title="Ministry of ICT">
            <img src="{{ asset('assets/images/clients/client-1.png') }}" class="img-fluid client-logo" alt="Ministry of ICT" style="max-height: 80px; filter: grayscale(100%); transition: all 0.3s ease;">
          </a>
        </div>
        <div class="swiper-slide">
          <a href="#" class="client-link" title="Department of Health">
            <img src="{{ asset('assets/images/clients/client-2.png') }}" class="img-fluid client-logo" alt="Department of Health" style="max-height: 80px; filter: grayscale(100%); transition: all 0.3s ease;">
          </a>
        </div>
        <div class="swiper-slide">
          <a href="#" class="client-link" title="Education Ministry">
            <img src="{{ asset('assets/images/clients/client-3.png') }}" class="img-fluid client-logo" alt="Education Ministry" style="max-height: 80px; filter: grayscale(100%); transition: all 0.3s ease;">
          </a>
        </div>
        <div class="swiper-slide">
          <a href="#" class="client-link" title="Local Government">
            <img src="{{ asset('assets/images/clients/client-4.png') }}" class="img-fluid client-logo" alt="Local Government" style="max-height: 80px; filter: grayscale(100%); transition: all 0.3s ease;">
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Private Sector Clients Section -->
<section id="private" class="clients section py-5" style="background: #f8f9fa;">
  <div class="container" data-aos="zoom-out">
    <div class="section-header text-center mb-5">
      <h2>Private Sector Clients</h2>
      <p>Partnering with leading private companies and enterprises</p>
    </div>
    <div class="clients-slider swiper">
      <div class="swiper-wrapper align-items-center">
        <div class="swiper-slide">
          <a href="#" class="client-link" title="Financial Services">
            <img src="{{ asset('assets/images/clients/client-5.png') }}" class="img-fluid client-logo" alt="Financial Services" style="max-height: 80px; filter: grayscale(100%); transition: all 0.3s ease;">
          </a>
        </div>
        <div class="swiper-slide">
          <a href="#" class="client-link" title="E-commerce">
            <img src="{{ asset('assets/images/clients/client-6.png') }}" class="img-fluid client-logo" alt="E-commerce" style="max-height: 80px; filter: grayscale(100%); transition: all 0.3s ease;">
          </a>
        </div>
        <div class="swiper-slide">
          <a href="#" class="client-link" title="Healthcare">
            <img src="{{ asset('assets/images/clients/client-1.png') }}" class="img-fluid client-logo" alt="Healthcare" style="max-height: 80px; filter: grayscale(100%); transition: all 0.3s ease;">
          </a>
        </div>
        <div class="swiper-slide">
          <a href="#" class="client-link" title="Manufacturing">
            <img src="{{ asset('assets/images/clients/client-2.png') }}" class="img-fluid client-logo" alt="Manufacturing" style="max-height: 80px; filter: grayscale(100%); transition: all 0.3s ease;">
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- International Clients Section -->
<section id="international" class="clients section py-5">
  <div class="container" data-aos="zoom-out">
    <div class="section-header text-center mb-5">
      <h2>International Clients</h2>
      <p>Serving global organizations and international partnerships</p>
    </div>
    <div class="clients-slider swiper">
      <div class="swiper-wrapper align-items-center">
        <div class="swiper-slide">
          <a href="#" class="client-link" title="UN Organizations">
            <img src="{{ asset('assets/images/clients/client-3.png') }}" class="img-fluid client-logo" alt="UN Organizations" style="max-height: 80px; filter: grayscale(100%); transition: all 0.3s ease;">
          </a>
        </div>
        <div class="swiper-slide">
          <a href="#" class="client-link" title="Multinational Corps">
            <img src="{{ asset('assets/images/clients/client-4.png') }}" class="img-fluid client-logo" alt="Multinational Corps" style="max-height: 80px; filter: grayscale(100%); transition: all 0.3s ease;">
          </a>
        </div>
        <div class="swiper-slide">
          <a href="#" class="client-link" title="NGOs">
            <img src="{{ asset('assets/images/clients/client-5.png') }}" class="img-fluid client-logo" alt="NGOs" style="max-height: 80px; filter: grayscale(100%); transition: all 0.3s ease;">
          </a>
        </div>
        <div class="swiper-slide">
          <a href="#" class="client-link" title="Development Agencies">
            <img src="{{ asset('assets/images/clients/client-6.png') }}" class="img-fluid client-logo" alt="Development Agencies" style="max-height: 80px; filter: grayscale(100%); transition: all 0.3s ease;">
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Industries Section -->
<section id="industries" class="clients section py-5" style="background: #f8f9fa;">
  <div class="container" data-aos="zoom-out">
    <div class="section-header text-center mb-5">
      <h2>Industries We Serve</h2>
      <p>Expertise across diverse industry verticals</p>
    </div>
    <div class="clients-slider swiper">
      <div class="swiper-wrapper align-items-center">
        <div class="swiper-slide">
          <div class="client-placeholder d-flex align-items-center justify-content-center" style="height: 80px; background: #fff; border-radius: 8px; border: 1px solid #eee;">
            <span class="fw-bold text-muted">Banking</span>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="client-placeholder d-flex align-items-center justify-content-center" style="height: 80px; background: #fff; border-radius: 8px; border: 1px solid #eee;">
            <span class="fw-bold text-muted">Healthcare</span>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="client-placeholder d-flex align-items-center justify-content-center" style="height: 80px; background: #fff; border-radius: 8px; border: 1px solid #eee;">
            <span class="fw-bold text-muted">Education</span>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="client-placeholder d-flex align-items-center justify-content-center" style="height: 80px; background: #fff; border-radius: 8px; border: 1px solid #eee;">
            <span class="fw-bold text-muted">Retail</span>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="client-placeholder d-flex align-items-center justify-content-center" style="height: 80px; background: #fff; border-radius: 8px; border: 1px solid #eee;">
            <span class="fw-bold text-muted">Manufacturing</span>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="client-placeholder d-flex align-items-center justify-content-center" style="height: 80px; background: #fff; border-radius: 8px; border: 1px solid #eee;">
            <span class="fw-bold text-muted">Logistics</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Call to Action Section -->
<section class="py-5" style="background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);">
  <div class="container text-center">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <h2 class="text-white mb-4">Ready to Join Our Client Family?</h2>
        <p class="text-white-50 mb-4 fs-5">Let's discuss how we can help your organization achieve its digital transformation goals.</p>
        <div class="d-flex justify-content-center gap-3">
          <a href="{{ route('contact.index') }}" class="btn btn-light btn-lg px-4 py-3 rounded-pill">
            <i class="bi bi-chat-dots me-2"></i>Start Partnership
          </a>
          <a href="{{ route('case-study.index') }}" class="btn btn-outline-light btn-lg px-4 py-3 rounded-pill">
            <i class="bi bi-eye me-2"></i>View Case Studies
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

.client-logo:hover {
  filter: grayscale(0%) !important;
  transform: scale(1.05);
}
.client-link {
  display: block;
  text-decoration: none;
}
</style>
@endsection