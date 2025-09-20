@extends('layouts.app')

@section('title', 'Contact Us - ' . App\Models\SiteSetting::get('site_name', 'Technoit'))
@section('description', 'Get in touch with us for any inquiries, feedback, or career opportunities.')

@section('content')
<!-- Contact Hero Banner -->
<section id="contact-hero" class="hero sticked-header-offset" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 60vh; position: relative; overflow: hidden;">
  <div id="particles-js"></div>
  <div class="container position-relative">
    <div class="text-center row gy-5 align-items-center justify-content-center" style="min-height: 60vh;">
      <div class="col-lg-8">
        <h1 class="mb-4 text-white" data-aos="fade-up" style="font-size: 3.5rem; font-weight: 700; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">Contact Us</h1>
        <p class="mb-4 text-white-50 fs-5" data-aos="fade-up" data-aos-delay="200">We'd love to hear from you. Get in touch with us for any inquiries, feedback, or career opportunities.</p>
        <div class="gap-3 d-flex flex-column flex-lg-row justify-content-center" data-aos="fade-up" data-aos-delay="400">
          <a href="#contact-form" style="color: white; border-color: white;" class="px-4 py-3 btn btn-light btn-lg rounded-pill">
            <i class="bi bi-envelope me-2"></i>Send Message
          </a>
          <a href="#location" class="px-4 py-3 btn btn-outline-light btn-lg rounded-pill" style="color: white; border-color: white;">
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





<!-- Contact Form Section -->
<section id="contact-form" class="py-5" style="background: #f8f9fa;">
  <div class="container">
    <div class="mb-5 text-center section-header">
      <h2 class="mb-3">Get In Touch</h2>
      <p class="text-muted">Send us a message and we'll get back to you as soon as possible</p>
    </div>
    
    @if(session('success'))
      <div class="mb-4 alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        <strong>Thank you!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    
    <div class="row g-5">
      <div class="col-lg-4">
        <div class="contact-info">
          <div class="mb-4 contact-item">
            <div class="d-flex align-items-center">
              <div class="contact-icon me-3">
                <div class="icon-wrapper" style="width: 50px; height: 50px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                  <i class="text-white bi bi-geo-alt"></i>
                </div>
              </div>
              <div>
                <h6 class="mb-1">Address</h6>
                <p class="mb-0 text-muted">{{ App\Models\SiteSetting::get('contact_address', '11 West Town, PBo 12345, United States') }}</p>
              </div>
            </div>
          </div>
          
          <div class="mb-4 contact-item">
            <div class="d-flex align-items-center">
              <div class="contact-icon me-3">
                <div class="icon-wrapper" style="width: 50px; height: 50px; background: linear-gradient(45deg, #4ecdc4, #44a08d); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                  <i class="text-white bi bi-telephone"></i>
                </div>
              </div>
              <div>
                <h6 class="mb-1">Phone</h6>
                <p class="mb-0 text-muted">{{ App\Models\SiteSetting::get('contact_phone', '+1 (234) 567-890') }}</p>
              </div>
            </div>
          </div>
          
          <div class="mb-4 contact-item">
            <div class="d-flex align-items-center">
              <div class="contact-icon me-3">
                <div class="icon-wrapper" style="width: 50px; height: 50px; background: linear-gradient(45deg, #feca57, #ff9ff3); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                  <i class="text-white bi bi-envelope"></i>
                </div>
              </div>
              <div>
                <h6 class="mb-1">Email</h6>
                <p class="mb-0 text-muted">{{ App\Models\SiteSetting::get('contact_email', 'info@example.com') }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-lg-8">
        <div class="p-4 bg-white shadow-sm contact-form-box rounded-4">
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
    <div class="mb-5 text-center section-header">
      <h2 class="mb-3">Find Us</h2>
      <p class="text-muted">Visit our office or get directions to our location</p>
    </div>
    
    <div class="row g-5 align-items-center">
      <div class="col-lg-6">
        <div class="location-info">
          <h4 class="mb-4">Our Office Location</h4>
          <div class="location-details">
            <div class="mb-3 d-flex align-items-start">
              <i class="mt-1 bi bi-geo-alt-fill text-primary me-3"></i>
              <div>
                <h6 class="mb-1">Address</h6>
                <p class="mb-0 text-muted">{{ App\Models\SiteSetting::get('contact_address', '11 West Town, PBo 12345, United States') }}</p>
              </div>
            </div>
            
            <div class="mb-3 d-flex align-items-start">
              <i class="mt-1 bi bi-clock-fill text-primary me-3"></i>
              <div>
                <h6 class="mb-1">Office Hours</h6>
                <p class="mb-0 text-muted">
                  Monday - Friday: 9:00 AM - 6:00 PM<br>
                  Saturday: 10:00 AM - 4:00 PM<br>
                  Sunday: Closed
                </p>
              </div>
            </div>
            
            <div class="mb-3 d-flex align-items-start">
              <i class="mt-1 bi bi-telephone-fill text-primary me-3"></i>
              <div>
                <h6 class="mb-1">Contact</h6>
                <p class="mb-0 text-muted">
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


@endsection