@extends('layouts.app')

@section('title', $partner->name . ' - Partners')
@section('description', $partner->description)

@section('content')
<!-- Partner Hero Section -->
<section class="sticked-header-offset position-relative" style="min-height: 70vh; background:#1e3c72;  padding-top: 130px;">
  <div class="container position-relative" style="z-index: 2;">
    <div class="row align-items-center" style="min-height: 70vh;">
      <div class="col-lg-6">
        <div class="hero-content">
          <h1 class="mb-4 text-white" data-aos="fade-up">{{ $partner->name }}</h1>
          <p class="mb-5 fs-5 lead text-white-50" data-aos="fade-up" data-aos-delay="200">{{ $partner->description }}</p>
          @if($partner->website)
            <div class="flex-wrap gap-3 d-flex" data-aos="fade-up" data-aos-delay="400">
              <a href="{{ $partner->website }}" target="_blank" class="px-5 py-3 btn btn-warning btn-lg rounded-pill fw-bold">
                <i class="bi bi-globe me-2"></i>Visit Website
              </a>
            </div>
          @endif
        </div>
      </div>
      @if($partner->logo)
      <div class="col-lg-6 d-flex align-items-center justify-content-center" data-aos="fade-left" data-aos-delay="300">
        <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="img-fluid" style="min-height: 400px; min-width: 100%;">
      </div>
      @endif
    </div>
  </div>
</section>

<!-- Partner Sections -->
@if($partner->sections && count($partner->sections) > 0)
  @foreach($partner->sections as $index => $section)
  <section class="py-5 {{ $index % 2 == 0 ? '' : 'bg-light' }}">
    <div class="container">
      <div class="row align-items-center {{ $index % 2 == 0 ? '' : 'flex-row-reverse' }}">
        <div class="mb-4 col-lg-6 mb-lg-0">
          @if(isset($section['image']) && $section['image'])
            <img src="{{ asset('storage/' . $section['image']) }}" alt="{{ $section['title'] }}" class="rounded shadow img-fluid w-100" style="height: 400px; object-fit: cover;">
          @else
            <div class="rounded bg-primary d-flex align-items-center justify-content-center" style="height: 400px;">
              <i class="text-white bi bi-image" style="font-size: 4rem;"></i>
            </div>
          @endif
        </div>
        <div class="col-lg-6">
          <div class="{{ $index % 2 == 0 ? 'ps-lg-4' : 'pe-lg-4' }}">
            <h2 class="mb-4">{{ $section['title'] }}</h2>
            <div class="text-muted">{!! $section['description'] !!}</div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endforeach
@endif

<!-- CTA Section -->
<section class="py-5" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <h2 class="mb-3 text-white">Ready to Partner With Us?</h2>
        <p class="mb-0 text-white-50 fs-5">Let's discuss partnership opportunities and create something amazing together.</p>
      </div>
      <div class="col-lg-4 text-lg-end">
        <div class="gap-3 d-flex justify-content-lg-end justify-content-center">
          <a href="#contact" class="px-4 py-3 btn btn-warning btn-lg rounded-pill fw-bold">
            <i class="bi bi-handshake me-2"></i>Contact Us
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Contact Form Section -->
<section id="contact" class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="mb-5 text-center">
          <h2 class="mb-3">Get In Touch</h2>
          <p class="text-muted">Ready to start a partnership? Send us a message and we'll get back to you soon.</p>
        </div>
        
        <div class="p-4 bg-white rounded shadow">
          <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <div class="row g-3">
              <div class="col-md-6">
                <label for="name" class="form-label">Name *</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label">Email *</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone">
              </div>
              <div class="col-md-6">
                <label for="subject" class="form-label">Subject *</label>
                <input type="text" class="form-control" id="subject" name="subject" value="Partnership Inquiry - {{ $partner->name }}" required>
              </div>
              <div class="col-12">
                <label for="message" class="form-label">Message *</label>
                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Tell us about your partnership interest..." required></textarea>
              </div>
              <div class="text-center col-12">
                <button type="submit" class="px-5 btn btn-primary btn-lg">
                  <i class="bi bi-send me-2"></i>Send Message
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection