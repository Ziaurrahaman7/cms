@extends('layouts.app')

@section('title', 'Partners - ' . App\Models\SiteSetting::get('site_name', 'Technoit'))
@section('description', 'Join our partner network and grow your business with us')

@section('content')
<!-- Partners Hero Section -->
<section class="py-5 hero sticked-header-offset position-relative" style="min-height: 50vh; background: url('{{ asset('assets/images/hero-bg.jpg') }}') center/cover;">
  <div class="top-0 position-absolute start-0 w-100 h-100" style="background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);"></div>
  <div class="container position-relative" style="z-index: 2;">
    <div class="text-center row align-items-center justify-content-center" style="min-height: 50vh;">
      <div class="col-lg-8">
        <h1 class="mb-4 text-white" data-aos="fade-up">{{ $heroSection ? $heroSection->title : 'Our Partners' }}</h1>
        <p class="mb-0 fs-5 lead text-white-50" data-aos="fade-up" data-aos-delay="200">{{ $heroSection ? $heroSection->short_description : 'Meet our trusted partners who help us deliver exceptional services and solutions.' }}</p>
      </div>
    </div>
  </div>
</section>

<!-- Partners Details Section -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="mb-3">Our Partners</h2>
      <p class="text-muted">Detailed information about our business partners</p>
    </div>
    <div class="row g-4">
      @forelse($allPartners as $partner)
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
        <div class="border-0 shadow-sm card h-100 hover-lift">
          <div class="card-body d-flex flex-column">
            <span class="mb-3 badge bg-primary align-self-start">{{ ucwords(str_replace('-', ' ', $partner->type)) }}</span>
            <h5 class="mb-2 card-title">{{ $partner->name }}</h5>
            <p class="card-text text-muted flex-grow-1">{{ Str::limit($partner->description, 120) }}</p>
            <div class="mt-auto">
              <a href="{{ route('partners.show', $partner->slug) }}" class="btn btn-sm">Learn More</a>
            </div>
          </div>
        </div>
      </div>
      @empty
      <div class="col-12">
        <div class="py-5 text-center">
          <h3 class="text-muted">No partners found</h3>
          <p class="text-muted">We're working on building partnerships. Check back soon!</p>
        </div>
      </div>
      @endforelse
    </div>
  </div>
</section>

<!-- Partners Worldwide Section -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="mb-3">Partners Worldwide</h2>
      <p class="text-muted">Our global network of trusted partners</p>
    </div>
    <div class="row g-4">
      @forelse($worldwidePartners as $partner)
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
        <div class="border-0 shadow-sm card h-100 hover-lift bg-white">
          @if($partner->logo)
            <div class="card-img-top d-flex align-items-center justify-content-center" style="height: 150px; background: #f8f9fa;">
              <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="img-fluid" style="max-height: 100px; max-width: 80%;">
            </div>
          @endif
          <div class="card-body text-center">
            <h5 class="mb-2 card-title">{{ $partner->name }}</h5>
            <p class="text-muted mb-0">{{ $partner->country }}</p>
          </div>
        </div>
      </div>
      @empty
      <div class="col-12">
        <div class="py-5 text-center">
          <h3 class="text-muted">No worldwide partners found</h3>
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