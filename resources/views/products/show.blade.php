@extends('layouts.app')

@section('title', $product->meta_title ?: $product->title . ' - ' . App\Models\SiteSetting::get('site_name', 'Technoit'))
@section('description', $product->meta_description ?: $product->description)
@section('keywords', $product->meta_keywords ?: $product->title . ', ' . App\Models\SiteSetting::get('site_name', 'Technoit') . ', products, business solutions')

@section('content')
<!-- Product Hero Section -->
<section class="sticked-header-offset" style="min-height: 70vh; padding-top:130px; background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%), url('{{ asset('assets/images/hero-bg.jpg') }}') center/cover; position: relative;">
  <div class="container">
    <div class="row align-items-center" style="min-height: 70vh;">
      <div class="col-lg-6">
        <div class="hero-content">
          <h1 class="mb-4 text-white" data-aos="fade-up" style="font-size: 3.5rem; font-weight: 700; line-height: 1.2;">{{ $product->title }}</h1>
          <p class="mb-4 fs-5 lead text-white-50" data-aos="fade-up" data-aos-delay="200">{{ $product->description }}</p>
          <div data-aos="fade-up" data-aos-delay="400">
            <a href="#contact-form" class="px-4 py-3 btn btn-primary btn-lg rounded-pill fw-bold">
              <i class="bi bi-play-circle me-2"></i>Request Demo
            </a>
          </div>
        </div>
      </div>
      <div class="py-3 col-lg-6" data-aos="fade-left">
        <div class="text-center hero-image">
          @if($product->image)
          <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="rounded shadow-lg img-fluid" style="min-height: 400px; object-fit: cover;">
          @else
          <img src="{{ asset('assets/images/portfolio/product-1.jpg') }}" alt="{{ $product->title }}" class="rounded shadow-lg img-fluid" style="min-height: 400px; object-fit: cover;">
          @endif
        </div>
      </div>
    </div>
  </div>
</section>

<!-- About Product Section -->
<section class="py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 order-2 order-lg-0 mb-4 mb-lg-0" data-aos="fade-right">
        <div class="about-image">
          @if($product->image)
          <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="rounded shadow img-fluid">
          @else
          <img src="{{ asset('assets/images/portfolio/product-1.jpg') }}" alt="{{ $product->title }}" class="rounded shadow img-fluid">
          @endif
        </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-1" data-aos="fade-left">
        <div class="about-content">
          <h2 class="mb-4">About {{ $product->title }}</h2>
          {{-- <p class="mb-4 text-muted">{{ $product->description }}</p> --}}
          <p class="text-muted">{!! $product->content ?: 'Our ' . $product->title . ' solution is designed to meet the evolving needs of modern businesses. With cutting-edge technology and user-friendly interfaces, we deliver exceptional performance and reliability that you can count on.' !!}</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Product Features Section -->
<section class="py-5">
  <div class="container">
    <div class="mb-5 row justify-content-center">
      <div class="text-center col-lg-8">
        <h2 class="mb-4">Key Features</h2>
        <p class="lead text-muted">Essential features that make our {{ $product['title'] }} stand out</p>
      </div>
    </div>
    
    <div class="row g-4">
@if($product->features && count($product->features) > 0)
      @foreach($product->features as $index => $feature)
      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 200 }}">
        <div class="p-4 text-center bg-white shadow-sm feature-box rounded-4 h-100">
          <div class="mb-3 feature-icon" style="width: 80px; height: 80px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
            <i class="text-white {{ $feature['icon'] ?? 'bi bi-check-circle' }}" style="font-size: 2rem;"></i>
          </div>
          <h5 class="mb-3">{{ $feature['title'] ?? $feature }}</h5>
          <p class="text-muted">{{ $feature['description'] ?? 'Professional implementation for optimal performance' }}</p>
        </div>
      </div>
      @endforeach
@endif
    </div>
  </div>
</section>

<!-- General Sections -->
@if($product->sections && count($product->sections) > 0)
@foreach($product->sections as $index => $section)
<section class="py-5" style="background: {{ $index % 2 == 0 ? '#ffffff' : '#f8f9fa' }};">
  <div class="container">
    <div class="row align-items-center">
      @if($index % 2 == 0)
      <!-- Image Left, Content Right -->
      <div class="col-lg-6" data-aos="fade-right">
        <div class="section-image">
          @if(isset($section['image']) && $section['image'])
          <img src="{{ asset('storage/' . $section['image']) }}" alt="{{ $section['title'] }}" class="rounded shadow img-fluid">
          @else
          <div class="rounded bg-light d-flex align-items-center justify-content-center" style="height: 300px;">
            <i class="{{ $section['icon'] ?? 'bi bi-star' }} text-muted" style="font-size: 4rem;"></i>
          </div>
          @endif
        </div>
      </div>
      <div class="col-lg-6" data-aos="fade-left">
        <div class="section-content ps-lg-4">
          <h3 class="mb-4">{{ $section['title'] }}</h3>
          <p class="text-muted fs-5">{{ $section['description'] }}</p>
        </div>
      </div>
      @else
      <!-- Content Left, Image Right -->
      <div class="col-lg-6" data-aos="fade-right">
        <div class="section-content pe-lg-4">
          <h3 class="mb-4">{{ $section['title'] }}</h3>
          <p class="text-muted fs-5">{{ $section['description'] }}</p>
        </div>
      </div>
      <div class="col-lg-6" data-aos="fade-left">
        <div class="section-image">
          @if(isset($section['image']) && $section['image'])
          <img src="{{ asset('storage/' . $section['image']) }}" alt="{{ $section['title'] }}" class="rounded shadow img-fluid">
          @else
          <div class="rounded bg-light d-flex align-items-center justify-content-center" style="height: 300px;">
            <i class="{{ $section['icon'] ?? 'bi bi-star' }} text-muted" style="font-size: 4rem;"></i>
          </div>
          @endif
        </div>
      </div>
      @endif
    </div>
  </div>
</section>
@endforeach
@endif

<!-- Why Choose Section -->
@if($product->why_choose && count($product->why_choose) > 0)
<section class="py-5" style="background: #f8f9fa;">
  <div class="container">
    <div class="mb-5 row justify-content-center">
      <div class="text-center col-lg-8">
        <h2 class="mb-4">Why Choose {{ $product->title }}?</h2>
        <p class="lead text-muted">Discover what makes our {{ $product->title }} the perfect choice for your business</p>
      </div>
    </div>
    
    <div class="row g-4">
      @foreach($product->why_choose as $index => $reason)
      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 200 }}">
        <div class="p-4 text-center bg-white shadow-sm feature-box rounded-4 h-100">
          <div class="mb-3 feature-icon" style="width: 80px; height: 80px; background: linear-gradient(45deg, #ff6b6b, #ee5a24); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
            <i class="text-white {{ $reason['icon'] ?? 'bi bi-lightning' }}" style="font-size: 2rem;"></i>
          </div>
          <h5 class="mb-3">{{ $reason['title'] }}</h5>
          <p class="text-muted">{{ $reason['description'] }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- CTA Section -->
<section class="py-5" style="background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);">
  <div class="container">
    <div class="text-center row align-items-center">
      <div class="col-lg-12">
        <h2 class="mb-3 text-white">Ready to Get Started with {{ $product['title'] }}?</h2>
        <p class="mb-4 text-white-50 fs-5">Transform your business today with our powerful solution</p>
        <a href="#contact-form" class="px-5 py-3 btn btn-warning btn-lg rounded-pill fw-bold me-3">
          <i class="bi bi-rocket me-2"></i>Get Started Now
        </a>
        <a href="tel:{{ App\Models\SiteSetting::get('contact_phone', '+1234567890') }}" class="px-5 py-3 btn btn-outline-light btn-lg rounded-pill fw-bold">
          <i class="bi bi-telephone me-2"></i>Call Now
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Specifications Section -->
@if($product->specifications && count($product->specifications) > 0)
<section class="py-5">
  <div class="container">
    <div class="mb-5 text-center">
      <h2 class="mb-3">Product Specifications</h2>
      <p class="text-muted">Technical details and specifications of our {{ $product->title }}</p>
    </div>
    
    <div class="row g-4">
      @foreach($product->specifications as $index => $spec)
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 200 }}">
        <div class="p-4 text-center bg-white shadow-sm spec-box rounded-4 h-100">
          <div class="mb-3 spec-icon" style="width: 80px; height: 80px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
            <i class="text-white {{ $spec['icon'] ?? 'bi bi-cpu' }}" style="font-size: 2rem;"></i>
          </div>
          <h5 class="mb-3">{{ $spec['title'] }}</h5>
          <p class="text-muted">{{ $spec['description'] }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- Testimonials Section -->
@if($product->testimonials && count($product->testimonials) > 0)
<section class="py-5" style="background: #f8f9fa;">
  <style>
    .testimonial-box img {
      transition: transform 0.3s ease;
    }
    .testimonial-box:hover img {
      transform: scale(1.1);
    }
  </style>
  <div class="container">
    <div class="mb-5 text-center">
      <h2 class="mb-3">What Our Clients Say</h2>
      <p class="text-muted">Real feedback from satisfied customers using our {{ $product->title }}</p>
    </div>
    
    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
      <div class="carousel-inner">
        @foreach($product->testimonials as $index => $testimonial)
        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="p-4 text-center bg-white shadow-sm testimonial-box rounded-4">
                <div class="mb-3">
                  @if(isset($testimonial['image']) && $testimonial['image'])
                  <img src="{{ asset('storage/' . $testimonial['image']) }}" alt="{{ $testimonial['name'] }}" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                  @else
                  <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background: linear-gradient(45deg, #667eea, #764ba2); color: white; font-size: 2rem; font-weight: bold;">
                    {{ strtoupper(substr($testimonial['name'], 0, 1)) }}
                  </div>
                  @endif
                </div>
                <div class="mb-3">
                  @for($i = 1; $i <= 5; $i++)
                    @if($i <= ($testimonial['rating'] ?? 5))
                      <i class="bi bi-star-fill text-warning"></i>
                    @else
                      <i class="bi bi-star text-muted"></i>
                    @endif
                  @endfor
                </div>
                <p class="mb-4 fs-5 text-muted">"{{ $testimonial['text'] }}"</p>
                <h6 class="mb-1">{{ $testimonial['name'] }}</h6>
                <small class="text-muted">{{ $testimonial['company'] }}</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      @if(count($product->testimonials) > 1)
      <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
      </button>
      @endif
    </div>
  </div>
</section>
@endif

<!-- FAQ Section -->
@if($product->faqs && count($product->faqs) > 0)
<section class="py-5">
  <div class="container">
    <div class="mb-5 text-center">
      <h2 class="mb-3">Frequently Asked Questions</h2>
      <p class="text-muted">Common questions about our {{ $product->title }}</p>
    </div>
    
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="accordion" id="faqAccordion">
          @foreach($product->faqs as $index => $faq)
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $index + 1 }}">
                {{ $faq['question'] }}
              </button>
            </h2>
            <div id="faq{{ $index + 1 }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                {{ $faq['answer'] }}
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
@endif

<!-- Contact Form Section -->
<section id="contact-form" class="py-5" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="mb-5 text-center">
          <h2 class="mb-3 text-white">Get Product Demo</h2>
          <p class="text-white-50 fs-5">Let's discuss your {{ $product->title }} requirements and schedule a demo.</p>
        </div>
        <div class="border-0 shadow-lg card">
          <div class="p-4 card-body">
            <form action="{{ route('contact.store') }}" method="POST">
              @csrf
              <input type="hidden" name="subject" value="Demo Request for {{ $product->title }}">
              <div class="row">
                <div class="mb-3 col-md-6">
                  <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                </div>
                <div class="mb-3 col-md-6">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="mb-3">
                <input type="tel" class="form-control" name="phone" placeholder="Your Phone">
              </div>
              <div class="mb-3">
                <textarea class="form-control" name="message" rows="4" placeholder="Tell us about your requirements" required></textarea>
              </div>
              <div class="text-center">
                <button type="submit" class="px-5 py-3 btn btn-primary btn-lg rounded-pill fw-bold">
                  <i class="bi bi-send me-2"></i>Request Demo
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
.feature-box:hover {
  transform: translateY(-5px);
  transition: all 0.3s ease;
}

.feature-box:hover .feature-icon {
  transform: scale(1.1);
  transition: all 0.3s ease;
}
</style>
@endsection