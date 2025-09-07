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
          <li data-filter=".filter-app">App Design</li>
          <li data-filter=".filter-product">App Development</li>
          <li data-filter=".filter-branding">Branding</li>
          <li data-filter=".filter-books">IT Solutions</li>
        </ul>
      </div>
      <div class="row gy-4 portfolio-container">
        <div class="col-xl-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <a href="{{ asset('assets/images/portfolio/product-1.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset('assets/images/portfolio/product-1.jpg') }}" class="img-fluid" alt=""></a>
          </div>
        </div>
        <div class="col-xl-4 col-md-6 portfolio-item filter-product">
          <div class="portfolio-wrap">
            <a href="{{ asset('assets/images/portfolio/product-2.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset('assets/images/portfolio/product-2.jpg') }}" class="img-fluid" alt=""></a>
          </div>
        </div>
        <div class="col-xl-4 col-md-6 portfolio-item filter-branding">
          <div class="portfolio-wrap">
            <a href="{{ asset('assets/images/portfolio/product-3.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset('assets/images/portfolio/product-3.jpg') }}" class="img-fluid" alt=""></a>
          </div>
        </div>
        <div class="col-xl-4 col-md-6 portfolio-item filter-books">
          <div class="portfolio-wrap">
            <a href="{{ asset('assets/images/portfolio/product-4.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset('assets/images/portfolio/product-4.jpg') }}" class="img-fluid" alt=""></a>
          </div>
        </div>
        <div class="col-xl-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <a href="{{ asset('assets/images/portfolio/product-5.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset('assets/images/portfolio/product-5.jpg') }}" class="img-fluid" alt=""></a>
          </div>
        </div>
        <div class="col-xl-4 col-md-6 portfolio-item filter-branding">
          <div class="portfolio-wrap">
            <a href="{{ asset('assets/images/portfolio/product-6.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset('assets/images/portfolio/product-6.jpg') }}" class="img-fluid" alt=""></a>
          </div>
        </div>
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
        <p>Lorem ipsum dolor sit amet</p>
      </div>
      <div class="row">
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
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> Unlimited GB Space</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> 30 Domain Names</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> Free SSL</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> Daily Backup</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> Free Templates</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> Free Email</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> 10 Databases</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> Unlimited Email Address</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> Live Support</li>
              </ul>
            </div>
            <a href="#">Order Now</a>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card text-center">
            <div class="title">
              <h2>Standard</h2>
            </div>
            <div class="price">
              <h4><sup>$</sup>50</h4>
            </div>
            <div class="option">
              <ul>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> Unlimited GB Space</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> 30 Domain Names</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> Free SSL</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> Daily Backup</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> Free Templates</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> Free Email</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> 10 Databases</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> Unlimited Email Address</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> Live Support</li>
              </ul>
            </div>
            <a href="#">Order Now</a>
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
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> Unlimited GB Space</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> 30 Domain Names</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> Free SSL</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> Daily Backup</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> Free Templates</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> Free Email</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> 10 Databases</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> Unlimited Email Address</li>
                <li><i class="bi bi-check-circle" aria-hidden="true"></i> Live Support</li>
              </ul>
            </div>
            <a href="#">Order Now</a>
          </div>
        </div>
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
        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="testimonial-item">
              <div class="d-flex align-items-center info-box">
                <img src="{{ asset('assets/images/testimonials/testimonial-1.jpg') }}" class="testimonial-img flex-shrink-0" alt="">
                <div>
                  <h3>John Doe</h3>
                  <h4>CFO</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                </div>
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus.
                Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam.
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="testimonial-item">
              <div class="d-flex align-items-center info-box">
                <img src="{{ asset('assets/images/testimonials/testimonial-2.jpg') }}" class="testimonial-img flex-shrink-0" alt="">
                <div>
                  <h3>Afa Rose</h3>
                  <h4>Web Designer</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                </div>
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus.
                Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam.
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="testimonial-item">
              <div class="d-flex align-items-center info-box">
                <img src="{{ asset('assets/images/testimonials/testimonial-3.jpg') }}" class="testimonial-img flex-shrink-0" alt="">
                <div>
                  <h3>Keena Lara</h3>
                  <h4>Store Owner</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                </div>
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus.
                Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam.
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="testimonial-item">
              <div class="d-flex align-items-center info-box">
                <img src="{{ asset('assets/images/testimonials/testimonial-4.jpg') }}" class="testimonial-img flex-shrink-0" alt="">
                <div>
                  <h3>Fizzi Brandon</h3>
                  <h4>Freelancer</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                </div>
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus.
                Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam.
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div>
        </div>
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
          <div class="accordion-item">
            <h3 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                <span class="num"><i class="bi bi-arrow-right-circle-fill"></i></span>
                What is web domain and hosting?
              </button>
            </h3>
            <div id="faq-content-1" class="accordion-collapse collapse show" data-bs-parent="#faqlist">
              <div class="accordion-body">
                Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur
                magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum
                quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut
                labore et dolore magnam aliquam quaerat voluptatem.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                <span class="num"><i class="bi bi-arrow-right-circle-fill"></i></span>
                Which server is best for websites linux or windows?
              </button>
            </h3>
            <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
              <div class="accordion-body">
                Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur
                magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum
                quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut
                labore et dolore magnam aliquam quaerat voluptatem.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                <span class="num"><i class="bi bi-arrow-right-circle-fill"></i></span>
                Google cloud or Amazon server which one is best and fast?
              </button>
            </h3>
            <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
              <div class="accordion-body">
                Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur
                magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum
                quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut
                labore et dolore magnam aliquam quaerat voluptatem.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                <span class="num"><i class="bi bi-arrow-right-circle-fill"></i></span>
                Why Organic SEO is important for all businesses?
              </button>
            </h3>
            <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
              <div class="accordion-body">
                Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur
                magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum
                quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut
                labore et dolore magnam aliquam quaerat voluptatem.
              </div>
            </div>
          </div>
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