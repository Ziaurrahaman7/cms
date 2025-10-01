@extends('layouts.app')

@section('title', $portfolio->meta_title ?: $portfolio->title . ' - Portfolio - ' . App\Models\SiteSetting::get('site_name', 'Technoit'))
@section('description', $portfolio->meta_description ?: $portfolio->description)
@section('keywords', $portfolio->meta_keywords ?: $portfolio->title . ', portfolio, ' . $portfolio->category . ', ' . App\Models\SiteSetting::get('site_name', 'Technoit') . ', project')

@section('content')
<!-- Portfolio Hero Section -->
<section class="sticked-header-offset position-relative" style="padding-top:130px;min-height: 70vh; @if($portfolio->image && file_exists(public_path('storage/portfolios/' . $portfolio->image))) background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('storage/portfolios/' . $portfolio->image) }}') center/cover no-repeat; @else background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); @endif">
  <div class="container position-relative" style="z-index: 2;">
    <div class="row align-items-center" style="min-height: 70vh;">
      <!-- Left Side: Title, Description, CTA -->
      <div class="col-lg-6">
        <div class="text-white hero-content">
          <span class="px-3 py-2 mb-3 badge bg-warning text-dark">{{ ucfirst($portfolio->category) }} Project</span>
          <h1 class="mb-4 display-4 fw-bold" data-aos="fade-up">{{ $portfolio->title }}</h1>
          <p class="mb-4 fs-5 lead" data-aos="fade-up" data-aos-delay="200">{{ $portfolio->description }}</p>
          <div class="flex-wrap gap-3 d-flex" data-aos="fade-up" data-aos-delay="400">
            @if($portfolio->project_url)
              <a href="{{ $portfolio->project_url }}" target="_blank" class="px-4 py-3 btn btn-warning btn-lg rounded-pill fw-bold">
                <i class="bi bi-link-45deg me-2"></i>View Live Project
              </a>
            @endif
            <a href="#contact-form" class="px-4 py-3 btn btn-outline-light btn-lg rounded-pill fw-bold">
              <i class="bi bi-chat-dots me-2"></i>Get Quote
            </a>
          </div>
        </div>
      </div>
      
      <!-- Right Side: Project Details Card -->
      <div class="py-4 col-lg-6">
        <div class="p-4 bg-white shadow-lg project-details-card rounded-4" data-aos="fade-left" data-aos-delay="600" style="backdrop-filter: blur(10px); background: rgba(255,255,255,0.95);">
          <h5 class="mb-4 text-dark fw-bold"><i class="bi bi-info-circle me-2 text-primary"></i>Project Details</h5>
          <div class="row g-4">
            <div class="col-12">
              <div class="detail-item d-flex align-items-center">
                <div class="detail-icon me-3">
                  <div class="d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%;">
                    <i class="text-white bi bi-person-check"></i>
                  </div>
                </div>
                <div>
                  <small class="text-muted d-block">Client</small>
                  <strong class="text-dark fs-6">{{ $portfolio->client ?: 'Confidential' }}</strong>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="detail-item d-flex align-items-center">
                <div class="detail-icon me-3">
                  <div class="d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background: linear-gradient(45deg, #f093fb, #f5576c); border-radius: 50%;">
                    <i class="text-white bi bi-calendar-check"></i>
                  </div>
                </div>
                <div>
                  <small class="text-muted d-block">Completed</small>
                  <strong class="text-dark fs-6">{{ $portfolio->project_date ? $portfolio->project_date->format('M d, Y') : $portfolio->created_at->format('M d, Y') }}</strong>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="detail-item d-flex align-items-center">
                <div class="detail-icon me-3">
                  <div class="d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background: linear-gradient(45deg, #4ecdc4, #44a08d); border-radius: 50%;">
                    <i class="text-white bi bi-tag"></i>
                  </div>
                </div>
                <div>
                  <small class="text-muted d-block">Category</small>
                  <strong class="text-dark fs-6">{{ ucfirst($portfolio->category) }}</strong>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="detail-item d-flex align-items-center">
                <div class="detail-icon me-3">
                  <div class="d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background: linear-gradient(45deg, #feca57, #ff9ff3); border-radius: 50%;">
                    <i class="text-white bi bi-star-fill"></i>
                  </div>
                </div>
                <div>
                  <small class="text-muted d-block">Status</small>
                  <strong class="text-success fs-6">Completed</strong>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Floating Elements -->
  <div class="position-absolute" style="top: 20%; right: 10%; width: 100px; height: 100px; background: rgba(255,255,255,0.1); border-radius: 50%; animation: float 6s ease-in-out infinite;"></div>
  <div class="position-absolute" style="bottom: 20%; left: 10%; width: 80px; height: 80px; background: rgba(255,255,255,0.08); border-radius: 50%; animation: float 8s ease-in-out infinite reverse;"></div>
</section>

<!-- Work Process Section -->
@if(isset($portfolio->work_process) && is_array($portfolio->work_process) && count($portfolio->work_process) > 0)
<section class="py-5">
  <div class="container">
    <div class="mb-5 text-center">
      <h2 class="mb-3 display-6 fw-bold">Our Work Process</h2>
      <p class="text-muted fs-5">Step by step approach to deliver excellence</p>
    </div>
    
    <div class="row g-4">
      @foreach($portfolio->work_process as $index => $process)
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
        <div class="text-center process-card h-100">
          <div class="mb-4 process-number">
            <div class="d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%; position: relative;">
              <span class="text-white fw-bold" style="font-size: 1.5rem;">{{ $index + 1 }}</span>
            </div>
          </div>
          
          @if(isset($process['image']) && !empty($process['image']))
          <div class="mb-4 process-image">
            <img src="{{ asset('storage/portfolios/' . $process['image']) }}" alt="{{ $process['title'] ?? 'Process Step' }}" class="img-fluid rounded-3" style="max-height: 200px; width: 100%; object-fit: cover;">
          </div>
          @endif
          
          <div class="process-content">
            <h4 class="mb-3 fw-bold">{{ $process['title'] ?? 'Process Step ' . ($index + 1) }}</h4>
            <p class="text-muted">{{ $process['description'] ?? 'Process description will be added here.' }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- Business Cases Section -->
@if(isset($portfolio->business_cases) && is_array($portfolio->business_cases) && count($portfolio->business_cases) > 0)
<section class="py-5" style="background: #f8f9fa;">
  <div class="container">
    <div class="mb-5 text-center">
      <h2 class="mb-3 display-6 fw-bold">Business Cases</h2>
      <p class="text-muted fs-5">Real-world applications and solutions we delivered</p>
    </div>
    
    <div class="row g-4">
      @foreach($portfolio->business_cases as $index => $case)
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
        <div class="overflow-hidden bg-white shadow-sm business-case-card rounded-4 h-100 hover-lift" style="transition: all 0.3s ease;">
          @if(isset($case['image']) && !empty($case['image']))
          <div class="case-image" style="height: 250px; overflow: hidden;">
            <img src="{{ asset('storage/portfolios/' . $case['image']) }}" alt="{{ $case['title'] ?? 'Business Case' }}" class="w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;">
          </div>
          @endif
          
          <div class="p-4 case-content">
            <div class="mb-3 case-number">
              <span class="badge" style="background: linear-gradient(45deg, #667eea, #764ba2); color: white; font-size: 0.9rem; padding: 8px 16px;">Case {{ $index + 1 }}</span>
            </div>
            <h4 class="mb-3 fw-bold">{{ $case['title'] ?? 'Business Case ' . ($index + 1) }}</h4>
            <p class="mb-0 text-muted">{{ $case['description'] ?? 'Business case description will be added here.' }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- Project Stats Section -->
<section class="py-5" style="background: #f8f9fa;">
  <div class="container">
    <div class="text-center row g-4">
      <div class="col-lg-3 col-md-6">
        <div class="stat-item">
          <div class="mb-3 stat-icon">
            <div class="d-inline-flex align-items-center justify-content-center" style="width: 70px; height: 70px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%;">
              <i class="text-white bi bi-calendar-check" style="font-size: 1.8rem;"></i>
            </div>
          </div>
          <h4 class="mb-2 fw-bold">{{ $portfolio->created_at->format('M Y') }}</h4>
          <p class="mb-0 text-muted">Project Completed</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="stat-item">
          <div class="mb-3 stat-icon">
            <div class="d-inline-flex align-items-center justify-content-center" style="width: 70px; height: 70px; background: linear-gradient(45deg, #f093fb, #f5576c); border-radius: 50%;">
              <i class="text-white bi bi-person-check" style="font-size: 1.8rem;"></i>
            </div>
          </div>
          <h4 class="mb-2 fw-bold">{{ $portfolio->client ?: 'Confidential' }}</h4>
          <p class="mb-0 text-muted">Client</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="stat-item">
          <div class="mb-3 stat-icon">
            <div class="d-inline-flex align-items-center justify-content-center" style="width: 70px; height: 70px; background: linear-gradient(45deg, #4ecdc4, #44a08d); border-radius: 50%;">
              <i class="text-white bi bi-tag" style="font-size: 1.8rem;"></i>
            </div>
          </div>
          <h4 class="mb-2 fw-bold">{{ ucfirst($portfolio->category) }}</h4>
          <p class="mb-0 text-muted">Category</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="stat-item">
          <div class="mb-3 stat-icon">
            <div class="d-inline-flex align-items-center justify-content-center" style="width: 70px; height: 70px; background: linear-gradient(45deg, #feca57, #ff9ff3); border-radius: 50%;">
              <i class="text-white bi bi-star-fill" style="font-size: 1.8rem;"></i>
            </div>
          </div>
          <h4 class="mb-2 fw-bold">5.0</h4>
          <p class="mb-0 text-muted">Client Rating</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="py-5" style="background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);">
  <div class="container text-center">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <h2 class="mb-4 text-white display-6 fw-bold">Ready to Start Your Project?</h2>
        <p class="mb-4 text-white-50 fs-5">Let's create something amazing together. Get in touch to discuss your project requirements.</p>
        <div class="flex-wrap gap-3 d-flex justify-content-center">
          <a href="#contact-form" class="px-5 py-3 btn btn-warning btn-lg rounded-pill fw-bold">
            <i class="bi bi-chat-dots me-2"></i>Start Your Project
          </a>
          @if($portfolio->project_url)
            <a href="{{ $portfolio->project_url }}" target="_blank" class="px-5 py-3 btn btn-outline-light btn-lg rounded-pill fw-bold">
              <i class="bi bi-link-45deg me-2"></i>View Live Project
            </a>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Related Projects Section -->
<section class="py-5" style="background: #f8f9fa;">
  <div class="container">
    <div class="mb-5 text-center">
      <h2 class="mb-3 display-6 fw-bold">More Success Stories</h2>
      <p class="text-muted fs-5">Explore our other successful projects</p>
    </div>
    
    <div class="row g-4">
      @php
        $relatedPortfolios = \App\Models\Portfolio::active()
          ->where('category', $portfolio->category)
          ->where('id', '!=', $portfolio->id)
          ->take(3)
          ->get();
      @endphp
      
      @forelse($relatedPortfolios as $related)
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
        <div class="border-0 shadow-sm card h-100 hover-lift" style="transition: all 0.3s ease;">
          <div class="overflow-hidden card-img-top position-relative" style="height: 250px;">
            @if($related->image && file_exists(public_path('storage/portfolios/' . $related->image)))
              <img src="{{ asset('storage/portfolios/' . $related->image) }}" class="w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="{{ $related->title }}">
            @else
              <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background: linear-gradient(45deg, #667eea, #764ba2);">
                <i class="text-white bi bi-image" style="font-size: 3rem;"></i>
              </div>
            @endif
            <div class="top-0 position-absolute start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(0,0,0,0.7); opacity: 0; transition: all 0.3s ease;">
              <a href="{{ route('portfolio.show', $related->id) }}" class="btn btn-light btn-lg rounded-pill">
                <i class="bi bi-arrow-right me-2"></i>View Project
              </a>
            </div>
          </div>
          <div class="p-4 card-body">
            <span class="mb-2 badge bg-primary">{{ ucfirst($related->category) }}</span>
            <h5 class="mb-3 card-title fw-bold">{{ $related->title }}</h5>
            <p class="mb-3 card-text text-muted">{{ Str::limit($related->description, 100) }}</p>
            <a href="{{ route('portfolio.show', $related->id) }}" class="btn btn-outline-primary btn-sm rounded-pill">
              View Details <i class="bi bi-arrow-right ms-1"></i>
            </a>
          </div>
        </div>
      </div>
      @empty
      <div class="py-5 text-center col-12">
        <h4 class="text-muted">No related projects found</h4>
        <p class="text-muted">Check out our other amazing projects</p>
        <a href="{{ route('portfolio.index') }}" class="px-4 btn btn-primary rounded-pill">View All Projects</a>
      </div>
      @endforelse
    </div>
  </div>
</section>

<!-- Client Reviews Section -->
@if(isset($portfolio->client_reviews) && is_array($portfolio->client_reviews) && count($portfolio->client_reviews) > 0)
<section class="py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
  <!-- Background Elements -->
  <div class="position-absolute" style="top: -50px; right: -50px; width: 200px; height: 200px; background: rgba(255,255,255,0.1); border-radius: 50%; animation: float 8s ease-in-out infinite;"></div>
  <div class="position-absolute" style="bottom: -30px; left: -30px; width: 150px; height: 150px; background: rgba(255,255,255,0.05); border-radius: 50%; animation: float 6s ease-in-out infinite reverse;"></div>
  
  <div class="container position-relative">
    <div class="mb-5 text-center">
      <div class="mb-4 d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background: rgba(255,255,255,0.2); border-radius: 50%; backdrop-filter: blur(10px);">
        <i class="text-white bi bi-chat-heart" style="font-size: 2rem;"></i>
      </div>
      <h2 class="mb-3 text-white display-5 fw-bold" data-aos="fade-up">What Our Clients Say</h2>
      <p class="text-white-50 fs-5" data-aos="fade-up" data-aos-delay="200">Real feedback from satisfied clients</p>
    </div>
    
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div id="clientReviewsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000">
          <div class="carousel-inner">
            @foreach($portfolio->client_reviews as $index => $review)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
              <div class="review-card position-relative" style="padding: 0 20px;">
                <div class="p-5 position-relative" style="background: rgba(255,255,255,0.95); border-radius: 25px; backdrop-filter: blur(20px); box-shadow: 0 25px 50px rgba(0,0,0,0.15);">
                  
                  <!-- Decorative Quote -->
                  <div class="position-absolute" style="top: -25px; left: 50%; transform: translateX(-50%); width: 50px; height: 50px; background: linear-gradient(45deg, #ffd700, #ffed4e); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 30px rgba(255,215,0,0.4);">
                    <i class="text-white bi bi-quote" style="font-size: 1.5rem;"></i>
                  </div>
                  
                  <div class="text-center" style="padding-top: 30px;">
                    <!-- Client Avatar -->
                    <div class="mb-4 client-avatar">
                      @if(isset($review['image']) && !empty($review['image']))
                        <img src="{{ asset('storage/portfolios/' . $review['image']) }}" alt="{{ $review['name'] ?? 'Client' }}" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover; border: 5px solid white; box-shadow: 0 15px 35px rgba(0,0,0,0.1);">
                      @else
                        <div class="d-inline-flex align-items-center justify-content-center position-relative" style="width: 100px; height: 100px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%; border: 5px solid white; box-shadow: 0 15px 35px rgba(102, 126, 234, 0.3);">
                          <span class="text-white fw-bold" style="font-size: 2.5rem;">{{ substr($review['name'] ?? 'C', 0, 1) }}</span>
                        </div>
                      @endif
                      <div class="position-absolute" style="bottom: 5px; right: calc(50% - 60px); width: 30px; height: 30px; background: #28a745; border-radius: 50%; border: 4px solid white; box-shadow: 0 5px 15px rgba(40,167,69,0.3);">
                        <i class="text-white bi bi-patch-check-fill" style="font-size: 1rem; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"></i>
                      </div>
                    </div>
                    
                    <!-- Client Info -->
                    <div class="mb-4">
                      <h4 class="mb-1 fw-bold" style="color: #2c3e50; font-size: 1.5rem;">{{ $review['name'] ?? 'Anonymous Client' }}</h4>
                      <p class="mb-2 text-muted fs-6 fw-medium">{{ $review['position'] ?? 'Valued Client' }}</p>
                      <span class="badge px-3 py-2" style="background: linear-gradient(45deg, #667eea, #764ba2); color: white; border-radius: 25px; font-size: 0.85rem;">✓ Verified Review</span>
                    </div>
                    
                    <!-- Stars -->
                    <div class="mb-4 stars">
                      @for($i = 1; $i <= 5; $i++)
                        <i class="bi bi-star{{ $i <= ($review['rating'] ?? 5) ? '-fill' : '' }}" style="font-size: 1.8rem; color: #ffd700; margin: 0 3px; filter: drop-shadow(0 2px 4px rgba(255,215,0,0.3));"></i>
                      @endfor
                    </div>
                    
                    <!-- Review Text -->
                    <blockquote class="mb-0">
                      @php
                        $message = $review['message'] ?? 'Outstanding work! The team exceeded our expectations and delivered exceptional results. Highly recommended for anyone looking for quality and professionalism.';
                        $shortMessage = Str::limit($message, 120);
                        $isLong = strlen($message) > 120;
                      @endphp
                      
                      <div class="review-text-container">
                        <p class="mb-0 fs-4 text-dark lh-lg review-text-short {{ $isLong ? '' : 'd-none' }}" style="font-weight: 400; font-style: italic; position: relative;">"{{ $shortMessage }}"</p>
                        <p class="mb-0 fs-4 text-dark lh-lg review-text-full {{ $isLong ? 'd-none' : '' }}" style="font-weight: 400; font-style: italic; position: relative;">"{{ $message }}"</p>
                        
                        @if($isLong)
                        <button class="btn btn-link p-0 mt-3 read-more-btn" style="color: #667eea; font-weight: 600; text-decoration: none; font-size: 0.95rem; padding: 5px 10px !important; border-radius: 15px; background: rgba(102, 126, 234, 0.1);">
                          <i class="bi bi-plus-circle me-1"></i>Read More
                        </button>
                        <button class="btn btn-link p-0 mt-3 read-less-btn d-none" style="color: #667eea; font-weight: 600; text-decoration: none; font-size: 0.95rem; padding: 5px 10px !important; border-radius: 15px; background: rgba(102, 126, 234, 0.1);">
                          <i class="bi bi-dash-circle me-1"></i>Read Less
                        </button>
                        @endif
                      </div>
                    </blockquote>
                  </div>
                  
                  <!-- Decorative Elements -->
                  <div class="position-absolute" style="top: 20px; right: 20px; width: 60px; height: 60px; background: linear-gradient(45deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1)); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-heart-fill" style="color: #ff6b6b; font-size: 1.2rem;"></i>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          
          @if(count($portfolio->client_reviews) > 1)
          <!-- Carousel Controls -->
          <button class="carousel-control-prev" type="button" data-bs-target="#clientReviewsCarousel" data-bs-slide="prev" style="width: 70px; left: -100px; top: 50%; transform: translateY(-50%);">
            <div class="d-flex align-items-center justify-content-center" style="width: 70px; height: 70px; background: rgba(255,255,255,0.9); border-radius: 50%; box-shadow: 0 15px 35px rgba(0,0,0,0.1); backdrop-filter: blur(10px); transition: all 0.3s ease;">
              <i class="bi bi-chevron-left" style="font-size: 1.8rem; color: #667eea;"></i>
            </div>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#clientReviewsCarousel" data-bs-slide="next" style="width: 70px; right: -100px; top: 50%; transform: translateY(-50%);">
            <div class="d-flex align-items-center justify-content-center" style="width: 70px; height: 70px; background: rgba(255,255,255,0.9); border-radius: 50%; box-shadow: 0 15px 35px rgba(0,0,0,0.1); backdrop-filter: blur(10px); transition: all 0.3s ease;">
              <i class="bi bi-chevron-right" style="font-size: 1.8rem; color: #667eea;"></i>
            </div>
          </button>
          
          <!-- Carousel Indicators -->
          <div class="carousel-indicators" style="bottom: -80px; padding: 20px 0;">
            @foreach($portfolio->client_reviews as $index => $review)
            <button type="button" data-bs-target="#clientReviewsCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" style="width: 12px; height: 12px; border-radius: 50%; background: rgba(255,255,255,0.5); border: 2px solid white; box-shadow: 0 3px 10px rgba(0,0,0,0.2); margin: 0 6px; transition: all 0.3s ease;"></button>
            @endforeach
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
@endif

<!-- Contact Form Section -->
<section class="py-5" id="contact-form">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="contact-content">
          <h2 class="mb-4 display-6 fw-bold">Ready to Start Your Project?</h2>
          <p class="mb-4 text-muted fs-5">Let's discuss your project requirements and create something amazing together.</p>
          <div class="contact-info">
            <div class="mb-3 d-flex align-items-center">
              <div class="d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%;">
                <i class="text-white bi bi-telephone"></i>
              </div>
              <div>
                <h6 class="mb-0 fw-bold">Call Us</h6>
                <p class="mb-0 text-muted">{{ \App\Models\SiteSetting::get('contact_phone', '+1 (234) 567-890') }}</p>
              </div>
            </div>
            <div class="mb-3 d-flex align-items-center">
              <div class="d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; background: linear-gradient(45deg, #f093fb, #f5576c); border-radius: 50%;">
                <i class="text-white bi bi-envelope"></i>
              </div>
              <div>
                <h6 class="mb-0 fw-bold">Email Us</h6>
                <p class="mb-0 text-muted">{{ \App\Models\SiteSetting::get('contact_email', 'info@example.com') }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="p-4 bg-white contact-form rounded-4" style="border: 1px solid rgba(102, 126, 234, 0.1);">
          <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <div class="row g-3">
              <div class="col-md-6">
                <label for="name" class="form-label fw-bold">Name *</label>
                <input type="text" class="form-control" id="name" name="name" required style="border: 2px solid #e9ecef; border-radius: 10px; padding: 12px;">
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label fw-bold">Email *</label>
                <input type="email" class="form-control" id="email" name="email" required style="border: 2px solid #e9ecef; border-radius: 10px; padding: 12px;">
              </div>
              <div class="col-12">
                <label for="phone" class="form-label fw-bold">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" style="border: 2px solid #e9ecef; border-radius: 10px; padding: 12px;">
              </div>
              <div class="col-12">
                <label for="subject" class="form-label fw-bold">Subject *</label>
                <input type="text" class="form-control" id="subject" name="subject" required style="border: 2px solid #e9ecef; border-radius: 10px; padding: 12px;">
              </div>
              <div class="col-12">
                <label for="message" class="form-label fw-bold">Message *</label>
                <textarea class="form-control" id="message" name="message" rows="4" required style="border: 2px solid #e9ecef; border-radius: 10px; padding: 12px;"></textarea>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-lg w-100 fw-bold" style="background: linear-gradient(45deg, #667eea, #764ba2); color: white; border: none; border-radius: 10px; padding: 15px;">
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

<style>
@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-20px); }
}

.hover-lift:hover {
  transform: translateY(-10px);
  box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
}

.hover-lift:hover img {
  transform: scale(1.1);
}

.hover-lift:hover .position-absolute {
  opacity: 1 !important;
}

.content-box {
  border-left: 5px solid #667eea;
}

/* Testimonial Section Enhancements */
.carousel-control-prev:hover > div,
.carousel-control-next:hover > div {
  transform: scale(1.1);
  background: white !important;
  box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important;
}

.carousel-indicators button:hover {
  background: white !important;
  transform: scale(1.2);
}

.carousel-indicators button.active {
  background: white !important;
  transform: scale(1.3);
}

.review-card .position-relative:hover {
  transform: translateY(-5px);
  transition: all 0.3s ease;
}

.stars i {
  transition: all 0.2s ease;
}

.stars:hover i {
  transform: scale(1.1);
}

.read-more-btn:hover,
.read-less-btn:hover {
  color: #764ba2 !important;
  text-decoration: none !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Read More/Less functionality
  document.querySelectorAll('.read-more-btn').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      const container = this.closest('.review-text-container');
      const shortText = container.querySelector('.review-text-short');
      const fullText = container.querySelector('.review-text-full');
      const readMoreBtn = container.querySelector('.read-more-btn');
      const readLessBtn = container.querySelector('.read-less-btn');
      
      shortText.classList.add('d-none');
      fullText.classList.remove('d-none');
      readMoreBtn.classList.add('d-none');
      readLessBtn.classList.remove('d-none');
    });
  });
  
  document.querySelectorAll('.read-less-btn').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      const container = this.closest('.review-text-container');
      const shortText = container.querySelector('.review-text-short');
      const fullText = container.querySelector('.review-text-full');
      const readMoreBtn = container.querySelector('.read-more-btn');
      const readLessBtn = container.querySelector('.read-less-btn');
      
      shortText.classList.remove('d-none');
      fullText.classList.add('d-none');
      readMoreBtn.classList.remove('d-none');
      readLessBtn.classList.add('d-none');
    });
  });
});
</script>
@endsection