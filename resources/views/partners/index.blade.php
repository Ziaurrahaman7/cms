@extends('layouts.app')

@section('title', 'Partners - ' . App\Models\SiteSetting::get('site_name', 'Technoit'))
@section('description', 'Join our partner network and grow your business with us')

@section('content')
<!-- Partners Hero Section -->
<section class="hero sticked-header-offset py-5 position-relative" style="min-height: 50vh; background: url('{{ asset('assets/images/hero-bg.jpg') }}') center/cover;">
  <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);"></div>
  <div class="container position-relative" style="z-index: 2;">
    <div class="row align-items-center justify-content-center text-center" style="min-height: 50vh;">
      <div class="col-lg-8">
        <h1 class="mb-4 text-white" data-aos="fade-up">Our Partners</h1>
        <p class="mb-0 fs-5 lead text-white-50" data-aos="fade-up" data-aos-delay="200">Meet our trusted partners who help us deliver exceptional services and solutions.</p>
      </div>
    </div>
  </div>
</section>

<!-- Partners Grid Section -->
<section class="py-5">
  <div class="container">
    <div class="row g-4">
      @forelse($partners as $partner)
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
        <div class="card h-100 shadow-sm border-0 hover-lift">
          @if($partner->logo)
            <div class="card-img-top d-flex align-items-center justify-content-center" style="height: 200px; background: #f8f9fa;">
              <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="img-fluid" style="max-height: 150px; max-width: 80%;">
            </div>
          @endif
          <div class="card-body d-flex flex-column">
            <h5 class="card-title mb-2">{{ $partner->name }}</h5>
            <span class="badge bg-primary mb-3 align-self-start">{{ ucwords(str_replace('-', ' ', $partner->type)) }} Partner</span>
            <p class="card-text text-muted flex-grow-1">{{ Str::limit($partner->description, 120) }}</p>
            <div class="mt-auto">
              <a href="{{ route('partners.show', $partner->slug) }}" class="btn btn-outline-primary btn-sm me-2">Learn More</a>
              @if($partner->website)
                <a href="{{ $partner->website }}" target="_blank" class="btn btn-outline-secondary btn-sm">
                  <i class="bi bi-globe"></i> Website
                </a>
              @endif
            </div>
          </div>
        </div>
      </div>
      @empty
      <div class="col-12">
        <div class="text-center py-5">
          <h3 class="text-muted">No partners found</h3>
          <p class="text-muted">We're working on building partnerships. Check back soon!</p>
        </div>
      </div>
      @endforelse
    </div>
  </div>
</section>

<style>
.hover-lift {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.hover-lift:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
}
</style>
@endsection