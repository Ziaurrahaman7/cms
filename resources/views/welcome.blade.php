@extends('layouts.app')

@section('title', 'Technoit - IT Solutions & Business Services')
@section('description', 'Professional IT Solutions and Business Services for your company')

@section('content')
<!--  Hero Section  -->
<section id="hero" class="hero sticked-header-offset">
  <div id="particles-js"></div>
  <div id="repulse-circle-div"></div>
  <div class="container position-relative">
    <div class="row gy-5 aos-init aos-animate">
      <div class="col-lg-7 offset-lg-5 dark-bg order-lg-1 d-flex flex-column justify-content-start text-left caption">
        <h2 data-aos="fade-up">Delivering Superior Services <span>IT Solutions</span><span class="circle" data-aos="fade-right" data-aos-delay="800">.</span></h2>
        <p data-aos="fade-up" data-aos-delay="400">You can easily change any design to your own. It is also highly customizable SEO friendly template.</p>
        <div class="social" data-aos="fade-up" data-aos-delay="600">
          <a href="#"><i class="bi bi-twitter-x"></i></a>
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="#"><i class="bi bi-linkedin"></i></a>
          <a href="#"><i class="bi bi-instagram"></i></a>
        </div>
        <div class="d-flex justify-content-start">
          <a href="#contact" class="btn-get-started mr-20" data-aos="fade-up" data-aos-delay="800">Get Quotes</a>
          <a href="#services" class="btn-get-started" data-aos="fade-up" data-aos-delay="1000">Get Started</a>
        </div>
      </div>
    </div>
  </div>
</section>

<main id="main">
  <!-- Start Service Section -->
  <div id="services" class="section">
    <div class="top-icon-box position-relative">
      <div class="container position-relative">
        <div class="section-header">
          <h2>Services We Offer</h2>
          <p>Lorem ipsum dolor sit amet</p>
        </div>
        <div class="row gy-4">
          <div class="col-xl-4 col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><img src="{{ asset('assets/images/icons/service-design.svg') }}" alt="icon"></div>
              <h4 class="title"><a href="#" class="stretched-link">Application Design</a></h4>
              <p>Ronsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
          <div class="col-xl-4 col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><img src="{{ asset('assets/images/icons/service-hosting.svg') }}" alt="icon"></div>
              <h4 class="title"><a href="#" class="stretched-link">Web Hosting</a></h4>
              <p>Ronsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
          <div class="col-xl-4 col-md-4" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <div class="icon"><img src="{{ asset('assets/images/icons/service-social.svg') }}" alt="icon"></div>
              <h4 class="title"><a href="#" class="stretched-link">Social Media</a></h4>
              <p>Ronsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
          <div class="col-xl-4 col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><img src="{{ asset('assets/images/icons/service-seo.svg') }}" alt="icon"></div>
              <h4 class="title"><a href="#" class="stretched-link">SEO Optimization</a></h4>
              <p>Ronsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
          <div class="col-xl-4 col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><img src="{{ asset('assets/images/icons/service-cloud.svg') }}" alt="icon"></div>
              <h4 class="title"><a href="#" class="stretched-link">Cloud Server</a></h4>
              <p>Ronsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
          <div class="col-xl-4 col-md-4" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <div class="icon"><img src="{{ asset('assets/images/icons/service-secure.svg') }}" alt="icon"></div>
              <h4 class="title"><a href="#" class="stretched-link">Data Security</a></h4>
              <p>Ronsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Featured -->
  <section>
    <div class="container" id="featured">
        <div class="section-header" data-aos="fade-up" data-aos-delay="100">
          <h2>Why Choose Us</h2>
          <p>Lorem ipsum dolor sit amet</p>
        </div>
    <div class="row">
      <div class="col-md-4 left">
        <div class="list-wrap" data-aos="fade-up" data-aos-delay="100">
          <div class="description">
            <h4>Experience</h4>
            <p>Ronsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
            <div class="icon">
              <img src="{{ asset('assets/images/icons/icon-1.svg') }}" alt="icon">
            </div>
        </div>
        <div class="list-wrap" data-aos="fade-up" data-aos-delay="400">
          <div class="description">
            <h4>Products</h4>
            <p>Ronsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
            <div class="icon">
              <img src="{{ asset('assets/images/icons/icon-2.svg') }}" alt="icon">
            </div>
      </div>
        <div class="list-wrap" data-aos="fade-up" data-aos-delay="500">
          <div class="description">
            <h4>Approach</h4>
            <p>Ronsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
          <div class="icon">
            <img src="{{ asset('assets/images/icons/icon-3.svg') }}" alt="icon">
          </div>
        </div>
      </div>
      <div class="col-md-4 p-4 p-sm-5 center">
        <div class="list-center-wrap" data-aos="fade-up" data-aos-delay="100">
          <div class="center-icon">
            <img src="{{ asset('assets/images/features.jpg') }}" alt="icon">
          </div>
        </div>
      </div>
      <div class="col-md-4 right">
        <div class="list-wrap" data-aos="fade-up" data-aos-delay="100">
          <div class="icon">
            <img src="{{ asset('assets/images/icons/icon-4.svg') }}" alt="icon">
          </div>
          <div class="description">
            <h4>Pricing</h4>
            <p>Ronsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
      </div>
        <div class="list-wrap" data-aos="fade-up" data-aos-delay="200">
          <div class="icon">
            <img src="{{ asset('assets/images/icons/icon-5.svg') }}" alt="icon">
          </div>
          <div class="description">
            <h4>Delivery</h4>
            <p>Ronsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
        </div>
        <div class="list-wrap" data-aos="fade-up" data-aos-delay="500">
          <div class="icon">
            <img src="{{ asset('assets/images/icons/icon-6.svg') }}" alt="icon">
          </div>
          <div class="description">
            <h4>Support</h4>
            <p>Ronsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Portfolio Section -->
<section id="portfolio" class="portfolio">
  <div class="container" data-aos="fade-up">
    <div class="section-header">
      <h2>Our Portfolio</h2>
      <p>Lorem ipsum dolor sit amet</p>
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
          <div class="portfolio-wrap position-relative overflow-hidden">
            @if($portfolio->image && file_exists(public_path('storage/portfolios/' . $portfolio->image)))
              <a href="{{ asset('storage/portfolios/' . $portfolio->image) }}" class="glightbox" data-gallery="portfolio-gallery" data-glightbox="title: {{ $portfolio->title }}; description: {{ $portfolio->description }}">
                <img src="{{ asset('storage/portfolios/' . $portfolio->image) }}" class="img-fluid" alt="{{ $portfolio->title }}" style="transition: transform 0.3s ease;">
              </a>
            @else
              <a href="{{ asset('assets/images/portfolio/product-' . (($loop->index % 6) + 1) . '.jpg') }}" class="glightbox" data-gallery="portfolio-gallery" data-glightbox="title: {{ $portfolio->title }}; description: {{ $portfolio->description }}">
                <img src="{{ asset('assets/images/portfolio/product-' . (($loop->index % 6) + 1) . '.jpg') }}" class="img-fluid" alt="{{ $portfolio->title }}" style="transition: transform 0.3s ease;">
              </a>
            @endif
            <div class="portfolio-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(0,0,0,0.7); opacity: 0; transition: all 0.3s ease; pointer-events: none;">
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
          <div class="portfolio-wrap position-relative overflow-hidden">
            <a href="{{ asset('assets/images/portfolio/product-1.jpg') }}" class="glightbox" data-gallery="portfolio-gallery" data-glightbox="title: Sample Project; description: Professional web development">
              <img src="{{ asset('assets/images/portfolio/product-1.jpg') }}" class="img-fluid" alt="Sample Project" style="transition: transform 0.3s ease;">
            </a>
            <div class="portfolio-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(0,0,0,0.7); opacity: 0; transition: all 0.3s ease; pointer-events: none;">
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
            <a href="#contact" class="{{ $plan->is_popular ? 'btn-popular' : '' }}">Order Now</a>
          </div>
        </div>
        @empty
        <div class="col-lg-4">
          <div class="card text-center">
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
          <div class="card text-center popular">
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
          <div class="card text-center">
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
      <p>Lorem ipsum dolor sit amet</p>
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
                  <img src="{{ asset('storage/testimonials/' . $testimonial->image) }}" class="testimonial-img flex-shrink-0" alt="{{ $testimonial->name }}">
                @else
                  <img src="{{ asset('assets/images/testimonials/testimonial-' . (($loop->index % 4) + 1) . '.jpg') }}" class="testimonial-img flex-shrink-0" alt="{{ $testimonial->name }}">
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
                <img src="{{ asset('assets/images/testimonials/testimonial-1.jpg') }}" class="testimonial-img flex-shrink-0" alt="">
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

<!--  Clients Section  -->
<div id="clients" class="clients section">
  <div class="container" data-aos="zoom-out">
    <div class="clients-slider swiper">
      <div class="swiper-wrapper align-items-center">
        <div class="swiper-slide"><img src="{{ asset('assets/images/clients/client-1.png') }}" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="{{ asset('assets/images/clients/client-2.png') }}" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="{{ asset('assets/images/clients/client-3.png') }}" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="{{ asset('assets/images/clients/client-4.png') }}" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="{{ asset('assets/images/clients/client-5.png') }}" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="{{ asset('assets/images/clients/client-6.png') }}" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="{{ asset('assets/images/clients/client-7.png') }}" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="{{ asset('assets/images/clients/client-8.png') }}" class="img-fluid" alt=""></div>
      </div>
    </div>
  </div>
</div>

<!--  Our Team Section  -->
<section id="team" class="team sections-bg">
  <div class="container aos-init aos-animate" data-aos="fade-up">
    <div class="section-header">
      <h2>Team</h2>
      <p>Lorem ipsum dolor sit amet</p>
    </div>
    <div class="row gy-4">
      @php
        $teams = App\Models\Team::active()->ordered()->get();
      @endphp
      
      @forelse($teams as $team)
      <div class="col-xl-3 col-md-6 d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="{{ ($loop->index + 1) * 100 }}">
        <div class="member">
          @if($team->image && file_exists(public_path('storage/teams/' . $team->image)))
            <img src="{{ asset('storage/teams/' . $team->image) }}" class="img-fluid" alt="{{ $team->name }}">
          @else
            <img src="{{ asset('assets/images/team/team-1.jpg') }}" class="img-fluid" alt="{{ $team->name }}">
          @endif
          <h4>{{ $team->name }}</h4>
          <span>{{ $team->position }}</span>
          @if($team->bio)
            <p class="bio">{{ Str::limit($team->bio, 100) }}</p>
          @endif
          <div class="social">
            @if($team->twitter)
              <a href="{{ $team->twitter }}" target="_blank"><i class="bi bi-twitter-x"></i></a>
            @endif
            @if($team->facebook)
              <a href="{{ $team->facebook }}" target="_blank"><i class="bi bi-facebook"></i></a>
            @endif
            @if($team->linkedin)
              <a href="{{ $team->linkedin }}" target="_blank"><i class="bi bi-linkedin"></i></a>
            @endif
            @if($team->instagram)
              <a href="{{ $team->instagram }}" target="_blank"><i class="bi bi-instagram"></i></a>
            @endif
          </div>
        </div>
      </div>
      @empty
      <div class="col-12 text-center">
        <p class="text-muted">No team members found.</p>
      </div>
      @endforelse
    </div>
  </div>
</section>

<!--  Frequently Asked Questions Section  -->
<section id="faq" class="faq">
  <div class="container" data-aos="fade-up">
    <div class="section-header">
      <h2>FAQ's</h2>
      <p>Lorem ipsum dolor sit amet</p>
    </div>
    <div class="row gy-4">
      <div class="col-lg-12">
        <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">
          @php
            $faqs = App\Models\Faq::active()->ordered()->get();
          @endphp
          
          @forelse($faqs as $faq)
          <div class="accordion-item">
            <h3 class="accordion-header">
              <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-{{ $faq->id }}">
                <span class="num"><i class="bi bi-arrow-right-circle-fill"></i></span>
                {{ $faq->question }}
              </button>
            </h3>
            <div id="faq-content-{{ $faq->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" data-bs-parent="#faqlist">
              <div class="accordion-body">
                {{ $faq->answer }}
              </div>
            </div>
          </div>
          @empty
          <div class="accordion-item">
            <h3 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-default">
                <span class="num"><i class="bi bi-arrow-right-circle-fill"></i></span>
                What services do you offer?
              </button>
            </h3>
            <div id="faq-content-default" class="accordion-collapse collapse show" data-bs-parent="#faqlist">
              <div class="accordion-body">
                We offer comprehensive IT solutions including web development, mobile app development, cloud services, and digital marketing to help your business grow.
              </div>
            </div>
          </div>
          @endforelse
        </div>
      </div>
    </div>
  </div>
</section>

<!--  Call To Action Section  -->
<section id="call-to-action" class="call-to-action">
  <div class="container text-center aos-init aos-animate" data-aos="zoom-out">
     <div class="row gy-4">
      <div class="col-lg-12">
          <h3>Let's Discuss your Projects</h3>
          <p>We pride ourselves with our ability to perform and deliver results. Use the form below to discuss your project needs with our team, we will get back asap</p>
          <a class="cta-btn" href="mailto:info@example.com">Contact Us</a>
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
    <div class="row mt-4">
      <div class="col-lg-12 text-center">
        <a href="{{ route('posts.index') }}" class="btn-get-started">View All Posts</a>
      </div>
    </div>
  </div>
</section>

<!-- Start Contact Section -->
<div id="contact" class="contact-section section">
  <div class="section-header">
    <h2>Contact Us</h2>
    <p>Lorem ipsum dolor sit amet</p>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-12" data-aos="fade-right">
        <div class="contact-information-box-3">
          <div class="row">
            <div class="col-lg-12">
              <div class="single-contact-info-box">
                <div class="contact-info">
                  <h6>Address:</h6>
                  <p>11 West Town</p>
                  <p>PBo 12345, United States</p>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="single-contact-info-box">
                <div class="contact-info">
                  <h6>Phone:</h6>
                  <p>+1 1234 56 789</p>
                  <p>+1 1234 56 780</p>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="single-contact-info-box">
                <div class="contact-info">
                  <h6>Email:</h6>
                  <p>info@example.com</p>
                  <p>email@example.com</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8 col-md-12" data-aos="fade-left">
        <div class="contact-form-box contact-form contact-form-3">
          <div class="form-container-box">
            <form class="contact-form form" id="ajax-contact" method="post" action="#">
              <div class="controls">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group form-input-box">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name*" required="required" data-error="Name is required.">
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group form-input-box">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email*" required="required" data-error="Valid email is required.">
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group form-input-box">
                      <input type="text" class="form-control" name="subject" placeholder="Subject" required="required">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group form-input-box">
                      <textarea class="form-control" id="message" name="message" rows="7" placeholder="Write Your Message*" required="required" data-error="Please, leave us a message."></textarea>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button type="submit" data-text="Send Message">Send Message</button>
                  </div>
                  <div class="messages">
                    <div class="alert alert alert-success alert-dismissable alert-dismissable hidden" id="msgSubmit">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                      Thank You! your message has been sent. 
                    </div>
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