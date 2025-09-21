@extends('layouts.app')

@section('title', $portfolio->meta_title ?: $portfolio->title . ' - Case Study - ' . App\Models\SiteSetting::get('site_name', 'Technoit'))
@section('description', $portfolio->meta_description ?: $portfolio->description)
@section('keywords', $portfolio->meta_keywords ?: $portfolio->title . ', case study, ' . $portfolio->category . ', ' . App\Models\SiteSetting::get('site_name', 'Technoit') . ', portfolio, project')

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
              <a href="{{ route('case-study.show', $related) }}" class="btn btn-light btn-lg rounded-pill">
                <i class="bi bi-arrow-right me-2"></i>View Project
              </a>
            </div>
          </div>
          <div class="p-4 card-body">
            <span class="mb-2 badge bg-primary">{{ ucfirst($related->category) }}</span>
            <h5 class="mb-3 card-title fw-bold">{{ $related->title }}</h5>
            <p class="mb-3 card-text text-muted">{{ Str::limit($related->description, 100) }}</p>
            <a href="{{ route('case-study.show', $related) }}" class="btn btn-outline-primary btn-sm rounded-pill">
              View Details <i class="bi bi-arrow-right ms-1"></i>
            </a>
          </div>
        </div>
      </div>
      @empty
      <div class="py-5 text-center col-12">
        <h4 class="text-muted">No related projects found</h4>
        <p class="text-muted">Check out our other amazing projects</p>
        <a href="{{ route('case-study.index') }}" class="px-4 btn btn-primary rounded-pill">View All Projects</a>
      </div>
      @endforelse
    </div>
  </div>
</section>

<!-- Client Reviews Section -->
@if(isset($portfolio->client_reviews) && is_array($portfolio->client_reviews) && count($portfolio->client_reviews) > 0)
<section class="py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
  <div class="container">
    <div class="mb-5 text-center">
      <div class="mb-3 d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%;">
        <i class="text-white bi bi-chat-quote" style="font-size: 1.5rem;"></i>
      </div>
      <h2 class="mb-3 display-6 fw-bold">Client Reviews</h2>
      <p class="text-muted fs-5">What our clients say about this project</p>
    </div>
    
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div id="clientReviewsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
          <div class="carousel-inner">
            @foreach($portfolio->client_reviews as $index => $review)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
              <div class="review-card position-relative" style="padding: 0 40px;">
                <div class="p-4 bg-white rounded-4 position-relative" style="border: 1px solid rgba(102, 126, 234, 0.1);">
                  <!-- Quote Icon -->
                  <div class="position-absolute" style="top: -20px; left: 30px; width: 40px; height: 40px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <i class="text-white bi bi-quote" style="font-size: 1.2rem;"></i>
                  </div>
                  
                  <div class="mb-4 text-center">
                    <!-- Stars -->
                    <div class="mb-3 stars">
                      @for($i = 1; $i <= 5; $i++)
                        <i class="bi bi-star{{ $i <= ($review['rating'] ?? 5) ? '-fill' : '' }}" style="font-size: 1.4rem; color: #ffc107; margin: 0 2px;"></i>
                      @endfor
                    </div>
                    
                    <!-- Review Text -->
                    <blockquote class="mb-4">
                      <p class="mb-0 fs-4 text-dark fst-italic lh-lg" style="font-weight: 300;">"{{ $review['message'] ?? 'Great experience working with the team. Highly recommended!' }}"</p>
                    </blockquote>
                  </div>
                  
                  <!-- Client Info -->
                  <div class="text-center">
                    <div class="mb-3 client-avatar">
                      <div class="d-inline-flex align-items-center justify-content-center position-relative" style="width: 90px; height: 90px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%; box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);">
                        <span class="text-white fw-bold" style="font-size: 2rem;">{{ substr($review['name'] ?? 'Client', 0, 1) }}</span>
                        <div class="position-absolute" style="bottom: 5px; right: 5px; width: 25px; height: 25px; background: #28a745; border-radius: 50%; border: 3px solid white;">
                          <i class="text-white bi bi-check" style="font-size: 0.8rem; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"></i>
                        </div>
                      </div>
                    </div>
                    <h4 class="mb-1 fw-bold" style="color: #2c3e50;">{{ $review['name'] ?? 'Anonymous Client' }}</h4>
                    <p class="mb-0 text-muted fs-6">{{ $review['position'] ?? 'Client' }}</p>
                    <div class="mt-2">
                      <span class="badge" style="background: linear-gradient(45deg, #667eea, #764ba2); color: white; padding: 6px 12px; border-radius: 20px;">Verified Client</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          
          @if(count($portfolio->client_reviews) > 1)
          <!-- Carousel Controls -->
          <button class="carousel-control-prev" type="button" data-bs-target="#clientReviewsCarousel" data-bs-slide="prev" style="width: 60px; left: -80px; top: 50%; transform: translateY(-50%);">
            <div class="d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: white; border-radius: 50%; box-shadow: 0 8px 25px rgba(0,0,0,0.15); border: 1px solid rgba(102, 126, 234, 0.2);">
              <i class="bi bi-chevron-left" style="font-size: 1.5rem; color: #667eea;"></i>
            </div>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#clientReviewsCarousel" data-bs-slide="next" style="width: 60px; right: -80px; top: 50%; transform: translateY(-50%);">
            <div class="d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: white; border-radius: 50%; box-shadow: 0 8px 25px rgba(0,0,0,0.15); border: 1px solid rgba(102, 126, 234, 0.2);">
              <i class="bi bi-chevron-right" style="font-size: 1.5rem; color: #667eea;"></i>
            </div>
          </button>
          
          <!-- Carousel Indicators -->
          <div class="carousel-indicators" style="bottom: -60px;">
            @foreach($portfolio->client_reviews as $index => $review)
            <button type="button" data-bs-target="#clientReviewsCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" style="width: 15px; height: 15px; border-radius: 50%; background: #667eea; border: 2px solid white; box-shadow: 0 2px 8px rgba(0,0,0,0.2); margin: 0 5px;"></button>
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
                <p class="mb-0 text-muted">{{ \App\Models\SiteSetting::getValue('contact_phone', '+1 (555) 123-4567') }}</p>
              </div>
            </div>
            <div class="mb-3 d-flex align-items-center">
              <div class="d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; background: linear-gradient(45deg, #f093fb, #f5576c); border-radius: 50%;">
                <i class="text-white bi bi-envelope"></i>
              </div>
              <div>
                <h6 class="mb-0 fw-bold">Email Us</h6>
                <p class="mb-0 text-muted">{{ \App\Models\SiteSetting::getValue('contact_email', 'hello@company.com') }}</p>
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
</style>
@endsection