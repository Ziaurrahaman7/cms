@extends('layouts.app')

@section('title', 'Certificates & Achievements - ' . App\Models\SiteSetting::get('site_name', 'Technoit'))
@section('description', 'View all our certificates, awards and achievements that showcase our excellence and commitment to quality.')

@section('content')
<!-- Certificates Hero Banner -->
<section class="hero sticked-header-offset" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 50vh; position: relative;">
  <div class="container position-relative">
    <div class="text-center row gy-5 align-items-center justify-content-center" style="min-height: 50vh;">
      <div class="col-lg-8">
        <h1 class="mb-4 text-white" data-aos="fade-up" style="font-size: 3rem; font-weight: 700;">Certificates & Achievements</h1>
        <p class="mb-4 text-white-50 fs-5" data-aos="fade-up" data-aos-delay="200">Recognition of our excellence and commitment to quality in IT solutions and services.</p>
      </div>
    </div>
  </div>
</section>

<!-- All Certificates Section -->
<section class="py-5">
  <div class="container">
    <div class="row g-4">
      @forelse($achievements as $achievement)
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index + 1) * 100 }}">
        <div class="p-4 text-center bg-white shadow-sm achievement-card rounded-4 h-100">
          <div class="mb-3 achievement-icon">
            @if($achievement->image && file_exists(public_path('storage/achievements/' . $achievement->image)))
              <img src="{{ asset('storage/achievements/' . $achievement->image) }}" alt="{{ $achievement->title }}" class="img-fluid rounded-3" style="width: 100%; height: 200px; object-fit: contain;">
            @else
              <div class="mx-auto rounded-3" style="width: 100%; height: 200px; background: linear-gradient(45deg, #667eea, #764ba2); display: flex; align-items: center; justify-content: center;">
                <i class="text-white bi bi-award" style="font-size: 3rem;"></i>
              </div>
            @endif
          </div>
          <h4 class="mb-3">{{ $achievement->title }}</h4>
          <p class="mb-3 text-muted">{{ $achievement->description }}</p>
          <div class="achievement-year">
            <span class="px-3 py-1 badge 
              @if($achievement->category === 'certificate') bg-primary
              @elseif($achievement->category === 'achievement') bg-success
              @else bg-warning text-dark @endif">{{ $achievement->year }}</span>
          </div>
        </div>
      </div>
      @empty
      <div class="text-center col-12">
        <div class="py-5">
          <i class="bi bi-award text-muted" style="font-size: 4rem;"></i>
          <h3 class="mt-3 text-muted">No Certificates Available</h3>
          <p class="text-muted">We are working on adding our certificates and achievements.</p>
        </div>
      </div>
      @endforelse
    </div>
    
    <!-- Back to About Button -->
    <div class="mt-5 row">
      <div class="text-center col-12">
        <a href="{{ route('about.index') }}" class="px-4 py-3 btn btn-outline-primary btn-lg rounded-pill">
          <i class="bi bi-arrow-left me-2"></i>Back to About
        </a>
      </div>
    </div>
  </div>
</section>

<style>
.achievement-card:hover {
  transform: translateY(-5px);
  transition: all 0.3s ease;
}
</style>
@endsection