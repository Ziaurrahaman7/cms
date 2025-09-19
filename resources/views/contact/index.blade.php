@extends('layouts.app')

@section('title', 'Contact Us - ' . App\Models\SiteSetting::get('site_name', 'Technoit'))
@section('description', 'Get in touch with us for any inquiries, feedback, or career opportunities.')

@section('content')
<!-- Contact Hero Banner -->
<section id="contact-hero" class="hero sticked-header-offset" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 60vh; position: relative; overflow: hidden;">
  <div id="particles-js"></div>
  <div class="container position-relative">
    <div class="row gy-5 align-items-center justify-content-center text-center" style="min-height: 60vh;">
      <div class="col-lg-8">
        <h1 class="text-white mb-4" data-aos="fade-up" style="font-size: 3.5rem; font-weight: 700; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">Contact Us</h1>
        <p class="text-white-50 mb-4 fs-5" data-aos="fade-up" data-aos-delay="200">We'd love to hear from you. Get in touch with us for any inquiries, feedback, or career opportunities.</p>
        <div class="d-flex justify-content-center gap-3" data-aos="fade-up" data-aos-delay="400">
          <a href="#contact-form" class="btn btn-light btn-lg px-4 py-3 rounded-pill">
            <i class="bi bi-envelope me-2"></i>Send Message
          </a>
          <a href="#location" class="btn btn-outline-light btn-lg px-4 py-3 rounded-pill">
            <i class="bi bi-geo-alt me-2"></i>Find Us
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

<!-- Feedback Slider Section -->
<section id="feedback" class="py-5" style="background: #f8f9fa;">
  <div class="container">
    <div class="section-header text-center mb-5">
      <h2 class="mb-3">Client Feedback</h2>
      <p class="text-muted">What our clients say about working with us</p>
    </div>
    
    <div class="testimonial-slider swiper" data-aos="fade-up">
      <div class="swiper-wrapper">
        @forelse($testimonials as $testimonial)
        <div class="swiper-slide">
          <div class="testimonial-card bg-white rounded-4 p-4 shadow-sm border h-100">
            <div class="text-center mb-4">
              @if($testimonial->image && file_exists(public_path('storage/testimonials/' . $testimonial->image)))
                <img src="{{ asset('storage/testimonials/' . $testimonial->image) }}" class="rounded-circle mb-3" style="width: 80px; height: 80px; object-fit: cover;" alt="{{ $testimonial->name }}">
              @else
                <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background: linear-gradient(45deg, #667eea, #764ba2); color: white; font-size: 2rem; font-weight: bold;">
                  {{ substr($testimonial->name, 0, 1) }}
                </div>
              @endif
              <h5 class="mb-1">{{ $testimonial->name }}</h5>
              <p class="text-muted small mb-2">{{ $testimonial->position }}</p>
              <div class="stars mb-3">
                @for($i = 1; $i <= 5; $i++)
                  <i class="bi bi-star{{ $i <= $testimonial->rating ? '-fill' : '' }} text-warning"></i>
                @endfor
              </div>
            </div>
            <p class="text-center text-muted mb-0">
              <i class="bi bi-quote text-primary me-1"></i>
              {{ $testimonial->message }}
              <i class="bi bi-quote text-primary ms-1"></i>
            </p>
          </div>
        </div>
        @empty
        <div class="swiper-slide">
          <div class="testimonial-card bg-white rounded-4 p-4 shadow-sm border h-100">
            <div class="text-center mb-4">
              <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background: linear-gradient(45deg, #667eea, #764ba2); color: white; font-size: 2rem; font-weight: bold;">
                J
              </div>
              <h5 class="mb-1">John Doe</h5>
              <p class="text-muted small mb-2">CEO</p>
              <div class="stars mb-3">
                <i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i>
              </div>
            </div>
            <p class="text-center text-muted mb-0">
              <i class="bi bi-quote text-primary me-1"></i>
              Excellent service and professional team. They delivered exactly what we needed on time and within budget.
              <i class="bi bi-quote text-primary ms-1"></i>
            </p>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="testimonial-card bg-white rounded-4 p-4 shadow-sm border h-100">
            <div class="text-center mb-4">
              <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background: linear-gradient(45deg, #4ecdc4, #44a08d); color: white; font-size: 2rem; font-weight: bold;">
                J
              </div>
              <h5 class="mb-1">Jane Smith</h5>
              <p class="text-muted small mb-2">Marketing Director</p>
              <div class="stars mb-3">
                <i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i>
              </div>
            </div>
            <p class="text-center text-muted mb-0">
              <i class="bi bi-quote text-primary me-1"></i>
              Outstanding work quality and great communication throughout the project. Highly recommended!
              <i class="bi bi-quote text-primary ms-1"></i>
            </p>
          </div>
        </div>
        @endforelse
      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </div>
</section>

<!-- Career Section -->
<section id="career" class="py-5">
  <div class="container">
    <div class="section-header text-center mb-5">
      <h2 class="mb-3">Join Our Team</h2>
      <p class="text-muted">Explore exciting career opportunities and grow with us</p>
    </div>
    
    <div class="row g-4">
      @php
        $jobs = App\Models\Job::active()->latest()->take(6)->get();
        $gradients = [
          'linear-gradient(45deg, #667eea, #764ba2)',
          'linear-gradient(45deg, #4ecdc4, #44a08d)',
          'linear-gradient(45deg, #feca57, #ff9ff3)',
          'linear-gradient(45deg, #ff6b6b, #ee5a24)',
          'linear-gradient(45deg, #a55eea, #26de81)',
          'linear-gradient(45deg, #fd79a8, #fdcb6e)'
        ];
        $icons = ['code-slash', 'palette', 'megaphone', 'gear', 'graph-up', 'people'];
      @endphp
      
      @forelse($jobs as $index => $job)
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
        <div class="career-box bg-white rounded-4 p-4 h-100 shadow-sm border">
          <div class="career-icon mb-3">
            <div class="icon-wrapper" style="width: 60px; height: 60px; background: {{ $gradients[$index % count($gradients)] }}; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
              <i class="bi bi-{{ $icons[$index % count($icons)] }} text-white" style="font-size: 1.5rem;"></i>
            </div>
          </div>
          <h4 class="mb-3">{{ $job->title }}</h4>
          <p class="text-muted mb-3">{{ Str::limit($job->description, 100) }}</p>
          <div class="career-details mb-3">
            <small class="text-muted">
              <i class="bi bi-geo-alt me-1"></i>{{ $job->location }}<br>
              <i class="bi bi-clock me-1"></i>{{ $job->type }}<br>
              @if($job->salary)
                <i class="bi bi-currency-dollar me-1"></i>{{ $job->salary }}
              @else
                <i class="bi bi-currency-dollar me-1"></i>Competitive Salary
              @endif
            </small>
          </div>
          <a href="{{ route('careers.index') }}#job-{{ $job->id }}" class="btn btn-outline-primary btn-sm rounded-pill">Apply Now</a>
        </div>
      </div>
      @empty
      <div class="col-12 text-center">
        <div class="py-5">
          <i class="bi bi-briefcase" style="font-size: 4rem; color: #dee2e6;"></i>
          <h4 class="mt-3 text-muted">No Open Positions</h4>
          <p class="text-muted">We don't have any open positions at the moment, but feel free to send us your resume for future opportunities.</p>
          <a href="mailto:{{ App\Models\SiteSetting::get('contact_email', 'careers@technoit.com') }}" class="btn btn-primary rounded-pill">
            <i class="bi bi-envelope me-2"></i>Send Resume
          </a>
        </div>
      </div>
      @endforelse
    </div>
    
    @if($jobs->count() > 0)
    <div class="text-center mt-5">
      <a href="{{ route('careers.index') }}" class="btn btn-primary btn-lg rounded-pill">
        <i class="bi bi-arrow-right me-2"></i>View All Positions
      </a>
    </div>
    @endif
  </div>
</section>

<!-- Contact Form Section -->
<section id="contact-form" class="py-5" style="background: #f8f9fa;">
  <div class="container">
    <div class="section-header text-center mb-5">
      <h2 class="mb-3">Get In Touch</h2>
      <p class="text-muted">Send us a message and we'll get back to you as soon as possible</p>
    </div>
    
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        <strong>Thank you!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    
    <div class="row g-5">
      <div class="col-lg-4">
        <div class="contact-info">
          <div class="contact-item mb-4">
            <div class="d-flex align-items-center">
              <div class="contact-icon me-3">
                <div class="icon-wrapper" style="width: 50px; height: 50px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                  <i class="bi bi-geo-alt text-white"></i>
                </div>
              </div>
              <div>
                <h6 class="mb-1">Address</h6>
                <p class="text-muted mb-0">{{ App\Models\SiteSetting::get('contact_address', '11 West Town, PBo 12345, United States') }}</p>
              </div>
            </div>
          </div>
          
          <div class="contact-item mb-4">
            <div class="d-flex align-items-center">
              <div class="contact-icon me-3">
                <div class="icon-wrapper" style="width: 50px; height: 50px; background: linear-gradient(45deg, #4ecdc4, #44a08d); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                  <i class="bi bi-telephone text-white"></i>
                </div>
              </div>
              <div>
                <h6 class="mb-1">Phone</h6>
                <p class="text-muted mb-0">{{ App\Models\SiteSetting::get('contact_phone', '+1 (234) 567-890') }}</p>
              </div>
            </div>
          </div>
          
          <div class="contact-item mb-4">
            <div class="d-flex align-items-center">
              <div class="contact-icon me-3">
                <div class="icon-wrapper" style="width: 50px; height: 50px; background: linear-gradient(45deg, #feca57, #ff9ff3); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                  <i class="bi bi-envelope text-white"></i>
                </div>
              </div>
              <div>
                <h6 class="mb-1">Email</h6>
                <p class="text-muted mb-0">{{ App\Models\SiteSetting::get('contact_email', 'info@example.com') }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-lg-8">
        <div class="contact-form-box bg-white rounded-4 p-4 shadow-sm">
          <form method="POST" action="{{ route('contact.store') }}">
            @csrf
            <div class="row g-3">
              <div class="col-md-6">
                <label for="name" class="form-label">Name *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label">Email *</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
              </div>
              <div class="col-md-6">
                <label for="company" class="form-label">Company</label>
                <input type="text" class="form-control" id="company" name="company" value="{{ old('company') }}">
              </div>
              <div class="col-12">
                <label for="service" class="form-label">Service Interested In</label>
                <select class="form-control" id="service" name="service">
                  <option value="">Select a service</option>
                  @php
                    $services = App\Models\Service::active()->ordered()->get();
                  @endphp
                  @foreach($services as $service)
                    <option value="{{ $service->title }}" {{ old('service') === $service->title ? 'selected' : '' }}>{{ $service->title }}</option>
                  @endforeach
                  <option value="Others" {{ old('service') === 'Others' ? 'selected' : '' }}>Others</option>
                </select>
              </div>
              <div class="col-12">
                <label for="message" class="form-label">Message *</label>
                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" placeholder="Tell us about your project or inquiry..." required>{{ old('message') }}</textarea>
                @error('message')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill" style="background: linear-gradient(45deg, #667eea, #764ba2); border: none;">
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

<!-- Location Section -->
<section id="location" class="py-5">
  <div class="container">
    <div class="section-header text-center mb-5">
      <h2 class="mb-3">Find Us</h2>
      <p class="text-muted">Visit our office or get directions to our location</p>
    </div>
    
    <div class="row g-5 align-items-center">
      <div class="col-lg-6">
        <div class="location-info">
          <h4 class="mb-4">Our Office Location</h4>
          <div class="location-details">
            <div class="d-flex align-items-start mb-3">
              <i class="bi bi-geo-alt-fill text-primary me-3 mt-1"></i>
              <div>
                <h6 class="mb-1">Address</h6>
                <p class="text-muted mb-0">{{ App\Models\SiteSetting::get('contact_address', '11 West Town, PBo 12345, United States') }}</p>
              </div>
            </div>
            
            <div class="d-flex align-items-start mb-3">
              <i class="bi bi-clock-fill text-primary me-3 mt-1"></i>
              <div>
                <h6 class="mb-1">Office Hours</h6>
                <p class="text-muted mb-0">
                  Monday - Friday: 9:00 AM - 6:00 PM<br>
                  Saturday: 10:00 AM - 4:00 PM<br>
                  Sunday: Closed
                </p>
              </div>
            </div>
            
            <div class="d-flex align-items-start mb-3">
              <i class="bi bi-telephone-fill text-primary me-3 mt-1"></i>
              <div>
                <h6 class="mb-1">Contact</h6>
                <p class="text-muted mb-0">
                  Phone: {{ App\Models\SiteSetting::get('contact_phone', '+1 (234) 567-890') }}<br>
                  Email: {{ App\Models\SiteSetting::get('contact_email', 'info@example.com') }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-lg-6">
        <div class="map-container">
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.0977!2d90.4125181!3d23.7808875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjPCsDQ2JzUxLjIiTiA5MMKwMjQnNDUuMSJF!5e0!3m2!1sen!2sbd!4v1234567890"
            width="100%" 
            height="400" 
            style="border:0; border-radius: 15px;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
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

.career-box:hover {
  transform: translateY(-5px);
  transition: all 0.3s ease;
  box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
}

.contact-item:hover .icon-wrapper {
  transform: scale(1.1);
  transition: all 0.3s ease;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const testimonialSwiper = new Swiper('.testimonial-slider', {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      992: {
        slidesPerView: 2,
        spaceBetween: 30,
      }
    }
  });
});
</script>
@endsection