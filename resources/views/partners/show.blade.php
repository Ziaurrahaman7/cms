@extends('layouts.app')

@section('title', $partner->name . ' - Partners')
@section('description', $partner->description)

@section('content')
<!-- Partner Hero Section -->
<section class="hero sticked-header-offset py-5" style="min-height: 70vh; background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%), url('{{ asset('assets/images/hero-bg.jpg') }}') center/cover;">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center" style="min-height: 70vh;">
      <div class="col-lg-8">
        <div class="hero-content">
          @if($partner->logo)
            <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="mb-4" style="max-height: 100px;">
          @endif
          <h1 class="mb-4 text-white" data-aos="fade-up">{{ $partner->name }}</h1>
          <p class="mb-5 fs-5 lead text-white-50" data-aos="fade-up" data-aos-delay="200">{{ $partner->description }}</p>
          @if($partner->website)
            <div class="gap-3 d-flex justify-content-center flex-wrap" data-aos="fade-up" data-aos-delay="400">
              <a href="{{ $partner->website }}" target="_blank" class="px-5 py-3 btn btn-warning btn-lg rounded-pill fw-bold">
                <i class="bi bi-globe me-2"></i>Visit Website
              </a>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Partner Sections -->
@if($partner->sections && count($partner->sections) > 0)
  @foreach($partner->sections as $index => $section)
  <section class="py-5 {{ $index % 2 == 0 ? '' : 'bg-light' }}">
    <div class="container">
      <div class="row align-items-center {{ $index % 2 == 0 ? '' : 'flex-row-reverse' }}">
        @if(isset($section['image']) && $section['image'])
        <div class="col-lg-6 mb-4 mb-lg-0">
          <img src="{{ asset('storage/' . $section['image']) }}" alt="{{ $section['title'] }}" class="img-fluid rounded shadow">
        </div>
        @endif
        <div class="col-lg-{{ isset($section['image']) && $section['image'] ? '6' : '12' }}">
          <div class="{{ isset($section['image']) && $section['image'] ? ($index % 2 == 0 ? 'ps-lg-4' : 'pe-lg-4') : 'text-center' }}">
            <h2 class="mb-4">{{ $section['title'] }}</h2>
            <div class="text-muted">{!! $section['description'] !!}</div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endforeach
@endif
@endsection