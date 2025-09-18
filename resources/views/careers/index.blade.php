@extends('layouts.app')

@section('title', 'Careers - ' . App\Models\SiteSetting::get('site_name', 'Technoit'))
@section('description', 'Join our team and build your career with us')

@section('content')
<!-- Careers Hero Section -->
<section class="hero sticked-header-offset py-5 position-relative" style="min-height: 70vh; background: url('{{ asset('assets/images/hero-bg.jpg') }}') center/cover;">
  <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);"></div>
  <div class="container position-relative" style="z-index: 2;">
    <div class="row align-items-center justify-content-center text-center" style="min-height: 70vh;">
      <div class="col-lg-8">
        <div class="hero-content">
          <h1 class="mb-4 text-white" data-aos="fade-up">Join Our Team</h1>
          <p class="mb-5 fs-5 lead text-white-50" data-aos="fade-up" data-aos-delay="200">Build your career with us and be part of an innovative team that's shaping the future of technology.</p>
          <div class="gap-3 d-flex justify-content-center flex-wrap" data-aos="fade-up" data-aos-delay="400">
            <a href="#openings" class="px-5 py-3 btn btn-warning btn-lg rounded-pill fw-bold">
              <i class="bi bi-briefcase me-2"></i>View Openings
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Job Openings Section -->
<section id="openings" class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-lg-8 text-center">
        <h2 class="mb-4">Current Openings</h2>
        <p class="lead text-muted">Explore exciting career opportunities with us</p>
      </div>
    </div>
    
    <div class="row justify-content-center">
      <div class="col-lg-8">
        @forelse($jobs as $job)
        <div class="bg-white rounded shadow p-4 mb-4">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <h5 class="mb-2">{{ $job->title }}</h5>
              <p class="text-muted mb-2"><i class="bi bi-geo-alt me-2"></i>{{ $job->location }}</p>
              <p class="mb-3">{!! Str::limit($job->description, 150) !!}</p>
            </div>
            <span class="badge bg-primary">{{ ucwords(str_replace('-', ' ', $job->type)) }}</span>
          </div>
          <a href="#contact" class="btn btn-outline-primary" onclick="document.getElementById('position').value='{{ $job->title }}'">Apply Now</a>
        </div>
        @empty
        <div class="text-center py-5">
          <p class="text-muted">No job openings available at the moment.</p>
        </div>
        @endforelse
        
        <div class="text-center mt-4">
          <p class="text-muted">Don't see a position that fits? <a href="#contact">Send us your resume</a> and we'll keep you in mind for future opportunities.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="text-center mb-5">
          <h2 class="mb-3">Apply Now</h2>
          <p class="text-muted">Ready to join our team? Send us your application.</p>
        </div>
        
        @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        @endif
        
        <div class="bg-white rounded shadow p-4">
          <form action="{{ route('job.apply') }}" method="POST" enctype="multipart/form-data">
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
                <label for="position" class="form-label">Position *</label>
                <select class="form-control" id="position" name="subject" required>
                  <option value="">Select Position</option>
                  @foreach($jobs as $job)
                    <option value="{{ $job->title }}">{{ $job->title }}</option>
                  @endforeach
                  <option value="Other">Other</option>
                </select>
              </div>
              <div class="col-12">
                <label for="cv" class="form-label">Upload CV (PDF) *</label>
                <input type="file" class="form-control" id="cv" name="cv" accept=".pdf" required>
              </div>
              <div class="col-12">
                <label for="message" class="form-label">Cover Letter *</label>
                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Tell us about yourself..." required></textarea>
              </div>
              <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary btn-lg px-5">
                  <i class="bi bi-send me-2"></i>Submit Application
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