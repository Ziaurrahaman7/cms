@extends('layouts.app')

@section('title', $service->meta_title ?: $service->title . ' - ' . App\Models\SiteSetting::get('site_name', 'Technoit'))
@section('description', $service->meta_description ?: $service->description)
@section('keywords', $service->meta_keywords)

@section('content')
<!-- Service Hero Section -->
<section class="hero sticked-header-offset" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('{{ asset('assets/images/hero-bg.jpg') }}') center/cover; min-height: 70vh; position: relative;">
  <div class="container position-relative">
    <div class="row align-items-center" style="min-height: 70vh;">
      <div class="col-lg-6">
        <div class="hero-content">
          <h1 class="mb-4 text-white" data-aos="fade-up" style="font-size: 3.5rem; font-weight: 700; line-height: 1.2;">{{ $service->title }}</h1>
          <p class="mb-4 text-white-50 fs-5 lead" data-aos="fade-up" data-aos-delay="200">{{ $service->description }}</p>
          <div data-aos="fade-up" data-aos-delay="400">
            <a href="{{ route('contact.index') }}" class="px-4 py-3 btn btn-warning btn-lg rounded-pill fw-bold">
              <i class="bi bi-envelope me-2"></i>Contact Us
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg-6" data-aos="fade-right">
        <div class="hero-form">
          <div class="border-0 shadow-lg card" style="background: rgba(255,255,255,0.95); backdrop-filter: blur(10px);">
            <div class="p-4 card-body">
              <h4 class="mb-4 text-center card-title">Get Free Consultation</h4>
              <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <input type="hidden" name="subject" value="Inquiry about {{ $service->title }}">
                <div class="mb-3">
                  <input type="text" class="form-control form-control-lg" name="name" placeholder="Your Name" required>
                </div>
                <div class="mb-3">
                  <input type="email" class="form-control form-control-lg" name="email" placeholder="Your Email" required>
                </div>
                <div class="mb-3">
                  <input type="tel" class="form-control form-control-lg" name="phone" placeholder="Your Phone">
                </div>
                <div class="mb-3">
                  <textarea class="form-control" name="message" rows="4" placeholder="Tell us about your project" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill">
                  <i class="bi bi-send me-2"></i>Send Inquiry
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Our Services Section -->
<section class="py-5" style="background: #f8f9fa;">
  <div class="container">
    <div class="mb-5 row justify-content-center">
      <div class="text-center col-lg-8">
        <h2 class="mb-4">Our Services</h2>
        <p class="lead text-muted">Comprehensive IT solutions to drive your business forward</p>
      </div>
    </div>
    
    <div class="row g-4">
      @php
        $allServices = App\Models\Service::active()->ordered()->take(6)->get();
      @endphp
      @forelse($allServices as $serviceItem)
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index + 1) * 100 }}">
        <div class="p-4 text-center bg-white shadow-sm service-box rounded-4 h-100">
          <div class="mb-3 service-icon" style="width: 80px; height: 80px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
            <i class="text-white bi bi-gear" style="font-size: 2rem;"></i>
          </div>
          <h5 class="mb-3">{{ $serviceItem->title }}</h5>
          <p class="mb-3 text-muted">{{ Str::limit($serviceItem->description, 100) }}</p>
          <a href="{{ route('services.show', $serviceItem->slug) }}" class="px-3 py-2 btn btn-outline-primary rounded-pill">
            Learn More <i class="bi bi-arrow-right ms-1"></i>
          </a>
        </div>
      </div>
      @empty
      <div class="text-center col-12">
        <p class="text-muted">No services available at the moment.</p>
      </div>
      @endforelse
    </div>
  </div>
</section>

<!-- Key Features Section -->
<section class="py-5">
  <div class="container">
    <div class="mb-5 row justify-content-center">
      <div class="text-center col-lg-8">
        <h2 class="mb-4">Key Features</h2>
        <p class="lead text-muted">Essential features that make our service stand out</p>
      </div>
    </div>
    
    <div class="row g-4">
      <div class="col-lg-3 col-md-6" data-aos="fade-up">
        <div class="overflow-hidden bg-white shadow-sm feature-card rounded-4 h-100">
          <div class="feature-image">
            <img src="{{ asset('assets/images/features/feature-1.jpg') }}" alt="Feature 1" class="img-fluid w-100" style="height: 200px; object-fit: cover;">
          </div>
          <div class="p-4">
            <h5 class="mb-3">Advanced Technology</h5>
            <p class="mb-0 text-muted">Cutting-edge tools and frameworks for superior performance and scalability.</p>
          </div>
        </div>
      </div>
      
      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="overflow-hidden bg-white shadow-sm feature-card rounded-4 h-100">
          <div class="feature-image">
            <img src="{{ asset('assets/images/features/feature-2.jpg') }}" alt="Feature 2" class="img-fluid w-100" style="height: 200px; object-fit: cover;">
          </div>
          <div class="p-4">
            <h5 class="mb-3">Expert Support</h5>
            <p class="mb-0 text-muted">24/7 professional support from our experienced technical team.</p>
          </div>
        </div>
      </div>
      
      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
        <div class="overflow-hidden bg-white shadow-sm feature-card rounded-4 h-100">
          <div class="feature-image">
            <img src="{{ asset('assets/images/features/feature-3.jpg') }}" alt="Feature 3" class="img-fluid w-100" style="height: 200px; object-fit: cover;">
          </div>
          <div class="p-4">
            <h5 class="mb-3">Secure & Reliable</h5>
            <p class="mb-0 text-muted">Enterprise-grade security with 99.9% uptime guarantee.</p>
          </div>
        </div>
      </div>
      
      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="600">
        <div class="overflow-hidden bg-white shadow-sm feature-card rounded-4 h-100">
          <div class="feature-image">
            <img src="{{ asset('assets/images/features/feature-4.jpg') }}" alt="Feature 4" class="img-fluid w-100" style="height: 200px; object-fit: cover;">
          </div>
          <div class="p-4">
            <h5 class="mb-3">Cost Effective</h5>
            <p class="mb-0 text-muted">Competitive pricing with flexible payment options and no hidden costs.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); position: relative; overflow: hidden;">
  <div class="container position-relative">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <div class="cta-content" data-aos="fade-right">
          <h2 class="mb-3 text-white" style="font-size: 2.5rem; font-weight: 700;">Ready to Get Started?</h2>
          <p class="mb-0 text-white-50 fs-5">Transform your business with our {{ $service->title }} solutions. Contact us today for a free consultation.</p>
        </div>
      </div>
      <div class="mt-4 text-center col-lg-4 text-lg-end mt-lg-0">
        <div class="cta-buttons" data-aos="fade-left">
          <a href="{{ route('contact.index') }}" class="px-4 py-3 mb-2 btn btn-warning btn-lg rounded-pill me-3 fw-bold">
            <i class="bi bi-rocket me-2"></i>Start Project
          </a>
          <a href="tel:{{ App\Models\SiteSetting::get('contact_phone', '+1234567890') }}" class="px-4 py-3 mb-2 btn btn-outline-light btn-lg rounded-pill">
            <i class="bi bi-telephone me-2"></i>Call Now
          </a>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Background Elements -->
  <div class="position-absolute" style="top: -50px; right: -50px; width: 200px; height: 200px; background: rgba(255,255,255,0.1); border-radius: 50%; opacity: 0.5;"></div>
  <div class="position-absolute" style="bottom: -30px; left: -30px; width: 150px; height: 150px; background: rgba(255,255,255,0.05); border-radius: 50%; opacity: 0.7;"></div>
</section>

<!-- We Serve Section -->
<section class="py-5" style="background: #f8f9fa;">
  <div class="container">
    <div class="mb-5 row justify-content-center">
      <div class="text-center col-lg-8">
        <h2 class="mb-4">We Serve</h2>
        <p class="lead text-muted">Industries and sectors we provide our expertise to</p>
      </div>
    </div>
    
    <div class="row g-4">
      <div class="col-lg-3 col-md-6" data-aos="fade-up">
        <div class="p-4 text-center bg-white shadow-sm serve-box rounded-4 h-100">
          <div class="mb-3 serve-icon" style="width: 80px; height: 80px; background: linear-gradient(45deg, #ff6b6b, #ee5a24); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
            <i class="text-white bi bi-building" style="font-size: 2rem;"></i>
          </div>
          <h5 class="mb-3">Enterprise</h5>
          <p class="mb-0 text-muted">Large-scale enterprise solutions for complex business requirements and operations.</p>
        </div>
      </div>
      
      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="p-4 text-center bg-white shadow-sm serve-box rounded-4 h-100">
          <div class="mb-3 serve-icon" style="width: 80px; height: 80px; background: linear-gradient(45deg, #4ecdc4, #44a08d); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
            <i class="text-white bi bi-shop" style="font-size: 2rem;"></i>
          </div>
          <h5 class="mb-3">Small Business</h5>
          <p class="mb-0 text-muted">Tailored solutions for small and medium businesses to grow and scale efficiently.</p>
        </div>
      </div>
      
      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
        <div class="p-4 text-center bg-white shadow-sm serve-box rounded-4 h-100">
          <div class="mb-3 serve-icon" style="width: 80px; height: 80px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
            <i class="text-white bi bi-person-workspace" style="font-size: 2rem;"></i>
          </div>
          <h5 class="mb-3">Startups</h5>
          <p class="mb-0 text-muted">Innovative solutions for startups to launch and establish their digital presence.</p>
        </div>
      </div>
      
      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="600">
        <div class="p-4 text-center bg-white shadow-sm serve-box rounded-4 h-100">
          <div class="mb-3 serve-icon" style="width: 80px; height: 80px; background: linear-gradient(45deg, #f093fb, #f5576c); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
            <i class="text-white bi bi-bank" style="font-size: 2rem;"></i>
          </div>
          <h5 class="mb-3">Government</h5>
          <p class="mb-0 text-muted">Secure and compliant solutions for government agencies and public sector.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Service Overview Section -->
<section id="service-overview" class="py-5">
  <div class="container">
    <div class="mb-5 row justify-content-center">
      <div class="text-center col-lg-8">
        <h2 class="mb-4">Why Choose Our {{ $service->title }}?</h2>
        <p class="lead text-muted">We deliver exceptional results with cutting-edge technology and industry expertise</p>
      </div>
    </div>
    
    <div class="row g-4">
      <div class="col-lg-3 col-md-6" data-aos="fade-up">
        <div class="p-4 text-center feature-box h-100">
          <div class="mb-3 feature-icon" style="width: 80px; height: 80px; background: linear-gradient(45deg, #ff6b6b, #ee5a24); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
            <i class="text-white bi bi-lightning" style="font-size: 2rem;"></i>
          </div>
          <h5 class="mb-3">Fast Delivery</h5>
          <p class="text-muted">Quick turnaround time without compromising quality</p>
        </div>
      </div>
      
      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="p-4 text-center feature-box h-100">
          <div class="mb-3 feature-icon" style="width: 80px; height: 80px; background: linear-gradient(45deg, #4ecdc4, #44a08d); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
            <i class="text-white bi bi-shield-check" style="font-size: 2rem;"></i>
          </div>
          <h5 class="mb-3">Quality Assured</h5>
          <p class="text-muted">Rigorous testing and quality control processes</p>
        </div>
      </div>
      
      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
        <div class="p-4 text-center feature-box h-100">
          <div class="mb-3 feature-icon" style="width: 80px; height: 80px; background: linear-gradient(45deg, #a8edea, #fed6e3); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
            <i class="bi bi-people text-dark" style="font-size: 2rem;"></i>
          </div>
          <h5 class="mb-3">Expert Team</h5>
          <p class="text-muted">Experienced professionals with proven track record</p>
        </div>
      </div>
      
      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="600">
        <div class="p-4 text-center feature-box h-100">
          <div class="mb-3 feature-icon" style="width: 80px; height: 80px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
            <i class="text-white bi bi-headset" style="font-size: 2rem;"></i>
          </div>
          <h5 class="mb-3">24/7 Support</h5>
          <p class="text-muted">Round-the-clock support and maintenance</p>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- Technologies Section -->
<section class="py-5">
  <div class="container">
    <div class="mb-5 text-center">
      <h2 class="mb-3">Technologies We Use</h2>
      <p class="text-muted">Cutting-edge tools and frameworks for superior results</p>
    </div>
    
    <div class="row g-4">
      <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up">
        <div class="p-3 text-center bg-white rounded shadow-sm tech-item h-100">
          <div class="mb-2 tech-icon" style="width: 60px; height: 60px; background: #f8f9fa; border-radius: 10px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
            <i class="bi bi-code-slash text-primary" style="font-size: 1.5rem;"></i>
          </div>
          <small class="text-muted">HTML5/CSS3</small>
        </div>
      </div>
      
      <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="100">
        <div class="p-3 text-center bg-white rounded shadow-sm tech-item h-100">
          <div class="mb-2 tech-icon" style="width: 60px; height: 60px; background: #f8f9fa; border-radius: 10px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
            <i class="bi bi-filetype-js text-warning" style="font-size: 1.5rem;"></i>
          </div>
          <small class="text-muted">JavaScript</small>
        </div>
      </div>
      
      <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="200">
        <div class="p-3 text-center bg-white rounded shadow-sm tech-item h-100">
          <div class="mb-2 tech-icon" style="width: 60px; height: 60px; background: #f8f9fa; border-radius: 10px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
            <i class="bi bi-bootstrap text-purple" style="font-size: 1.5rem;"></i>
          </div>
          <small class="text-muted">Bootstrap</small>
        </div>
      </div>
      
      <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="300">
        <div class="p-3 text-center bg-white rounded shadow-sm tech-item h-100">
          <div class="mb-2 tech-icon" style="width: 60px; height: 60px; background: #f8f9fa; border-radius: 10px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
            <i class="bi bi-database text-success" style="font-size: 1.5rem;"></i>
          </div>
          <small class="text-muted">Database</small>
        </div>
      </div>
      
      <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="400">
        <div class="p-3 text-center bg-white rounded shadow-sm tech-item h-100">
          <div class="mb-2 tech-icon" style="width: 60px; height: 60px; background: #f8f9fa; border-radius: 10px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
            <i class="bi bi-cloud text-info" style="font-size: 1.5rem;"></i>
          </div>
          <small class="text-muted">Cloud</small>
        </div>
      </div>
      
      <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="500">
        <div class="p-3 text-center bg-white rounded shadow-sm tech-item h-100">
          <div class="mb-2 tech-icon" style="width: 60px; height: 60px; background: #f8f9fa; border-radius: 10px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
            <i class="bi bi-gear text-dark" style="font-size: 1.5rem;"></i>
          </div>
          <small class="text-muted">DevOps</small>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Portfolio Section -->
<section class="py-5">
  <div class="container">
    <div class="mb-5 text-center">
      <h2 class="mb-3">Portfolio</h2>
      <p class="text-muted">Showcasing our recent projects and successful implementations</p>
    </div>
    
    <div class="row g-4">
      <div class="col-lg-4 col-md-6" data-aos="fade-up">
        <div class="overflow-hidden bg-white shadow-sm portfolio-item rounded-4 h-100">
          <div class="portfolio-image">
            <img src="{{ asset('assets/images/portfolio/portfolio-1.jpg') }}" alt="Project 1" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
          </div>
          <div class="p-4">
            <h5 class="mb-2">E-commerce Platform</h5>
            <p class="mb-3 text-muted">Modern online shopping platform with advanced features</p>
            <span class="badge bg-primary">Web Development</span>
          </div>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="overflow-hidden bg-white shadow-sm portfolio-item rounded-4 h-100">
          <div class="portfolio-image">
            <img src="{{ asset('assets/images/portfolio/portfolio-2.jpg') }}" alt="Project 2" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
          </div>
          <div class="p-4">
            <h5 class="mb-2">Mobile Banking App</h5>
            <p class="mb-3 text-muted">Secure mobile banking solution with biometric authentication</p>
            <span class="badge bg-success">Mobile App</span>
          </div>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
        <div class="overflow-hidden bg-white shadow-sm portfolio-item rounded-4 h-100">
          <div class="portfolio-image">
            <img src="{{ asset('assets/images/portfolio/portfolio-3.jpg') }}" alt="Project 3" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
          </div>
          <div class="p-4">
            <h5 class="mb-2">ERP Management System</h5>
            <p class="mb-3 text-muted">Comprehensive enterprise resource planning solution</p>
            <span class="badge bg-warning text-dark">ERP System</span>
          </div>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
        <div class="overflow-hidden bg-white shadow-sm portfolio-item rounded-4 h-100">
          <div class="portfolio-image">
            <img src="{{ asset('assets/images/portfolio/portfolio-4.jpg') }}" alt="Project 4" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
          </div>
          <div class="p-4">
            <h5 class="mb-2">Cloud Infrastructure</h5>
            <p class="mb-3 text-muted">Scalable cloud architecture for high-performance applications</p>
            <span class="badge bg-info">Cloud Services</span>
          </div>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="800">
        <div class="overflow-hidden bg-white shadow-sm portfolio-item rounded-4 h-100">
          <div class="portfolio-image">
            <img src="{{ asset('assets/images/portfolio/portfolio-5.jpg') }}" alt="Project 5" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
          </div>
          <div class="p-4">
            <h5 class="mb-2">Healthcare Management</h5>
            <p class="mb-3 text-muted">Digital healthcare platform for patient management</p>
            <span class="badge bg-danger">Healthcare</span>
          </div>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="1000">
        <div class="overflow-hidden bg-white shadow-sm portfolio-item rounded-4 h-100">
          <div class="portfolio-image">
            <img src="{{ asset('assets/images/portfolio/portfolio-6.jpg') }}" alt="Project 6" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
          </div>
          <div class="p-4">
            <h5 class="mb-2">Learning Management System</h5>
            <p class="mb-3 text-muted">Online education platform with interactive features</p>
            <span class="badge bg-secondary">Education</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Process Section -->
<section class="py-5" style="background: #f8f9fa;">
  <div class="container">
    <div class="mb-5 text-center">
      <h2 class="mb-3">Our Development Process</h2>
      <p class="text-muted">A proven methodology that ensures project success</p>
    </div>
    
    <div class="row g-4">
      <div class="col-lg-3 col-md-6" data-aos="fade-up">
        <div class="text-center process-step">
          <div class="mb-3 step-number" style="width: 80px; height: 80px; background: linear-gradient(45deg, #ff6b6b, #ee5a24); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; color: white; font-size: 1.5rem; font-weight: bold;">01</div>
          <h5 class="mb-3">Discovery</h5>
          <p class="text-muted">Understanding your business needs and project requirements</p>
        </div>
      </div>
      
      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="text-center process-step">
          <div class="mb-3 step-number" style="width: 80px; height: 80px; background: linear-gradient(45deg, #4ecdc4, #44a08d); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; color: white; font-size: 1.5rem; font-weight: bold;">02</div>
          <h5 class="mb-3">Planning</h5>
          <p class="text-muted">Creating detailed project roadmap and technical specifications</p>
        </div>
      </div>
      
      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
        <div class="text-center process-step">
          <div class="mb-3 step-number" style="width: 80px; height: 80px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; color: white; font-size: 1.5rem; font-weight: bold;">03</div>
          <h5 class="mb-3">Development</h5>
          <p class="text-muted">Building your solution with agile development methodology</p>
        </div>
      </div>
      
      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="600">
        <div class="text-center process-step">
          <div class="mb-3 step-number" style="width: 80px; height: 80px; background: linear-gradient(45deg, #f093fb, #f5576c); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; color: white; font-size: 1.5rem; font-weight: bold;">04</div>
          <h5 class="mb-3">Delivery</h5>
          <p class="text-muted">Testing, deployment, and ongoing support for your project</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="py-5" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <h2 class="mb-3 text-white">Ready to Transform Your Business?</h2>
        <p class="mb-0 text-white-50 fs-5">Let's discuss your {{ $service->title }} project and create something amazing together.</p>
      </div>
      <div class="col-lg-4 text-lg-end">
        <div class="gap-3 d-flex justify-content-lg-end justify-content-center">
          <a href="{{ route('contact.index') }}" class="px-4 py-3 btn btn-warning btn-lg rounded-pill fw-bold">
            <i class="bi bi-rocket me-2"></i>Start Project
          </a>
          <a href="tel:{{ App\Models\SiteSetting::get('contact_phone', '+1234567890') }}" class="px-4 py-3 btn btn-outline-light btn-lg rounded-pill">
            <i class="bi bi-telephone me-2"></i>Call Now
          </a>
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

.hover-bg-light:hover {
  background-color: #f8f9fa !important;
  transition: all 0.3s ease;
}

.feature-box:hover,
.tech-item:hover,
.service-box:hover,
.feature-card:hover,
.serve-box:hover,
.portfolio-item:hover {
  transform: translateY(-5px);
  transition: all 0.3s ease;
}

.service-box:hover .service-icon,
.serve-box:hover .serve-icon {
  transform: scale(1.1);
  transition: all 0.3s ease;
}

.feature-card:hover .feature-image img,
.portfolio-item:hover .portfolio-image img {
  transform: scale(1.05);
  transition: all 0.3s ease;
}

.process-step:hover .step-number {
  transform: scale(1.1);
  transition: all 0.3s ease;
}

.hero-stats .stat-item {
  border-right: 1px solid rgba(255,255,255,0.2);
  padding-right: 1rem;
}

.hero-stats .stat-item:last-child {
  border-right: none;
}

@media (max-width: 768px) {
  .hero-stats {
    flex-direction: column;
    gap: 1rem !important;
  }
  
  .hero-stats .stat-item {
    border-right: none;
    border-bottom: 1px solid rgba(255,255,255,0.2);
    padding-bottom: 1rem;
    padding-right: 0;
  }
  
  .hero-stats .stat-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
  }
}
</style>
@endsection