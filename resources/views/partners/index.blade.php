@extends('layouts.app')

@section('title', 'Partners - ' . App\Models\SiteSetting::get('site_name', 'Technoit'))
@section('description', 'Join our partner network and grow your business with us')

@section('content')
<!-- Partners Hero Section -->
<section class="hero sticked-header-offset py-5" style="min-height: 70vh; background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%), url('{{ asset('assets/images/hero-bg.jpg') }}') center/cover; position: relative;">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center" style="min-height: 70vh;">
      <div class="col-lg-8">
        <div class="hero-content">
          <h1 class="mb-4 text-white" data-aos="fade-up" style="font-size: 3.5rem; font-weight: 700; line-height: 1.2;">Partner With Us</h1>
          <p class="mb-5 fs-5 lead text-white-50" data-aos="fade-up" data-aos-delay="200">Join our growing network of partners and unlock new opportunities for growth, innovation, and success together.</p>
          <div class="gap-3 d-flex justify-content-center flex-wrap" data-aos="fade-up" data-aos-delay="400">
            <a href="#contact" class="px-5 py-3 btn btn-warning btn-lg rounded-pill fw-bold">
              <i class="bi bi-people me-2"></i>Hire Team
            </a>
            <a href="#partnership" class="px-5 py-3 btn btn-outline-light btn-lg rounded-pill fw-bold">
              <i class="bi bi-handshake me-2"></i>Join as Partner
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Background Elements -->
  <div class="position-absolute" style="top: -100px; right: -100px; width: 300px; height: 300px; background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%); border-radius: 50%;"></div>
  <div class="position-absolute" style="bottom: -80px; left: -80px; width: 200px; height: 200px; background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%); border-radius: 50%;"></div>
</section>
@endsection