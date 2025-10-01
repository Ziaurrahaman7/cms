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
        <h1 class="mb-4 text-white" data-aos="fade-up">Our Partners</h1>
        <p class="mb-0 fs-5 lead text-white-50" data-aos="fade-up" data-aos-delay="200">Meet our trusted partners who help us deliver exceptional services and solutions.</p>
      </div>
    </div>
  </div>
</section>

<!-- Partners Tabs Section -->
<section class="py-5">
  <div class="container">
    <!-- Tab Navigation -->
    <div class="mb-5 row justify-content-center">
      <div class="col-lg-10">
        <ul class="nav nav-pills justify-content-center" id="partnerTabs" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="all-tab" data-bs-toggle="pill" data-bs-target="#all" type="button" role="tab">All</button>
          </li>
          @foreach($partnerTypes as $type)
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="{{ $type->slug }}-tab" data-bs-toggle="pill" data-bs-target="#{{ $type->slug }}" type="button" role="tab">{{ $type->name }}</button>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
    
    <!-- Tab Content -->
    <div class="tab-content" id="partnerTabsContent">
      <!-- All Partners Tab -->
      <div class="tab-pane fade show active" id="all" role="tabpanel">
        <div class="row g-4">
          @forelse($allPartners as $partner)
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
            <div class="border-0 shadow-sm card h-100 hover-lift">
              @if($partner->logo)
                <div class="card-img-top d-flex align-items-center justify-content-center" style="height: 200px; background: #f8f9fa;">
                  <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="img-fluid" style="max-height: 150px; max-width: 80%;">
                </div>
              @endif
              <div class="card-body d-flex flex-column">
                <h5 class="mb-2 card-title">{{ $partner->name }}</h5>
                <span class="mb-3 badge bg-primary align-self-start">{{ ucwords(str_replace('-', ' ', $partner->type)) }} Partner</span>
                <p class="card-text text-muted flex-grow-1">{{ Str::limit($partner->description, 120) }}</p>
                <div class="mt-auto">
                  <a href="{{ route('partners.show', $partner->slug) }}" class="btn btn-sm me-2">Learn More</a>
                  {{-- @if($partner->website)
                    <a href="{{ $partner->website }}" target="_blank" class="btn btn-outline-secondary btn-sm">
                      <i class="bi bi-globe"></i> Website
                    </a>
                  @endif --}}
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
      
      <!-- Partner Type Tabs -->
      @foreach($partnerTypes as $type)
      <div class="tab-pane fade" id="{{ $type->slug }}" role="tabpanel">
        <div class="row g-4">
          @php
            $typePartners = $allPartners->where('type', $type->slug);
          @endphp
          @forelse($typePartners as $partner)
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
            <div class="border-0 shadow-sm card h-100 hover-lift">
              @if($partner->logo)
                <div class="card-img-top d-flex align-items-center justify-content-center" style="height: 200px; background: #f8f9fa;">
                  <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="img-fluid" style="max-height: 150px; max-width: 80%;">
                </div>
              @endif
              <div class="card-body d-flex flex-column">
                <h5 class="mb-2 card-title">{{ $partner->name }}</h5>
                <span class="mb-3 badge bg-primary align-self-start">{{ $type->name }} Partner</span>
                <p class="card-text text-muted flex-grow-1">{{ Str::limit($partner->description, 120) }}</p>
                <div class="mt-auto">
                  <a href="{{ route('partners.show', $partner->slug) }}" class="btn btn-sm me-2">Learn More</a>
                  {{-- @if($partner->website)
                    <a href="{{ $partner->website }}" target="_blank" class="btn btn-outline-secondary btn-sm">
                      <i class="bi bi-globe"></i> Website
                    </a>
                  @endif --}}
                </div>
              </div>
            </div>
          </div>
          @empty
          <div class="col-12">
            <div class="py-5 text-center">
              <h3 class="text-muted">No {{ $type->name }} partners found</h3>
              <p class="text-muted">We're working on building {{ strtolower($type->name) }} partnerships. Check back soon!</p>
            </div>
          </div>
          @endforelse
        </div>
      </div>
      @endforeach
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

.nav-pills .nav-link {
  color: #6c757d;
  border-radius: 25px;
  padding: 8px 16px;
  margin: 0 3px;
  font-weight: 500;
  font-size: 14px;
  transition: all 0.3s ease;
  border: 2px solid transparent;
  white-space: nowrap;
}

.nav-pills .nav-link:hover {
  color: #667eea;
  background-color: rgba(102, 126, 234, 0.1);
  border-color: rgba(102, 126, 234, 0.2);
}

.nav-pills .nav-link.active {
  background: linear-gradient(45deg, #667eea, #764ba2);
  color: white;
  border-color: transparent;
}
</style>
@endsection