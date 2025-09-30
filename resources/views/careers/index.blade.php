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
          <h1 class="mb-4 text-white" data-aos="fade-up">{{ $careerSettings->hero_title }}</h1>
          <p class="mb-5 fs-5 lead text-white-50" data-aos="fade-up" data-aos-delay="200">{{ $careerSettings->hero_description }}</p>
          <div class="gap-3 d-flex justify-content-center flex-wrap" data-aos="fade-up" data-aos-delay="400">
            <a href="#openings" class="px-5 py-3 btn btn-warning btn-lg rounded-pill fw-bold">
              <i class="bi bi-briefcase me-2"></i>{{ $careerSettings->hero_button_text }}
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Why Join Us Section -->
<section class="py-5">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-lg-8 text-center">
        <h2 class="mb-4">{{ $careerSettings->why_join_title }}</h2>
        <p class="lead text-muted">{{ $careerSettings->why_join_description }}</p>
      </div>
    </div>
    
    <div class="row g-4">
      @php
        $gradients = [
          'linear-gradient(45deg, #667eea, #764ba2)',
          'linear-gradient(45deg, #4ecdc4, #44a08d)', 
          'linear-gradient(45deg, #feca57, #ff9ff3)',
          'linear-gradient(45deg, #ff6b6b, #ee5a24)'
        ];
      @endphp
      @foreach($careerSettings->benefits ?? [] as $index => $benefit)
      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
        <div class="text-center h-100">
          <div class="mb-4">
            <div class="d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background: {{ $gradients[$index % 4] }}; border-radius: 50%;">
              <i class="text-white {{ $benefit['icon'] }}" style="font-size: 2rem;"></i>
            </div>
          </div>
          <h5 class="mb-3">{{ $benefit['title'] }}</h5>
          <p class="text-muted">{{ $benefit['description'] }}</p>
        </div>
      </div>
      @endforeach
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
              <div class="mb-3">
                @php
                  $shortDesc = strip_tags($job->description);
                  $isLong = strlen($shortDesc) > 150;
                  $truncated = $isLong ? substr($shortDesc, 0, 150) . '...' : $shortDesc;
                @endphp
                
                <div class="job-description">
                  <div class="short-desc">{{ $truncated }}</div>
                  @if($isLong)
                    <div class="full-desc d-none">{!! $job->description !!}</div>
                    <button class="btn btn-link p-0 mt-2 read-more-btn" style="color: #0d6efd; font-size: 0.9rem;">
                      <i class="bi bi-plus-circle me-1"></i>Read More
                    </button>
                    <button class="btn btn-link p-0 mt-2 read-less-btn d-none" style="color: #0d6efd; font-size: 0.9rem;">
                      <i class="bi bi-dash-circle me-1"></i>Read Less
                    </button>
                  @endif
                </div>
              </div>
            </div>
            <span class="badge bg-primary">{{ ucwords(str_replace('-', ' ', $job->type)) }}</span>
          </div>
          
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <a href="#contact" class="btn btn-outline-primary me-3" onclick="document.getElementById('position').value='{{ $job->title }}'">Apply Now</a>
              
              <!-- Social Share Buttons -->
              <div class="d-inline-flex gap-2">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}&quote={{ urlencode('Check out this job opportunity: ' . $job->title . ' at ' . App\Models\SiteSetting::get('site_name', 'Technoit')) }}" target="_blank" class="btn btn-sm btn-outline-primary" title="Share on Facebook">
                  <i class="bi bi-facebook"></i>
                </a>
                <a href="https://twitter.com/intent/tweet?text={{ urlencode('Check out this job opportunity: ' . $job->title . ' at ' . App\Models\SiteSetting::get('site_name', 'Technoit')) }}&url={{ urlencode(request()->fullUrl()) }}" target="_blank" class="btn btn-sm btn-outline-info" title="Share on Twitter">
                  <i class="bi bi-twitter"></i>
                </a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}" target="_blank" class="btn btn-sm btn-outline-primary" title="Share on LinkedIn">
                  <i class="bi bi-linkedin"></i>
                </a>
                <a href="whatsapp://send?text={{ urlencode('Check out this job opportunity: ' . $job->title . ' at ' . App\Models\SiteSetting::get('site_name', 'Technoit') . ' - ' . request()->fullUrl()) }}" class="btn btn-sm btn-outline-success" title="Share on WhatsApp">
                  <i class="bi bi-whatsapp"></i>
                </a>
              </div>
            </div>
          </div>
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

<style>
.btn-sm {
  padding: 0.25rem 0.5rem;
  font-size: 0.875rem;
}

.btn-outline-primary:hover,
.btn-outline-info:hover,
.btn-outline-success:hover {
  transform: translateY(-2px);
  transition: all 0.3s ease;
}

.gap-2 {
  gap: 0.5rem;
}

@media (max-width: 768px) {
  .d-flex.justify-content-between {
    flex-direction: column;
    gap: 1rem;
  }
  
  .d-inline-flex {
    justify-content: center;
  }
}

.read-more-btn:hover,
.read-less-btn:hover {
  text-decoration: none !important;
  color: #0a58ca !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Read More/Less functionality
  document.querySelectorAll('.read-more-btn').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      const container = this.closest('.job-description');
      const shortDesc = container.querySelector('.short-desc');
      const fullDesc = container.querySelector('.full-desc');
      const readMoreBtn = container.querySelector('.read-more-btn');
      const readLessBtn = container.querySelector('.read-less-btn');
      
      shortDesc.classList.add('d-none');
      fullDesc.classList.remove('d-none');
      readMoreBtn.classList.add('d-none');
      readLessBtn.classList.remove('d-none');
    });
  });
  
  document.querySelectorAll('.read-less-btn').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      const container = this.closest('.job-description');
      const shortDesc = container.querySelector('.short-desc');
      const fullDesc = container.querySelector('.full-desc');
      const readMoreBtn = container.querySelector('.read-more-btn');
      const readLessBtn = container.querySelector('.read-less-btn');
      
      shortDesc.classList.remove('d-none');
      fullDesc.classList.add('d-none');
      readMoreBtn.classList.remove('d-none');
      readLessBtn.classList.add('d-none');
    });
  });
});
</script>
@endsection