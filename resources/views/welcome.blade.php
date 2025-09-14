@extends('layouts.app')

@section('content')
<!--  Hero Section  -->
<section id="hero" class="hero sticked-header-offset" style="@php $heroBg = App\Models\SiteSetting::get('hero_bg_image'); @endphp @if($heroBg && file_exists(public_path('storage/' . $heroBg))) background-image: url('{{ asset('storage/' . $heroBg) }}'); background-size: cover; background-position: center; background-attachment: fixed; @endif">
  @if(!$heroBg || !file_exists(public_path('storage/' . $heroBg)))
  <div id="particles-js"></div>
  <div id="repulse-circle-div"></div>
  @endif
  <div class="container position-relative">
    <div class="row gy-5 aos-init aos-animate">
      <div class="text-left col-lg-7 offset-lg-5 dark-bg order-lg-1 d-flex flex-column justify-content-start caption">
        <h2 data-aos="fade-up">{{ App\Models\SiteSetting::get('hero_title', 'Delivering Superior Services IT Solutions') }}<span class="circle" data-aos="fade-right" data-aos-delay="800">.</span></h2>
        <p data-aos="fade-up" data-aos-delay="400">{{ App\Models\SiteSetting::get('hero_subtitle', 'You can easily change any design to your own. It is also highly customizable SEO friendly template.') }}</p>
        <div class="social" data-aos="fade-up" data-aos-delay="600">
          @if(App\Models\SiteSetting::get('social_twitter'))
            <a href="{{ App\Models\SiteSetting::get('social_twitter') }}" target="_blank"><i class="bi bi-twitter-x"></i></a>
          @endif
          @if(App\Models\SiteSetting::get('social_facebook'))
            <a href="{{ App\Models\SiteSetting::get('social_facebook') }}" target="_blank"><i class="bi bi-facebook"></i></a>
          @endif
          @if(App\Models\SiteSetting::get('social_linkedin'))
            <a href="{{ App\Models\SiteSetting::get('social_linkedin') }}" target="_blank"><i class="bi bi-linkedin"></i></a>
          @endif
          @if(App\Models\SiteSetting::get('social_instagram'))
            <a href="{{ App\Models\SiteSetting::get('social_instagram') }}" target="_blank"><i class="bi bi-instagram"></i></a>
          @endif
          @if(App\Models\SiteSetting::get('social_youtube'))
            <a href="{{ App\Models\SiteSetting::get('social_youtube') }}" target="_blank"><i class="bi bi-youtube"></i></a>
          @endif
        </div>
        <div class="d-flex justify-content-start">
          <a href="{{ App\Models\SiteSetting::get('hero_button_link', '#contact') }}" class="mr-20 btn-get-started" data-aos="fade-up" data-aos-delay="800">{{ App\Models\SiteSetting::get('hero_button_text', 'Get Quotes') }}</a>
          <a href="#services" class="btn-get-started" data-aos="fade-up" data-aos-delay="1000">Get Started</a>
        </div>
      </div>
    </div>
  </div>
</section>

<main id="main">
  <!-- Start Service Section -->
  <div id="services" class="py-5 section" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="container">
      <div class="mb-5 text-center section-header">
        <h2 class="mb-3 text-white">Services We Offer</h2>
        <p class="text-white-50">Professional IT solutions tailored to your business needs</p>
      </div>
      
      <div class="row g-4">
        @php
          $services = App\Models\Service::active()->ordered()->get();
        @endphp
        
        @forelse($services as $service)
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index + 1) * 100 }}">
          <div class="overflow-hidden bg-white shadow-lg service-card h-100 rounded-4" style="transition: all 0.3s ease; border: none;">
            <div class="service-image position-relative" style="height: 200px; overflow: hidden;">
              @if($service->image && file_exists(public_path('storage/services/' . $service->image)))
                <img src="{{ asset('storage/services/' . $service->image) }}" class="w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="{{ $service->title }}">
              @else
                <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background: linear-gradient(45deg, #f093fb 0%, #f5576c 100%);">
                  @if($service->icon)
                    <i class="{{ $service->icon }} text-white" style="font-size: 3rem;"></i>
                  @else
                    <svg class="text-white" width="60" height="60" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                    </svg>
                  @endif
                </div>
              @endif
              <div class="top-0 service-overlay position-absolute start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(0,0,0,0.7); opacity: 0; transition: all 0.3s ease;">
                <span class="text-white fw-bold">Learn More</span>
              </div>
            </div>
            
            <div class="p-4 card-body">
              <h4 class="mb-3 card-title fw-bold" style="color: #2c3e50;">{{ $service->title }}</h4>
              <p class="mb-4 card-text text-muted">{{ $service->description }}</p>
              <div class="d-flex align-items-center justify-content-between">
                <a href="{{ route('services.show', $service->slug) }}" class="px-4 py-2 btn btn-primary btn-sm rounded-pill" style="background: linear-gradient(45deg, #667eea, #764ba2); border: none;">
                  Learn More
                </a>
                <div class="service-number text-muted fw-bold" style="font-size: 2rem; opacity: 0.1;">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
              </div>
            </div>
          </div>
        </div>
        @empty
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="overflow-hidden bg-white shadow-lg service-card h-100 rounded-4">
            <div class="service-image position-relative" style="height: 200px; background: linear-gradient(45deg, #f093fb 0%, #f5576c 100%);">
              <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                <svg class="text-white" width="60" height="60" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
              </div>
            </div>
            <div class="p-4 card-body">
              <h4 class="mb-3 card-title fw-bold">Web Development</h4>
              <p class="mb-4 card-text text-muted">Professional web development services using modern technologies and best practices.</p>
              <div class="d-flex align-items-center justify-content-between">
                <a href="{{ route('contact.index') }}" class="px-4 py-2 btn btn-primary btn-sm rounded-pill">Get Started</a>
                <div class="service-number text-muted fw-bold" style="font-size: 2rem; opacity: 0.1;">01</div>
              </div>
            </div>
          </div>
        </div>
        @endforelse
      </div>
    </div>
  </div>
  
  <style>
    .service-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
    }
    .service-card:hover .service-image img {
      transform: scale(1.1);
    }
    .service-card:hover .service-overlay {
      opacity: 1;
    }
  </style>

  <!-- Featured -->
  <section>
    <div class="container" id="featured">
        <div class="section-header" data-aos="fade-up" data-aos-delay="100">
          <h2>Why Choose Us</h2>
          <p>Discover what makes us the perfect choice for your business</p>
        </div>
    <div class="row">
      @php
        $leftFeatures = App\Models\Feature::active()->position('left')->ordered()->get();
        $rightFeatures = App\Models\Feature::active()->position('right')->ordered()->get();
      @endphp
      
      <div class="col-md-4 left">
        @forelse($leftFeatures as $feature)
        <div class="list-wrap" data-aos="fade-up" data-aos-delay="{{ ($loop->index + 1) * 100 }}">
          <div class="description">
            <h4>{{ $feature->title }}</h4>
            <p>{{ $feature->description }}</p>
          </div>
          <div class="icon">
            @if($feature->icon)
              <div class="icon-wrapper" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%; margin: 0 auto;">
                <i class="{{ $feature->icon }}" style="font-size: 1.8rem; color: white;"></i>
              </div>
            @else
              <img src="{{ asset('assets/images/icons/icon-' . ($loop->index + 1) . '.svg') }}" alt="icon">
            @endif
          </div>
        </div>
        @empty
        <div class="list-wrap" data-aos="fade-up" data-aos-delay="100">
          <div class="description">
            <h4>Experience</h4>
            <p>Years of expertise in delivering quality IT solutions and services.</p>
          </div>
          <div class="icon">
            <img src="{{ asset('assets/images/icons/icon-1.svg') }}" alt="icon">
          </div>
        </div>
        @endforelse
      </div>
      
      <div class="p-4 col-md-4 p-sm-5 center">
        <div class="list-center-wrap" data-aos="fade-up" data-aos-delay="100">
          <div class="center-icon">
            <img src="{{ asset('assets/images/features.jpg') }}" alt="icon">
          </div>
        </div>
      </div>
      
      <div class="col-md-4 right">
        @forelse($rightFeatures as $feature)
        <div class="list-wrap" data-aos="fade-up" data-aos-delay="{{ ($loop->index + 1) * 100 }}">
          <div class="icon">
            @if($feature->icon)
              <div class="icon-wrapper" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%; margin: 0 auto;">
                <i class="{{ $feature->icon }}" style="font-size: 1.8rem; color: white;"></i>
              </div>
            @else
              <img src="{{ asset('assets/images/icons/icon-' . ($loop->index + 4) . '.svg') }}" alt="icon">
            @endif
          </div>
          <div class="description">
            <h4>{{ $feature->title }}</h4>
            <p>{{ $feature->description }}</p>
          </div>
        </div>
        @empty
        <div class="list-wrap" data-aos="fade-up" data-aos-delay="100">
          <div class="icon">
            <img src="{{ asset('assets/images/icons/icon-4.svg') }}" alt="icon">
          </div>
          <div class="description">
            <h4>Quality</h4>
            <p>Committed to delivering high-quality solutions that exceed expectations.</p>
          </div>
        </div>
        @endforelse
      </div>
    </div>
  </div>
</section>

<!-- Portfolio Section -->
<section id="portfolio" class="portfolio">
  <div class="container" data-aos="fade-up">
    <div class="section-header">
      <h2>Our Portfolio</h2>
      <p>Showcasing our best work and successful projects</p>
    </div>
    <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">
      <div>
        <ul class="portfolio-flters">
          <li data-filter="*" class="filter-active">All</li>
          @php
            $portfolioCategories = App\Models\PortfolioCategory::active()->ordered()->get();
          @endphp
          @foreach($portfolioCategories as $category)
            <li data-filter=".filter-{{ $category->slug }}">{{ $category->name }}</li>
          @endforeach
        </ul>
      </div>
      <div class="row gy-4 portfolio-container">
        @php
          $portfolios = App\Models\Portfolio::active()->ordered()->get();
        @endphp
        
        @forelse($portfolios as $portfolio)
        <div class="col-xl-4 col-md-6 portfolio-item filter-{{ $portfolio->category }}">
          <div class="overflow-hidden portfolio-wrap position-relative">
            @if($portfolio->image && file_exists(public_path('storage/portfolios/' . $portfolio->image)))
              <a href="{{ asset('storage/portfolios/' . $portfolio->image) }}" class="glightbox" data-gallery="portfolio-gallery" data-glightbox="title: {{ $portfolio->title }}; description: {{ $portfolio->description }}">
                <img src="{{ asset('storage/portfolios/' . $portfolio->image) }}" class="img-fluid" alt="{{ $portfolio->title }}" style="transition: transform 0.3s ease;">
              </a>
            @else
              <a href="{{ asset('assets/images/portfolio/product-' . (($loop->index % 6) + 1) . '.jpg') }}" class="glightbox" data-gallery="portfolio-gallery" data-glightbox="title: {{ $portfolio->title }}; description: {{ $portfolio->description }}">
                <img src="{{ asset('assets/images/portfolio/product-' . (($loop->index % 6) + 1) . '.jpg') }}" class="img-fluid" alt="{{ $portfolio->title }}" style="transition: transform 0.3s ease;">
              </a>
            @endif
            <div class="top-0 portfolio-overlay position-absolute start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(0,0,0,0.7); opacity: 0; transition: all 0.3s ease; pointer-events: none;">
              <div class="text-center text-white">
                <h5 class="mb-2">{{ $portfolio->title }}</h5>
                <p class="mb-3">{{ Str::limit($portfolio->description, 50) }}</p>
                @if($portfolio->project_url)
                  <a href="{{ $portfolio->project_url }}" target="_blank" class="btn btn-outline-light btn-sm" style="pointer-events: all;"><i class="bi bi-link-45deg"></i> Visit</a>
                @endif
              </div>
            </div>
          </div>
        </div>
        @empty
        <div class="col-xl-4 col-md-6 portfolio-item filter-app">
          <div class="overflow-hidden portfolio-wrap position-relative">
            <a href="{{ asset('assets/images/portfolio/product-1.jpg') }}" class="glightbox" data-gallery="portfolio-gallery" data-glightbox="title: Sample Project; description: Professional web development">
              <img src="{{ asset('assets/images/portfolio/product-1.jpg') }}" class="img-fluid" alt="Sample Project" style="transition: transform 0.3s ease;">
            </a>
            <div class="top-0 portfolio-overlay position-absolute start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(0,0,0,0.7); opacity: 0; transition: all 0.3s ease; pointer-events: none;">
              <div class="text-center text-white">
                <h5 class="mb-2">Sample Project</h5>
                <p class="mb-3">Professional web development</p>
              </div>
            </div>
          </div>
        </div>
        @endforelse
      </div>
    </div>
  </div>
</section>

<!-- Start Pricing Section -->
<div id="pricing" class="pricing section">
  <div class="container-fluid">
    <div class="container">
      <div class="section-header">
        <h2>Pricing Plans</h2>
        <p>Choose the perfect plan for your needs</p>
      </div>
      <div class="row">
        @php
          $pricingPlans = App\Models\PricingPlan::active()->ordered()->get();
        @endphp
        
        @forelse($pricingPlans as $plan)
        <div class="col-lg-4">
          <div class="card text-center {{ $plan->is_popular ? 'popular' : '' }}">
            @if($plan->is_popular)
              <div class="popular-badge">Most Popular</div>
            @endif
            <div class="title">
              <h2>{{ $plan->name }}</h2>
              @if($plan->description)
                <p class="plan-desc">{{ $plan->description }}</p>
              @endif
            </div>
            <div class="price">
              <h4>
                @if($plan->currency === 'BDT')
                  <sup>৳</sup>{{ number_format($plan->price, 0) }}
                @elseif($plan->currency === 'EUR')
                  <sup>€</sup>{{ number_format($plan->price, 2) }}
                @else
                  <sup>$</sup>{{ number_format($plan->price, 2) }}
                @endif
              </h4>
              <span class="period">per {{ $plan->period }}</span>
            </div>
            <div class="option">
              <ul>
                @foreach($plan->features as $feature)
                  <li><i class="bi bi-check-circle" aria-hidden="true"></i> {{ $feature }}</li>
                @endforeach
              </ul>
            </div>
            <a href="{{ route('contact.index') }}" class="{{ $plan->is_popular ? 'btn-popular' : '' }}">Order Now</a>
          </div>
        </div>
        @empty
        <div class="col-lg-4">
          <div class="text-center card">
            <div class="title">
              <h2>Basic</h2>
            </div>
            <div class="price">
              <h4><sup>$</sup>25</h4>
            </div>
            <div class="option">
              <ul>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> 5 GB Storage</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> 10 Email Accounts</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> Basic Support</li>
              </ul>
            </div>
            <a href="#">Order Now</a>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="text-center card popular">
            <div class="popular-badge">Most Popular</div>
            <div class="title">
              <h2>Standard</h2>
            </div>
            <div class="price">
              <h4><sup>$</sup>50</h4>
            </div>
            <div class="option">
              <ul>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> 50 GB Storage</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> 50 Email Accounts</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> Priority Support</li>
              </ul>
            </div>
            <a href="#" class="btn-popular">Order Now</a>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="text-center card">
            <div class="title">
              <h2>Premium</h2>
            </div>
            <div class="price">
              <h4><sup>$</sup>100</h4>
            </div>
            <div class="option">
              <ul>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> Unlimited Storage</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> Unlimited Email</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> 24/7 Support</li>
              </ul>
            </div>
            <a href="#">Order Now</a>
          </div>
        </div>
        @endforelse
      </div>
    </div>
  </div>
</div>

<!--  Testimonials Section  -->
<section id="testimonials" class="testimonials">
  <div class="container" data-aos="fade-up">
    <div class="section-header">
      <h2>Testimonials</h2>
      <p>What our clients say about our services</p>
    </div>
    <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">
        @php
          $testimonials = App\Models\Testimonial::active()->ordered()->get();
        @endphp
        
        @forelse($testimonials as $testimonial)
        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="testimonial-item">
              <div class="d-flex align-items-center info-box">
                @if($testimonial->image && file_exists(public_path('storage/testimonials/' . $testimonial->image)))
                  <img src="{{ asset('storage/testimonials/' . $testimonial->image) }}" class="flex-shrink-0 testimonial-img" alt="{{ $testimonial->name }}">
                @else
                  <img src="{{ asset('assets/images/testimonials/testimonial-' . (($loop->index % 4) + 1) . '.jpg') }}" class="flex-shrink-0 testimonial-img" alt="{{ $testimonial->name }}">
                @endif
                <div>
                  <h3>{{ $testimonial->name }}</h3>
                  <h4>{{ $testimonial->position }}</h4>
                  <div class="stars">
                    @for($i = 1; $i <= 5; $i++)
                      <i class="bi bi-star{{ $i <= $testimonial->rating ? '-fill' : '' }}"></i>
                    @endfor
                  </div>
                </div>
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                {{ Str::limit($testimonial->message, 150) }}
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div>
        </div>
        @empty
        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="testimonial-item">
              <div class="d-flex align-items-center info-box">
                <img src="{{ asset('assets/images/testimonials/testimonial-1.jpg') }}" class="flex-shrink-0 testimonial-img" alt="">
                <div>
                  <h3>John Doe</h3>
                  <h4>CEO</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                </div>
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                Excellent service and professional team. They delivered exactly what we needed on time and within budget.
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div>
        </div>
        @endforelse
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>

<!-- Promotions Section -->
<section id="promotions" class="py-5" style="background: #f8f9fa;">
  <div class="container">
    <div class="mb-5 text-center section-header">
      <h2 class="mb-3">Special Promotions</h2>
      <p class="text-muted">Limited time offers and exclusive deals for our valued clients</p>
    </div>
    
    <div class="row g-4">
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="overflow-hidden bg-white shadow-lg promotion-card rounded-4 h-100 position-relative">
          <div class="top-0 px-3 py-1 text-white promotion-badge position-absolute end-0 bg-danger rounded-bottom-start">
            <small class="fw-bold">50% OFF</small>
          </div>
          <div class="p-4 card-body">
            <div class="mb-3 promotion-icon">
              <div class="icon-wrapper" style="width: 60px; height: 60px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                <i class="text-white bi bi-code-slash" style="font-size: 1.5rem;"></i>
              </div>
            </div>
            <h4 class="mb-3 fw-bold">Web Development Package</h4>
            <p class="mb-3 text-muted">Complete website development with modern design and responsive layout</p>
            <div class="mb-3 price-section">
              <span class="text-decoration-line-through text-muted">$2000</span>
              <span class="fw-bold text-primary fs-4 ms-2">$1000</span>
            </div>
            <ul class="mb-4 list-unstyled">
              <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Responsive Design</li>
              <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>SEO Optimized</li>
              <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>1 Year Support</li>
            </ul>
            <a href="{{ route('contact.index') }}" class="btn btn-primary w-100 rounded-pill">Claim Offer</a>
          </div>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="overflow-hidden bg-white shadow-lg promotion-card rounded-4 h-100 position-relative">
          <div class="top-0 px-3 py-1 text-white promotion-badge position-absolute end-0 bg-success rounded-bottom-start">
            <small class="fw-bold">30% OFF</small>
          </div>
          <div class="p-4 card-body">
            <div class="mb-3 promotion-icon">
              <div class="icon-wrapper" style="width: 60px; height: 60px; background: linear-gradient(45deg, #4ecdc4, #44a08d); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                <i class="text-white bi bi-phone" style="font-size: 1.5rem;"></i>
              </div>
            </div>
            <h4 class="mb-3 fw-bold">Mobile App Development</h4>
            <p class="mb-3 text-muted">Cross-platform mobile application with native performance</p>
            <div class="mb-3 price-section">
              <span class="text-decoration-line-through text-muted">$5000</span>
              <span class="fw-bold text-success fs-4 ms-2">$3500</span>
            </div>
            <ul class="mb-4 list-unstyled">
              <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>iOS & Android</li>
              <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>API Integration</li>
              <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>App Store Upload</li>
            </ul>
            <a href="{{ route('contact.index') }}" class="btn btn-success w-100 rounded-pill">Get Started</a>
          </div>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="overflow-hidden bg-white shadow-lg promotion-card rounded-4 h-100 position-relative">
          <div class="top-0 px-3 py-1 promotion-badge position-absolute end-0 bg-warning text-dark rounded-bottom-start">
            <small class="fw-bold">FREE</small>
          </div>
          <div class="p-4 card-body">
            <div class="mb-3 promotion-icon">
              <div class="icon-wrapper" style="width: 60px; height: 60px; background: linear-gradient(45deg, #feca57, #ff9ff3); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                <i class="text-white bi bi-chat-dots" style="font-size: 1.5rem;"></i>
              </div>
            </div>
            <h4 class="mb-3 fw-bold">Free Consultation</h4>
            <p class="mb-3 text-muted">Get expert advice and project estimation at no cost</p>
            <div class="mb-3 price-section">
              <span class="text-decoration-line-through text-muted">$200</span>
              <span class="fw-bold text-warning fs-4 ms-2">FREE</span>
            </div>
            <ul class="mb-4 list-unstyled">
              <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Project Analysis</li>
              <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Cost Estimation</li>
              <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Technology Advice</li>
            </ul>
            <a href="{{ route('contact.index') }}" class="btn btn-warning w-100 rounded-pill text-dark">Book Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
.promotion-card:hover {
  transform: translateY(-5px);
  transition: all 0.3s ease;
}
</style>

<!--  Start Counter Section  -->
<div id="stats-counter" class="call-to-action stats-counter section">
  <div class="container" data-aos="fade-up">
    <div class="row gy-4 align-items-center">
      <div class="col-lg-4">
        <div class="stats-item d-flex flex-column align-items-center">
          <div class="icon circle"><img src="{{ asset('assets/images/icons/happy-clients.svg') }}" alt="icon"></div>
          <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
          <p><span>Happy Clients</span> consequuntur quae diredo</p>
        </div>
        </div>
        <div class="col-lg-4">
        <div class="stats-item d-flex flex-column align-items-center">
          <div class="icon circle"><img src="{{ asset('assets/images/icons/complete-projects.svg') }}" alt="icon"></div>
          <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
          <p><span>Completed Projects</span> adipisci atque quia aut</p>
        </div>
        </div>
        <div class="col-lg-4">
        <div class="stats-item d-flex flex-column align-items-center">
          <div class="icon circle"><img src="{{ asset('assets/images/icons/hours-support.svg') }}" alt="icon"></div>
          <span data-purecounter-start="0" data-purecounter-end="453" data-purecounter-duration="1" class="purecounter"></span>
          <p><span>Hours Of Support</span> aut commodi quaerat</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!--  Clients Section  -->
<div id="clients" class="clients section">
  <div class="container" data-aos="zoom-out">
    <div class="mb-5 text-center section-header">
      <h2>Our Trusted Clients</h2>
      <p>We're proud to work with amazing companies</p>
    </div>
    <div class="clients-slider swiper">
      <div class="swiper-wrapper align-items-center">
        @php
          $clients = App\Models\Client::active()->ordered()->get();
        @endphp
        
        @forelse($clients as $client)
        <div class="swiper-slide">
          @if($client->website_url)
            <a href="{{ $client->website_url }}" target="_blank" class="client-link" title="{{ $client->name }}">
          @endif
          
          @if($client->logo && file_exists(public_path('storage/clients/' . $client->logo)))
            <img src="{{ asset('storage/clients/' . $client->logo) }}" class="img-fluid client-logo" alt="{{ $client->name }}" style="max-height: 80px; filter: grayscale(100%); transition: all 0.3s ease;">
          @else
            <div class="client-placeholder d-flex align-items-center justify-content-center" style="height: 80px; background: #f8f9fa; border-radius: 8px;">
              <span class="fw-bold text-muted">{{ $client->name }}</span>
            </div>
          @endif
          
          @if($client->website_url)
            </a>
          @endif
        </div>
        @empty
        <div class="swiper-slide"><img src="{{ asset('assets/images/clients/client-1.png') }}" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="{{ asset('assets/images/clients/client-2.png') }}" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="{{ asset('assets/images/clients/client-3.png') }}" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="{{ asset('assets/images/clients/client-4.png') }}" class="img-fluid" alt=""></div>
        @endforelse
      </div>
    </div>
  </div>
</div>

<style>
.client-logo:hover {
  filter: grayscale(0%) !important;
  transform: scale(1.05);
}
.client-link {
  display: block;
  text-decoration: none;
}
</style>




<!--  Call To Action Section  -->
<section id="call-to-action" class="call-to-action">
  <div class="container text-center aos-init aos-animate" data-aos="zoom-out">
     <div class="row gy-4">
      <div class="col-lg-12">
          <h3>Let's Discuss your Projects</h3>
          <p>We pride ourselves with our ability to perform and deliver results. Use the form below to discuss your project needs with our team, we will get back asap</p>
          <a class="cta-btn" href="{{ route('contact.index') }}">Contact Us</a>
      </div>
    </div>
  </div>
</section>

<!--  Recent Blog Posts Section  -->
<section id="recent-posts" class="recent-posts sections-bg">
  <div class="container" data-aos="fade-up">
    <div class="section-header">
      <h2>Latest Blogs</h2>
      <p>Stay updated with our latest insights</p>
    </div>
    <div class="row gy-4">
      @php
        $latestPosts = App\Models\Post::where('status', 'published')->latest()->take(3)->get();
      @endphp
      @forelse($latestPosts as $post)
      <div class="col-lg-4">
        <article>
          <div class="post-img">
            @if($post->image && file_exists(public_path('storage/posts/' . $post->image)))
              <img src="{{ asset('storage/posts/' . $post->image) }}" alt="" class="img-fluid">
            @else
              <img src="{{ asset('assets/images/blog/blog-' . (($loop->index % 3) + 1) . '.jpg') }}" alt="" class="img-fluid">
            @endif
          </div>
          <p class="post-category">Technology</p>
          <h2 class="title">
            <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
          </h2>
          <div class="d-flex align-items-center">
            <div class="post-meta">
              <p class="post-author">Admin</p>
              <p class="post-date">
                <time datetime="{{ $post->created_at->format('Y-m-d') }}">{{ $post->created_at->format('M d, Y') }}</time>
              </p>
            </div>
          </div>
        </article>
      </div>
      @empty
      <div class="col-lg-4">
        <article>
          <div class="post-img">
            <img src="{{ asset('assets/images/blog/blog-1.jpg') }}" alt="" class="img-fluid">
          </div>
          <p class="post-category">Technology</p>
          <h2 class="title">
            <a href="#">Welcome to Our Blog</a>
          </h2>
          <div class="d-flex align-items-center">
            <div class="post-meta">
              <p class="post-author">Admin</p>
              <p class="post-date">
                <time datetime="{{ date('Y-m-d') }}">{{ date('M d, Y') }}</time>
              </p>
            </div>
          </div>
        </article>
      </div>
      @endforelse
    </div>
    <div class="mt-4 row">
      <div class="text-center col-lg-12">
        <a href="{{ route('posts.index') }}" class="btn-get-started">View All Posts</a>
      </div>
    </div>
  </div>
</section>

<!-- Start Contact Section -->
<div id="contact" class="contact-section section">
  <div class="section-header">
    <h2>Contact Us</h2>
    <p>Get in touch with us for any inquiries or project discussions</p>
  </div>
  <div class="container">
    @if(session('success'))
      <div class="mb-4 alert alert-success">{{ session('success') }}</div>
    @endif
    
    <div class="row">
      <div class="col-lg-4 col-md-12" data-aos="fade-right">
        <div class="contact-information-box-3">
          <div class="row">
            <div class="col-lg-12">
              <div class="single-contact-info-box">
                <div class="contact-info">
                  <h6>Address:</h6>
                  <p>{!! nl2br(e(App\Models\SiteSetting::get('contact_address', '11 West Town, PBo 12345, United States'))) !!}</p>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="single-contact-info-box">
                <div class="contact-info">
                  <h6>Phone:</h6>
                  <p><a href="tel:{{ App\Models\SiteSetting::get('contact_phone', '+1 (234) 567-890') }}">{{ App\Models\SiteSetting::get('contact_phone', '+1 (234) 567-890') }}</a></p>
                  @if(App\Models\SiteSetting::get('contact_whatsapp'))
                    <p>WhatsApp: <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', App\Models\SiteSetting::get('contact_whatsapp')) }}" target="_blank">{{ App\Models\SiteSetting::get('contact_whatsapp') }}</a></p>
                  @endif
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="single-contact-info-box">
                <div class="contact-info">
                  <h6>Email:</h6>
                  <p><a href="mailto:{{ App\Models\SiteSetting::get('contact_email', 'info@example.com') }}">{{ App\Models\SiteSetting::get('contact_email', 'info@example.com') }}</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8 col-md-12" data-aos="fade-left">
        <div class="contact-form-box contact-form contact-form-3">
          <div class="form-container-box">
            <form class="contact-form form" method="POST" action="{{ route('contact.store') }}">
              @csrf
              <div class="controls">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group form-input-box">
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name*" value="{{ old('name') }}" required>
                      @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group form-input-box">
                      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email*" value="{{ old('email') }}" required>
                      @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group form-input-box">
                      <input type="tel" class="form-control" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group form-input-box">
                      <select class="form-control" name="service">
                        <option value="">Select Service</option>
                        @php
                          $services = App\Models\Service::active()->ordered()->get();
                        @endphp
                        @foreach($services as $service)
                          <option value="{{ $service->title }}" {{ old('service') === $service->title ? 'selected' : '' }}>{{ $service->title }}</option>
                        @endforeach
                        <option value="Others" {{ old('service') === 'Others' ? 'selected' : '' }}>Others</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group form-input-box">
                      <input type="text" class="form-control" name="company" placeholder="Company" value="{{ old('company') }}">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group form-input-box">
                      <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="7" placeholder="Write Your Message*" required>{{ old('message') }}</textarea>
                      @error('message')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button type="submit" data-text="Send Message">Send Message</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</main>
@endsection