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
  <!-- Service Highlights Section -->
  <div id="services" class="py-5 section" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="container">
      <div class="mb-5 text-center ">
        <h2 class="mb-3 text-white">Service Highlights</h2>
        <p class="text-white-50">Professional IT solutions tailored to your business needs</p>
      </div>
      
      <div class="row g-4">
        @php
          $services = App\Models\Service::active()->ordered()->take(6)->get();
          $totalServices = App\Models\Service::active()->count();
        @endphp
        
        @forelse($services as $service)
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index + 1) * 100 }}">
          <div class="overflow-hidden bg-white shadow-lg service-card rounded-4" style="transition: all 0.3s ease; border: none; height: 480px; display: flex; flex-direction: column;">
            <div class="service-image position-relative" style="height: 200px; overflow: hidden; flex-shrink: 0;">
              @if($service->image && file_exists(public_path('storage/' . $service->image)))
                <img src="{{ asset('storage/' . $service->image) }}" class="w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="{{ $service->title }}">
              @else
                <img src="{{ asset('assets/images/services/service-' . (($loop->index % 6) + 1) . '.jpg') }}" class="w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="{{ $service->title }}">
              @endif
              <div class="top-0 service-overlay position-absolute start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(0,0,0,0.7); opacity: 0; transition: all 0.3s ease;">
                <span class="text-white fw-bold">Learn More</span>
              </div>
            </div>
            
            <div class="p-4 d-flex flex-column" style="flex: 1;">
              <h4 class="mb-3 fw-bold" style="color: #2c3e50; height: 50px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $service->title }}</h4>
              <p class="mb-4 text-muted" style="flex: 1; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;">{{ $service->description }}</p>
              <div class="d-flex align-items-center justify-content-between" style="margin-top: auto;">
                <a href="{{ route('services.show', $service->slug) }}" class="px-4 py-2 btn btn-primary btn-sm rounded-pill" style="background: linear-gradient(45deg, #667eea, #764ba2); border: none;">
                  Learn More
                </a>
                <div class="text-muted fw-bold" style="font-size: 2rem; opacity: 0.1;">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
              </div>
            </div>
          </div>
        </div>
        @empty
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="overflow-hidden bg-white shadow-lg service-card h-100 rounded-4">
            <div class="service-image position-relative" style="height: 200px; overflow: hidden;">
              <img src="{{ asset('assets/images/services/service-1.jpg') }}" class="w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="Web Development">
              <div class="top-0 service-overlay position-absolute start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(0,0,0,0.7); opacity: 0; transition: all 0.3s ease;">
                <span class="text-white fw-bold">Learn More</span>
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
      
      @if($totalServices > 6)
      <div class="mt-5 row">
        <div class="text-center col-12">
          <a href="{{ route('services.index') }}" class="px-5 py-3 btn btn-light btn-lg rounded-pill fw-bold" style="background: rgba(255,255,255,0.9); color: #667eea; border: 2px solid rgba(255,255,255,0.3);">
            <i class="bi bi-arrow-right me-2"></i>See More Services
          </a>
        </div>
      </div>
      @endif
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

  <!-- Product Highlight Section -->
  <div id="products" class="py-5 section">
    <div class="container">
      <div class="text-center section-header">
        <h2 class="mb-3">Our Products</h2>
        <p class="text-muted">Innovative software solutions designed to transform your business</p>
      </div>
      
      <div class="row g-4">
        @php
          $products = App\Models\Product::active()->ordered()->take(6)->get();
        @endphp
        
        @forelse($products as $product)
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index + 1) * 100 }}">
          <div class="overflow-hidden bg-white shadow-lg product-card rounded-4" style="transition: all 0.3s ease; height: 480px; display: flex; flex-direction: column;">
            <div class="product-image position-relative" style="height: 200px; overflow: hidden; flex-shrink: 0;">
              @if($product->image && file_exists(public_path('storage/' . $product->image)))
                <img src="{{ asset('storage/' . $product->image) }}" class="w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="{{ $product->title }}">
              @else
                <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background: linear-gradient(45deg, #667eea, #764ba2);">
                  <i class="text-white bi bi-laptop" style="font-size: 3rem;"></i>
                </div>
              @endif
              <div class="top-0 product-overlay position-absolute start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(0,0,0,0.7); opacity: 0; transition: all 0.3s ease;">
                <span class="text-white fw-bold">View Details</span>
              </div>
            </div>
            <div class="p-4 d-flex flex-column" style="flex: 1;">
              <h4 class="mb-3 fw-bold" style="height: 50px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $product->title }}</h4>
              <p class="mb-4 text-muted" style="flex: 1; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;">{{ $product->description }}</p>
              <div class="d-flex align-items-center justify-content-between" style="margin-top: auto;">
                <a href="{{ route('products.show', $product->slug) }}" class="btn btn-outline-primary btn-sm rounded-pill">
                  Learn More
                </a>
                <div class="text-muted fw-bold" style="font-size: 2rem; opacity: 0.1;">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
              </div>
            </div>
          </div>
        </div>
        @empty
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="overflow-hidden bg-white shadow-lg product-card rounded-4 h-100">
            <div class="product-image" style="height: 200px; background: linear-gradient(45deg, #667eea, #764ba2); display: flex; align-items: center; justify-content: center;">
              <i class="text-white bi bi-laptop" style="font-size: 3rem;"></i>
            </div>
            <div class="p-4 card-body">
              <h4 class="mb-3 fw-bold">ERP Solution</h4>
              <p class="mb-4 text-muted">Complete enterprise resource planning system for business management</p>
              <a href="{{ route('contact.index') }}" class="btn btn-outline-primary btn-sm rounded-pill">Learn More</a>
            </div>
          </div>
        </div>
        @endforelse
      </div>
    </div>
  </div>
  
  <style>
    .product-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
    }
    .product-card:hover .product-image img {
      transform: scale(1.1);
    }
    .product-card:hover .product-overlay {
      opacity: 1;
    }
  </style>


  <!-- Success Stories Section -->
  <section id="success-stories" class="py-5" style="background: #f8f9fa;">
    <div class="container">
      <div class="text-center section-header" data-aos="fade-up">
        <h2 class="mb-3">Our Success Stories</h2>
        <p class="text-muted">Real projects, real results - see how we've transformed businesses</p>
      </div>
      
      <div class="row g-4">
        @php
          $portfolios = App\Models\Portfolio::active()->ordered()->take(6)->get();
        @endphp
        
        @forelse($portfolios as $portfolio)
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index + 1) * 100 }}">
          <div class="border-0 shadow-sm card portfolio-card" style="height: 550px; display: flex; flex-direction: column;">
            <div class="overflow-hidden position-relative" style="height: 250px; flex-shrink: 0;">
              @if($portfolio->image && file_exists(public_path('storage/portfolios/' . $portfolio->image)))
                <img src="{{ asset('storage/portfolios/' . $portfolio->image) }}" class="w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="{{ $portfolio->title }}">
              @else
                <img src="{{ asset('assets/images/portfolio/product-' . (($loop->index % 6) + 1) . '.jpg') }}" class="w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="{{ $portfolio->title }}">
              @endif
              <div class="top-0 position-absolute start-0 w-100 h-100 d-flex align-items-center justify-content-center portfolio-overlay" style="background: rgba(0,0,0,0.7); opacity: 0; transition: all 0.3s ease;">
                @if($portfolio->project_url)
                  <a href="{{ $portfolio->project_url }}" target="_blank" class="btn btn-light btn-sm">
                    <i class="bi bi-link-45deg me-1"></i>View Project
                  </a>
                @endif
              </div>
            </div>
            <div class="card-body d-flex flex-column text-center" style="flex: 1;">
              <h5 class="mb-2" style="height: 50px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $portfolio->title }}</h5>
              <p class="text-muted mb-3" style="flex: 1; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{ $portfolio->description }}</p>
              <div class="text-center mb-3"><span class="badge bg-primary">{{ ucfirst($portfolio->category) }}</span></div>
              <a href="{{ route('portfolio.show', $portfolio->slug) }}" class="btn btn-sm" style="border: 2px solid #007bff; color: #007bff; background: transparent; font-size: 12px; padding: 6px 12px; margin-top: auto;">View Details</a>
            </div>
          </div>
        </div>
        @empty
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="border-0 shadow-sm card h-100 portfolio-card">
            <div class="card-img-top" style="height: 250px; background: linear-gradient(45deg, #667eea, #764ba2); display: flex; align-items: center; justify-content: center;">
              <i class="text-white bi bi-trophy" style="font-size: 3rem;"></i>
            </div>
            <div class="card-body">
              <h5 class="mb-2 card-title">Digital Transformation</h5>
              <p class="card-text text-muted">How we helped a leading company modernize their operations and increase efficiency by 40%.</p>
              <span class="mb-2 badge bg-primary">Success</span>
              <br>
              <a href="{{ route('portfolio.index') }}" class="btn btn-sm" style="border: 2px solid #007bff; color: #007bff; background: transparent; font-size: 12px; padding: 6px 12px;">View Details</a>
            </div>
          </div>
        </div>
        @endforelse
      </div>
      
      <div class="mt-5 text-center">
        <a href="{{ route('portfolio.index') }}" class="px-5 py-3 btn btn-primary btn-lg rounded-pill fw-bold">
          <i class="bi bi-arrow-right me-2"></i>View All Portfolio
        </a>
      </div>
    </div>
  </section>
  
  <style>
    .portfolio-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
    }
    .portfolio-card:hover img {
      transform: scale(1.1);
    }
    .portfolio-card:hover .portfolio-overlay {
      opacity: 1 !important;
    }
  </style>

  <!-- Call-to-Action Buttons Section -->
  @php
    $transformSection = App\Models\CTASection::getSection('transform_business', [
      'title' => 'Ready to Transform Your Business?',
      'description' => 'Get started with our professional services today',
      'button_text' => 'Request Quote',
      'button_link' => '/contact',
      'secondary_button_text' => 'Contact Us',
      'secondary_button_link' => '/contact'
    ]);
  @endphp
  @if($transformSection->is_active)
  <section id="cta-buttons" class="py-5 text-center" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <h3 class="mb-4 text-white">{{ $transformSection->title }}</h3>
          @if($transformSection->description)
            <p class="mb-4 text-white-50">{{ $transformSection->description }}</p>
          @endif
          <div class="flex-wrap gap-3 d-flex justify-content-center">
            @if($transformSection->button_text && $transformSection->button_link)
              <a href="{{ $transformSection->button_link }}" class="px-5 py-3 btn btn-light btn-lg rounded-pill fw-bold">
                <i class="bi bi-chat-dots me-2"></i>{{ $transformSection->button_text }}
              </a>
            @endif
            @if($transformSection->secondary_button_text && $transformSection->secondary_button_link)
              <a href="{{ $transformSection->secondary_button_link }}" class="px-5 py-3 btn btn-outline-light btn-lg rounded-pill fw-bold">
                <i class="bi bi-telephone me-2"></i>{{ $transformSection->secondary_button_text }}
              </a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
  @endif

  <!-- Why Choose Us Section -->
  <section id="featured" class="py-5">
    <div class="container">
        <div class="text-center section-header" data-aos="fade-up" data-aos-delay="100">
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



<!-- Technologies We Use Section -->
<section id="technologies" class="py-5" style="background: #f8f9fa;">
  <div class="container" data-aos="fade-up">
    <div class="text-center section-header">
      <h2 class="mb-3">Technologies We Use</h2>
      <p class="text-muted">Cutting-edge technologies that power our solutions</p>
    </div>
    
    @php
      $techCategories = App\Models\TechnologyCategory::active()->ordered()->with(['technologies' => function($query) {
        $query->active()->ordered();
      }])->get();
    @endphp
    
    @if($techCategories->count() > 0)
    <div class="technology-tabs">
      <ul class="mb-4 nav nav-tabs justify-content-center" id="techTabs" role="tablist">
        @foreach($techCategories as $category)
        <li class="nav-item" role="presentation">
          <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="tech-{{ $category->slug }}-tab" data-bs-toggle="tab" data-bs-target="#tech-{{ $category->slug }}" type="button" role="tab">{{ $category->name }}</button>
        </li>
        @endforeach
      </ul>
      
      <div class="tab-content" id="techTabsContent">
        @foreach($techCategories as $category)
        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="tech-{{ $category->slug }}" role="tabpanel">
          <div class="row g-4">
            @forelse($category->technologies as $tech)
            <div class="col-lg-2 col-md-3 col-sm-4 col-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index + 1) * 50 }}">
              <div class="text-center bg-white shadow-sm tech-card rounded-3 p-3" style="transition: all 0.3s ease; height: 120px; display: flex; flex-direction: column; justify-content: center;">
                @if($tech->icon && file_exists(public_path('storage/technologies/' . $tech->icon)))
                  <img src="{{ asset('storage/technologies/' . $tech->icon) }}" alt="{{ $tech->name }}" class="mx-auto mb-2" style="height: 40px; width: 40px; object-fit: contain;">
                @else
                  <div class="mx-auto mb-2 d-flex align-items-center justify-content-center" style="height: 40px; width: 40px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 8px;">
                    <i class="text-white bi bi-code-slash" style="font-size: 1.2rem;"></i>
                  </div>
                @endif
                <h6 class="mb-0" style="font-size: 0.85rem; font-weight: 600;">{{ $tech->name }}</h6>
              </div>
            </div>
            @empty
            <div class="col-12 text-center py-4">
              <p class="text-muted">No technologies available in this category.</p>
            </div>
            @endforelse
          </div>
        </div>
        @endforeach
      </div>
    </div>
    @else
    <div class="row g-4">
      <div class="col-lg-2 col-md-3 col-sm-4 col-6" data-aos="fade-up" data-aos-delay="100">
        <div class="text-center bg-white shadow-sm tech-card rounded-3 p-3" style="height: 120px; display: flex; flex-direction: column; justify-content: center;">
          <div class="mx-auto mb-2 d-flex align-items-center justify-content-center" style="height: 40px; width: 40px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 8px;">
            <i class="text-white bi bi-code-slash" style="font-size: 1.2rem;"></i>
          </div>
          <h6 class="mb-0" style="font-size: 0.85rem; font-weight: 600;">React</h6>
        </div>
      </div>
      <div class="col-lg-2 col-md-3 col-sm-4 col-6" data-aos="fade-up" data-aos-delay="150">
        <div class="text-center bg-white shadow-sm tech-card rounded-3 p-3" style="height: 120px; display: flex; flex-direction: column; justify-content: center;">
          <div class="mx-auto mb-2 d-flex align-items-center justify-content-center" style="height: 40px; width: 40px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 8px;">
            <i class="text-white bi bi-code-slash" style="font-size: 1.2rem;"></i>
          </div>
          <h6 class="mb-0" style="font-size: 0.85rem; font-weight: 600;">Laravel</h6>
        </div>
      </div>
    </div>
    @endif
  </div>
</section>

<style>
.technology-tabs .nav-tabs {
  border-bottom: 0px;
}
.technology-tabs .nav-link {
  color: #6c757d;
  border: none;
  padding: 12px 24px;
  font-weight: 500;
  border-radius: 25px;
  margin: 0 5px;
  transition: all 0.3s ease;
}
.technology-tabs .nav-link.active {
  background: linear-gradient(45deg, #667eea, #764ba2);
  color: white;
  border: none;
}
.technology-tabs .nav-link:hover {
  color: #667eea;
  background-color: #f8f9fa;
}
.tech-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
}
</style>

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
                <div class="text-center">
                  <h3>{{ $testimonial->name }}</h3>
                  <h4>{{ $testimonial->position }}@if($testimonial->organization), {{ $testimonial->organization }}@endif</h4>
                  <div class="stars">
                    @for($i = 1; $i <= 5; $i++)
                      <i class="bi bi-star{{ $i <= $testimonial->rating ? '-fill' : '' }}"></i>
                    @endfor
                  </div>
                </div>
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                <span class="testimonial-text" data-full-text="{{ $testimonial->message }}">
                  @if(strlen($testimonial->message) > 80)
                    <span class="short-text">{{ Str::limit($testimonial->message, 80, '') }}</span>
                    <span class="full-text" style="display: none;">{{ $testimonial->message }}</span>
                    <a href="#" class="see-more-btn text-primary fw-bold" onclick="toggleTestimonial(this); return false;">... See More</a>
                  @else
                    {{ $testimonial->message }}
                  @endif
                </span>
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

<!--  Clients Section -->
<div id="clients" class="clients section">
  <div class="container" data-aos="zoom-out">
    <div class="text-center section-header">
      <h2>Our Trusted Clients</h2>
      <p>We're proud to work with amazing companies across different sectors</p>
    </div>
    
    <div class="clients-tabs">
      <ul class="mb-4 nav nav-tabs justify-content-center" id="clientTabs" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab">All</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="private-tab" data-bs-toggle="tab" data-bs-target="#private" type="button" role="tab">Private Companies</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="government-tab" data-bs-toggle="tab" data-bs-target="#government" type="button" role="tab">Government</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="global-tab" data-bs-toggle="tab" data-bs-target="#global" type="button" role="tab">Global Clients</button>
        </li>
      </ul>
      
      <div class="tab-content" id="clientTabsContent">
        @php
          $allClients = App\Models\Client::where('is_active', true)->orderBy('sort_order')->get();
          $privateClients = App\Models\Client::where('category', 'private')->where('is_active', true)->orderBy('sort_order')->get();
          $governmentClients = App\Models\Client::where('category', 'government')->where('is_active', true)->orderBy('sort_order')->get();
          $globalClients = App\Models\Client::where('category', 'global')->where('is_active', true)->orderBy('sort_order')->get();
        @endphp
        
        <!-- All Clients Tab -->
        <div class="tab-pane fade show active" id="all" role="tabpanel">
          <div class="clients-slider swiper">
            <div class="swiper-wrapper align-items-center">
              @forelse($allClients as $client)
                <div class="swiper-slide">
                  @if($client->website_url)
                    <a href="{{ $client->website_url }}" target="_blank">
                  @endif
                  @if($client->logo && file_exists(public_path('storage/clients/' . $client->logo)))
                    <img src="{{ asset('storage/clients/' . $client->logo) }}" class="img-fluid client-logo" alt="{{ $client->name }}">
                  @else
                    <img src="{{ asset('assets/images/clients/client-' . (($loop->index % 6) + 1) . '.png') }}" class="img-fluid client-logo" alt="{{ $client->name }}">
                  @endif
                  @if($client->website_url)
                    </a>
                  @endif
                </div>
              @empty
                <div class="swiper-slide"><img src="{{ asset('assets/images/clients/client-1.png') }}" class="img-fluid client-logo" alt="Client 1"></div>
                <div class="swiper-slide"><img src="{{ asset('assets/images/clients/client-2.png') }}" class="img-fluid client-logo" alt="Client 2"></div>
              @endforelse
            </div>
          </div>
        </div>
        
        <!-- Private Companies Tab -->
        <div class="tab-pane fade" id="private" role="tabpanel">
          <div class="clients-slider swiper">
            <div class="swiper-wrapper align-items-center">
              @forelse($privateClients as $client)
                <div class="swiper-slide">
                  @if($client->website_url)
                    <a href="{{ $client->website_url }}" target="_blank">
                  @endif
                  @if($client->logo && file_exists(public_path('storage/clients/' . $client->logo)))
                    <img src="{{ asset('storage/clients/' . $client->logo) }}" class="img-fluid client-logo" alt="{{ $client->name }}">
                  @else
                    <img src="{{ asset('assets/images/clients/client-1.png') }}" class="img-fluid client-logo" alt="{{ $client->name }}">
                  @endif
                  @if($client->website_url)
                    </a>
                  @endif
                </div>
              @empty
                <div class="swiper-slide"><img src="{{ asset('assets/images/clients/client-1.png') }}" class="img-fluid client-logo" alt="Private Client 1"></div>
              @endforelse
            </div>
          </div>
        </div>
        
        <!-- Government Tab -->
        <div class="tab-pane fade" id="government" role="tabpanel">
          <div class="clients-slider swiper">
            <div class="swiper-wrapper align-items-center">
              @forelse($governmentClients as $client)
                <div class="swiper-slide">
                  @if($client->website_url)
                    <a href="{{ $client->website_url }}" target="_blank">
                  @endif
                  @if($client->logo && file_exists(public_path('storage/clients/' . $client->logo)))
                    <img src="{{ asset('storage/clients/' . $client->logo) }}" class="img-fluid client-logo" alt="{{ $client->name }}">
                  @else
                    <img src="{{ asset('assets/images/clients/client-5.png') }}" class="img-fluid client-logo" alt="{{ $client->name }}">
                  @endif
                  @if($client->website_url)
                    </a>
                  @endif
                </div>
              @empty
                <div class="swiper-slide"><img src="{{ asset('assets/images/clients/client-5.png') }}" class="img-fluid client-logo" alt="Government Client 1"></div>
              @endforelse
            </div>
          </div>
        </div>
        
        <!-- Global Clients Tab -->
        <div class="tab-pane fade" id="global" role="tabpanel">
          <div class="clients-slider swiper">
            <div class="swiper-wrapper align-items-center">
              @forelse($globalClients as $client)
                <div class="swiper-slide">
                  @if($client->website_url)
                    <a href="{{ $client->website_url }}" target="_blank">
                  @endif
                  @if($client->logo && file_exists(public_path('storage/clients/' . $client->logo)))
                    <img src="{{ asset('storage/clients/' . $client->logo) }}" class="img-fluid client-logo" alt="{{ $client->name }}">
                  @else
                    <img src="{{ asset('assets/images/clients/client-3.png') }}" class="img-fluid client-logo" alt="{{ $client->name }}">
                  @endif
                  @if($client->website_url)
                    </a>
                  @endif
                </div>
              @empty
                <div class="swiper-slide"><img src="{{ asset('assets/images/clients/client-3.png') }}" class="img-fluid client-logo" alt="Global Client 1"></div>
              @endforelse
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
.client-logo {
  max-height: 80px;
  filter: grayscale(100%);
  transition: all 0.3s ease;
}
.client-logo:hover {
  filter: grayscale(0%) !important;
  transform: scale(1.05);
}
.clients-tabs .nav-tabs {
  border-bottom:0px;
}
.clients-tabs .nav-link {
  color: #6c757d;
  border: none;
  padding: 12px 24px;
  font-weight: 500;
  border-radius: 25px;
  margin: 0 5px;
  transition: all 0.3s ease;
}
.clients-tabs .nav-link.active {
  background: linear-gradient(45deg, #007bff, #0056b3);
  color: white;
  border: none;
}
.clients-tabs .nav-link:hover {
  color: #007bff;
  background-color: #f8f9fa;
}

.testimonial-wrap {
  height: 350px;
}

.testimonial-item {
  height: 100%;
  display: flex;
  flex-direction: column;
}

.testimonial-item p {
  min-height: 120px;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
}

.testimonials .testimonial-item .testimonial-img {
  width: 90px;
  border-radius: 50px;
  margin-right: 15px;
  height: 90px;
}
</style>




<!--  Call To Action Section  -->
@php
  $discussSection = App\Models\CTASection::getSection('discuss_projects', [
    'title' => "Let's Discuss your Projects",
    'description' => 'We pride ourselves with our ability to perform and deliver results. Use the form below to discuss your project needs with our team, we will get back asap',
    'button_text' => 'Contact Us',
    'button_link' => '/contact'
  ]);
@endphp
@if($discussSection->is_active)
<section id="call-to-action" class="call-to-action">
  <div class="container text-center aos-init aos-animate" data-aos="zoom-out">
     <div class="row gy-4">
      <div class="col-lg-12">
          <h3>{{ $discussSection->title }}</h3>
          @if($discussSection->description)
            <p>{{ $discussSection->description }}</p>
          @endif
          @if($discussSection->button_text && $discussSection->button_link)
            <a class="cta-btn" href="{{ $discussSection->button_link }}">{{ $discussSection->button_text }}</a>
          @endif
      </div>
    </div>
  </div>
</section>
@endif

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

<script>
function toggleTestimonial(btn) {
  const container = btn.closest('.testimonial-text');
  const shortText = container.querySelector('.short-text');
  const fullText = container.querySelector('.full-text');
  
  if (fullText.style.display === 'none') {
    shortText.style.display = 'none';
    fullText.style.display = 'inline';
    btn.textContent = ' See Less';
  } else {
    shortText.style.display = 'inline';
    fullText.style.display = 'none';
    btn.textContent = '... See More';
  }
}
</script>
@endsection