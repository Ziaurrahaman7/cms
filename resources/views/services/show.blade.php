@extends('layouts.app')

@section('title', $service->meta_title ?: $service->title . ' - ' . App\Models\SiteSetting::get('site_name', 'Technoit'))
@section('description', $service->meta_description ?: $service->description)
@section('keywords', $service->meta_keywords)

@section('content')
<!-- Service Hero Section -->
<section class="ticked-header-offset" style="padding-top:130px;background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('{{ $service->image ? asset('storage/' . $service->image) : asset('assets/images/hero-bg.jpg') }}') center/cover; min-height: 70vh; position: relative;">
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
      <div class="py-3 col-lg-6" data-aos="fade-right">
        <div class="hero-form">
          <div class="border-0 shadow-lg card" style="background: rgba(255,255,255,0.95); backdrop-filter: blur(10px);">
            <div class="p-3 card-body">
              <h5 class="mb-3 text-center card-title">{{ App\Models\SiteSetting::get('consultation_form_title', 'Get Free Consultation') }}</h5>
              <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <input type="hidden" name="subject" value="Inquiry about {{ $service->title }}">
                <div class="mb-2">
                  <input type="text" class="form-control" name="name" placeholder="{{ App\Models\SiteSetting::get('form_name_placeholder', 'Your Name') }}" required>
                </div>
                <div class="mb-2">
                  <input type="email" class="form-control" name="email" placeholder="{{ App\Models\SiteSetting::get('form_email_placeholder', 'Your Email') }}" required>
                </div>
                <div class="mb-2">
                  <input type="tel" class="form-control" name="phone" placeholder="{{ App\Models\SiteSetting::get('form_phone_placeholder', 'Your Phone') }}">
                </div>
                <div class="mb-3">
                  <textarea class="form-control" name="message" rows="3" placeholder="{{ App\Models\SiteSetting::get('form_message_placeholder', 'Tell us about your project') }}" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100 rounded-pill">
                  <i class="bi bi-send me-2"></i>{{ App\Models\SiteSetting::get('form_submit_text', 'Send Inquiry') }}
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
@if($service->key_features && count($service->key_features) > 0)
<section class="py-5">
  <div class="container">
    <div class="mb-5 row justify-content-center">
      <div class="text-center col-lg-8">
        <h2 class="mb-4">Key Features</h2>
        <p class="lead text-muted">Essential features that make our service stand out</p>
      </div>
    </div>
    
    <div class="row g-4">
      @foreach($service->key_features as $index => $feature)
      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 200 }}">
        <div class="overflow-hidden bg-white shadow-sm feature-card rounded-4 h-100">
          <div class="feature-image">
            @if(isset($feature['image']) && $feature['image'])
            <img src="{{ asset('storage/' . $feature['image']) }}" alt="{{ $feature['title'] }}" class="img-fluid w-100" style="height: 200px; object-fit: cover;">
            @else
            <img src="{{ asset('assets/images/features/feature-1.jpg') }}" alt="{{ $feature['title'] }}" class="img-fluid w-100" style="height: 200px; object-fit: cover;">
            @endif
          </div>
          <div class="p-4">
            <h5 class="mb-3">{{ $feature['title'] }}</h5>
            <p class="mb-0 text-muted">{{ Str::limit($feature['description'], 100) }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- CTA Section -->
<section class="py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); position: relative; overflow: hidden;">
  <div class="container position-relative">
    <div class="text-center row align-items-center justify-content-center">
      <div class="col-lg-10">
        <div class="cta-content" data-aos="fade-up">
          <div class="mb-4">
            <div class="mb-3 d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background: rgba(255,255,255,0.2); border-radius: 50%; backdrop-filter: blur(10px);">
              <i class="text-white bi bi-rocket" style="font-size: 2rem;"></i>
            </div>
          </div>
          <h2 class="mb-4 text-white" style="font-size: 3rem; font-weight: 700; line-height: 1.2;">Ready to Get Started?</h2>
          <p class="mx-auto mb-5 text-white-50 fs-5" style="max-width: 600px;">Transform your business with our {{ $service->title }} solutions. Contact us today for a free consultation and let's build something amazing together.</p>
          <div class="cta-buttons" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('contact.index') }}" class="px-5 py-3 mb-3 shadow-lg me-3 btn btn-warning btn-lg rounded-pill fw-bold" style="transform: translateY(0); transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='translateY(0)'">
              <i class="bi bi-send me-2"></i>Get Free Quote
            </a>
            <a href="tel:{{ App\Models\SiteSetting::get('contact_phone', '+1234567890') }}" class="px-5 py-3 mb-3 shadow-lg btn btn-outline-light btn-lg rounded-pill fw-bold" style="transform: translateY(0); transition: all 0.3s ease; border: 2px solid rgba(255,255,255,0.8);" onmouseover="this.style.transform='translateY(-3px)'; this.style.background='rgba(255,255,255,0.1)'" onmouseout="this.style.transform='translateY(0)'; this.style.background='transparent'">
              <i class="bi bi-telephone me-2"></i>Call Now
            </a>
          </div>
          <div class="mt-4">
            <small class="text-white-50"><i class="bi bi-shield-check me-1"></i>100% Satisfaction Guaranteed</small>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Enhanced Background Elements -->
  <div class="position-absolute" style="top: -100px; right: -100px; width: 300px; height: 300px; background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%); border-radius: 50%;"></div>
  <div class="position-absolute" style="bottom: -80px; left: -80px; width: 200px; height: 200px; background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%); border-radius: 50%;"></div>
  <div class="position-absolute" style="top: 50%; left: 10%; width: 100px; height: 100px; background: rgba(255,255,255,0.05); border-radius: 50%; animation: float 6s ease-in-out infinite;"></div>
  <div class="position-absolute" style="top: 20%; right: 15%; width: 60px; height: 60px; background: rgba(255,255,255,0.08); border-radius: 50%; animation: float 4s ease-in-out infinite reverse;"></div>
</section>

<style>
@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-20px); }
}
</style>

<!-- We Serve Section -->
@if($service->we_serve && count($service->we_serve) > 0)
<section class="py-5" style="background: #f8f9fa;">
  <div class="container">
    <div class="mb-5 row justify-content-center">
      <div class="text-center col-lg-8">
        <h2 class="mb-4">We Serve</h2>
        <p class="lead text-muted">Industries and sectors we provide our expertise to</p>
      </div>
    </div>
    
    <div class="row g-4">
      @foreach($service->we_serve as $index => $serve)
      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 200 }}">
        <div class="p-4 text-center bg-white shadow-sm serve-box rounded-4 h-100">
          <div class="mb-3 serve-icon" style="width: 80px; height: 80px; background: linear-gradient(45deg, #ff6b6b, #ee5a24); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
            <i class="text-white {{ $serve['icon'] ?? 'bi bi-building' }}" style="font-size: 2rem;"></i>
          </div>
          <h5 class="mb-3">{{ $serve['title'] }}</h5>
          <p class="mb-0 text-muted">{{ $serve['description'] }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- Service Overview Section -->
@if($service->service_overview && count($service->service_overview) > 0)
<section id="service-overview" class="py-5">
  <div class="container">
    <div class="mb-5 row justify-content-center">
      <div class="text-center col-lg-8">
        <h2 class="mb-4">Why Choose Our {{ $service->title }}?</h2>
        <p class="lead text-muted">We deliver exceptional results with cutting-edge technology and industry expertise</p>
      </div>
    </div>
    
    <div class="row g-4">
      @foreach($service->service_overview as $index => $overview)
      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 200 }}">
        <div class="p-4 text-center feature-box h-100">
          <div class="mb-3 feature-icon" style="width: 80px; height: 80px; background: linear-gradient(45deg, #ff6b6b, #ee5a24); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
            <i class="text-white {{ $overview['icon'] ?? 'bi bi-lightning' }}" style="font-size: 2rem;"></i>
          </div>
          <h5 class="mb-3">{{ $overview['title'] }}</h5>
          <p class="text-muted">{{ $overview['description'] }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif



<!-- Technologies Section -->
@if($service->technologies && count($service->technologies) > 0)
<section class="py-5">
  <div class="container">
    <div class="mb-5 text-center">
      <h2 class="mb-3">Technologies We Use</h2>
      <p class="text-muted">Cutting-edge tools and frameworks for superior results</p>
    </div>
    
    <div class="row g-4">
      @foreach($service->technologies as $index => $tech)
      <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
        <div class="p-3 text-center bg-white rounded shadow-sm tech-item h-100">
          <div class="mb-2 tech-icon" style="width: 60px; height: 60px; background: #f8f9fa; border-radius: 10px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
            <i class="{{ $tech['icon'] ?? 'bi bi-code-slash' }} text-primary" style="font-size: 1.5rem;"></i>
          </div>
          <small class="text-muted">{{ $tech['name'] }}</small>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- Portfolio Section -->
@if($service->portfolio_items && count($service->portfolio_items) > 0)
<section class="py-5">
  <div class="container">
    <div class="mb-5 text-center">
      <h2 class="mb-3">Portfolio</h2>
      <p class="text-muted">Showcasing our recent projects and successful implementations</p>
    </div>
    
    <div class="row g-4">
      @foreach($service->portfolio_items as $index => $item)
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 200 }}">
        <div class="overflow-hidden bg-white shadow-sm portfolio-item rounded-4 h-100">
          <div class="portfolio-image">
            @if(isset($item['image']) && $item['image'])
            <img src="{{ asset('storage/' . $item['image']) }}" alt="Portfolio Image" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
            @else
            <img src="{{ asset('assets/images/portfolio/portfolio-1.jpg') }}" alt="Portfolio Image" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
            @endif
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- Process Section -->
@if($service->process_steps && count($service->process_steps) > 0)
<section class="py-5" style="background: #f8f9fa;">
  <div class="container">
    <div class="mb-5 text-center">
      <h2 class="mb-3">Our Process</h2>
      <p class="text-muted">Step-by-step approach to deliver exceptional results</p>
    </div>
    
    <div class="row g-4">
      @foreach($service->process_steps as $index => $step)
      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 200 }}">
        <div class="text-center process-step">
          <div class="mb-3 step-number" style="width: 80px; height: 80px; background: linear-gradient(45deg, #ff6b6b, #ee5a24); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; color: white; font-size: 1.5rem; font-weight: bold;">{{ str_pad($step['step'], 2, '0', STR_PAD_LEFT) }}</div>
          <div class="mb-3 process-icon" style="width: 60px; height: 60px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
            <i class="text-white {{ $step['icon'] ?? 'bi bi-clipboard-check' }}" style="font-size: 1.5rem;"></i>
          </div>
          <h5 class="mb-3">{{ $step['title'] }}</h5>
          <p class="text-muted">{{ $step['description'] }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

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