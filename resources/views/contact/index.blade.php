@extends('layouts.app')

@section('title', 'Contact Us - ' . App\Models\SiteSetting::get('site_name', 'Technoit'))
@section('description', 'Get in touch with us for any inquiries, feedback, or career opportunities.')

@section('content')
<!-- Contact Hero Banner -->
<section id="contact-hero" class="hero sticked-header-offset" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 70vh; position: relative; overflow: hidden;">
  <div id="particles-js"></div>
  <div class="container position-relative">
    <div class="text-center row gy-5 align-items-center justify-content-center" style="min-height: 70vh;">
      <div class="col-lg-10">
        <h1 class="mb-4 text-white" data-aos="fade-up" style="font-size: 3.5rem; font-weight: 700; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">Get In Touch</h1>
        <p class="mb-5 text-white-50 fs-5" data-aos="fade-up" data-aos-delay="200">Ready to start your next project? We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
        <div class="gap-3 d-flex flex-column flex-lg-row justify-content-center" data-aos="fade-up" data-aos-delay="400">
          <a href="#contact-form" class="px-5 py-3 btn btn-light btn-lg rounded-pill fw-bold">
            <i class="bi bi-envelope me-2"></i>Send Message
          </a>
          <a href="#offices" class="px-5 py-3 btn btn-outline-light btn-lg rounded-pill fw-bold">
            <i class="bi bi-geo-alt me-2"></i>Our Offices
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





<!-- Quick Contact Info -->
<section class="py-5" style="background: #f8f9fa; margin-top: -100px; position: relative; z-index: 10;">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="p-4 text-center bg-white shadow-sm contact-quick-item rounded-4 h-100">
          <div class="mb-3 contact-icon">
            <div class="mx-auto icon-wrapper" style="width: 60px; height: 60px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
              <i class="text-white bi bi-telephone" style="font-size: 1.5rem;"></i>
            </div>
          </div>
          <h5 class="mb-2">Call Us</h5>
          <p class="mb-0 text-muted">{{ App\Models\SiteSetting::get('contact_phone', '+1 (234) 567-890') }}</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="p-4 text-center bg-white shadow-sm contact-quick-item rounded-4 h-100">
          <div class="mb-3 contact-icon">
            <div class="mx-auto icon-wrapper" style="width: 60px; height: 60px; background: linear-gradient(45deg, #4ecdc4, #44a08d); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
              <i class="text-white bi bi-envelope" style="font-size: 1.5rem;"></i>
            </div>
          </div>
          <h5 class="mb-2">Email Us</h5>
          <p class="mb-0 text-muted">{{ App\Models\SiteSetting::get('contact_email', 'info@example.com') }}</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="p-4 text-center bg-white shadow-sm contact-quick-item rounded-4 h-100">
          <div class="mb-3 contact-icon">
            <div class="mx-auto icon-wrapper" style="width: 60px; height: 60px; background: linear-gradient(45deg, #feca57, #ff9ff3); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
              <i class="text-white bi bi-whatsapp" style="font-size: 1.5rem;"></i>
            </div>
          </div>
          <h5 class="mb-2">WhatsApp</h5>
          <p class="mb-0 text-muted">{{ App\Models\SiteSetting::get('contact_whatsapp', '+1234567890') }}</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Contact Form Section -->
<section id="contact-form" class="py-5">
  <div class="container">
    <div class="mb-5 text-center section-header" data-aos="fade-up">
      <h2 class="mb-3">Send Us a Message</h2>
      <p class="text-muted">Have a project in mind? Let's discuss how we can help you achieve your goals.</p>
    </div>
    
    @if(session('success'))
      <div class="mb-4 alert alert-success alert-dismissible fade show" role="alert" data-aos="fade-up">
        <i class="bi bi-check-circle-fill me-2"></i>
        <strong>Thank you!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="p-5 bg-white shadow-lg contact-form-box rounded-4" data-aos="fade-up" data-aos-delay="200">
          <form method="POST" action="{{ route('contact.store') }}">
            @csrf
            <div class="row g-4">
              <div class="col-md-6">
                <label for="name" class="form-label fw-medium">Full Name *</label>
                <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label fw-medium">Email Address *</label>
                <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6">
                <label for="phone" class="form-label fw-medium">Phone Number</label>
                <input type="tel" class="form-control form-control-lg" id="phone" name="phone" value="{{ old('phone') }}">
              </div>
              <div class="col-md-6">
                <label for="company" class="form-label fw-medium">Company</label>
                <input type="text" class="form-control form-control-lg" id="company" name="company" value="{{ old('company') }}">
              </div>
              <div class="col-12">
                <label for="service" class="form-label fw-medium">Service Interested In</label>
                <select class="form-control form-control-lg" id="service" name="service">
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
                <label for="message" class="form-label fw-medium">Project Details *</label>
                <textarea class="form-control form-control-lg @error('message') is-invalid @enderror" id="message" name="message" rows="6" placeholder="Tell us about your project requirements, timeline, and budget..." required>{{ old('message') }}</textarea>
                @error('message')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-12 text-center">
                <button type="submit" class="px-5 py-3 btn btn-primary btn-lg rounded-pill fw-bold" style="background: linear-gradient(45deg, #667eea, #764ba2); border: none; min-width: 200px;">
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

<!-- Office Locations Section -->
<section id="offices" class="py-5" style="background: #f8f9fa;">
  <div class="container">
    <div class="mb-5 text-center section-header" data-aos="fade-up">
      <h2 class="mb-3">Our Office Locations</h2>
      <p class="text-muted">Visit us at any of our convenient locations worldwide</p>
    </div>
    
    @php
      $officeAddresses = json_decode(App\Models\SiteSetting::get('office_addresses', '[]'), true);
      if (empty($officeAddresses)) {
          $officeAddresses = [
              [
                  'name' => 'Head Office',
                  'address' => App\Models\SiteSetting::get('contact_address', '11 West Town, PBo 12345, United States'),
                  'phone' => App\Models\SiteSetting::get('contact_phone', '+1 (234) 567-890'),
                  'email' => App\Models\SiteSetting::get('contact_email', 'info@example.com')
              ]
          ];
      }
    @endphp
    
    <div class="row g-4">
      @foreach($officeAddresses as $index => $office)
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
        <div class="p-4 bg-white shadow-sm office-card rounded-4 h-100" style="transition: all 0.3s ease;">
          <div class="mb-3 d-flex align-items-center">
            <div class="office-icon me-3">
              <div class="icon-wrapper" style="width: 50px; height: 50px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                <i class="text-white bi bi-building" style="font-size: 1.2rem;"></i>
              </div>
            </div>
            <h5 class="mb-0">{{ $office['name'] ?? 'Office ' . ($index + 1) }}</h5>
          </div>
          
          <div class="office-details">
            @if(!empty($office['address']))
            <div class="mb-3 d-flex align-items-start">
              <i class="mt-1 bi bi-geo-alt text-primary me-3"></i>
              <div>
                <h6 class="mb-1 text-muted small">ADDRESS</h6>
                <p class="mb-0">{{ $office['address'] }}</p>
              </div>
            </div>
            @endif
            
            @if(!empty($office['phone']))
            <div class="mb-3 d-flex align-items-start">
              <i class="mt-1 bi bi-telephone text-primary me-3"></i>
              <div>
                <h6 class="mb-1 text-muted small">PHONE</h6>
                <p class="mb-0">{{ $office['phone'] }}</p>
              </div>
            </div>
            @endif
            
            @if(!empty($office['email']))
            <div class="mb-3 d-flex align-items-start">
              <i class="mt-1 bi bi-envelope text-primary me-3"></i>
              <div>
                <h6 class="mb-1 text-muted small">EMAIL</h6>
                <p class="mb-0">{{ $office['email'] }}</p>
              </div>
            </div>
            @endif
            
            <div class="mt-4">
              <div class="d-flex gap-2">
                @if(!empty($office['phone']))
                <a href="tel:{{ $office['phone'] }}" class="btn btn-outline-primary btn-sm rounded-pill flex-fill">
                  <i class="bi bi-telephone me-1"></i>Call
                </a>
                @endif
                @if(!empty($office['email']))
                <a href="mailto:{{ $office['email'] }}" class="btn btn-outline-primary btn-sm rounded-pill flex-fill">
                  <i class="bi bi-envelope me-1"></i>Email
                </a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    
    <!-- Office Hours -->
    <div class="mt-5 row justify-content-center">
      <div class="col-lg-8">
        <div class="p-4 text-center bg-white shadow-sm rounded-4" data-aos="fade-up" data-aos-delay="400">
          <h5 class="mb-3">Office Hours</h5>
          <div class="row g-3">
            <div class="col-md-4">
              <div class="d-flex align-items-center justify-content-center">
                <i class="bi bi-clock text-primary me-2"></i>
                <div class="text-start">
                  <small class="text-muted d-block">Monday - Friday</small>
                  <strong>9:00 AM - 6:00 PM</strong>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="d-flex align-items-center justify-content-center">
                <i class="bi bi-clock text-primary me-2"></i>
                <div class="text-start">
                  <small class="text-muted d-block">Saturday</small>
                  <strong>10:00 AM - 4:00 PM</strong>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="d-flex align-items-center justify-content-center">
                <i class="bi bi-x-circle text-danger me-2"></i>
                <div class="text-start">
                  <small class="text-muted d-block">Sunday</small>
                  <strong>Closed</strong>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Map Section -->
<section class="py-5">
  <div class="container">
    <div class="mb-5 text-center section-header" data-aos="fade-up">
      <h2 class="mb-3">Find Us on Map</h2>
      <p class="text-muted">Get directions to our main office location</p>
    </div>
    
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="map-container" data-aos="fade-up" data-aos-delay="200">
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.0977!2d90.4125181!3d23.7808875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjPCsDQ2JzUxLjIiTiA5MMKwMjQnNDUuMSJF!5e0!3m2!1sen!2sbd!4v1234567890"
            width="100%" 
            height="450" 
            style="border:0; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);" 
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

.contact-quick-item:hover {
  transform: translateY(-5px);
  transition: all 0.3s ease;
  box-shadow: 0 15px 40px rgba(0,0,0,0.1) !important;
}

.contact-quick-item:hover .icon-wrapper {
  transform: scale(1.1);
  transition: all 0.3s ease;
}

.contact-form-box {
  border: 1px solid #e9ecef;
}

.form-control-lg {
  padding: 12px 16px;
  border-radius: 10px;
  border: 2px solid #e9ecef;
  transition: all 0.3s ease;
}

.form-control-lg:focus {
  border-color: #667eea;
  box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
}

.office-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 40px rgba(0,0,0,0.1) !important;
}

.office-card:hover .icon-wrapper {
  transform: scale(1.1);
  transition: all 0.3s ease;
}

.map-container iframe {
  transition: all 0.3s ease;
}

.map-container:hover iframe {
  transform: scale(1.02);
}
</style>


@endsection