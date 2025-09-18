@extends('layouts.app')

@section('title', $portfolio->title . ' - Case Study')
@section('description', $portfolio->description)

@section('content')
<!-- Portfolio Hero Section -->
<section class="hero sticked-header-offset py-5 position-relative" style="min-height: 70vh; @if($portfolio->image && file_exists(public_path('storage/portfolios/' . $portfolio->image))) background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('storage/portfolios/' . $portfolio->image) }}') center/cover no-repeat; @else background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); @endif">
  <div class="container position-relative" style="z-index: 2;">
    <div class="row align-items-center" style="min-height: 70vh;">
      <!-- Left Side: Title, Description, CTA -->
      <div class="col-lg-6">
        <div class="hero-content text-white">
          <span class="badge bg-warning text-dark mb-3 px-3 py-2">{{ ucfirst($portfolio->category) }} Project</span>
          <h1 class="mb-4 display-4 fw-bold" data-aos="fade-up">{{ $portfolio->title }}</h1>
          <p class="mb-4 fs-5 lead" data-aos="fade-up" data-aos-delay="200">{{ $portfolio->description }}</p>
          <div class="d-flex gap-3 flex-wrap" data-aos="fade-up" data-aos-delay="400">
            @if($portfolio->project_url)
              <a href="{{ $portfolio->project_url }}" target="_blank" class="btn btn-warning btn-lg px-4 py-3 rounded-pill fw-bold">
                <i class="bi bi-link-45deg me-2"></i>View Live Project
              </a>
            @endif
            <a href="#contact-form" class="btn btn-outline-light btn-lg px-4 py-3 rounded-pill fw-bold">
              <i class="bi bi-chat-dots me-2"></i>Get Quote
            </a>
          </div>
        </div>
      </div>
      
      <!-- Right Side: Project Details Card -->
      <div class="col-lg-6">
        <div class="project-details-card bg-white rounded-4 shadow-lg p-4" data-aos="fade-left" data-aos-delay="600" style="backdrop-filter: blur(10px); background: rgba(255,255,255,0.95);">
          <h5 class="text-dark fw-bold mb-4"><i class="bi bi-info-circle me-2 text-primary"></i>Project Details</h5>
          <div class="row g-4">
            <div class="col-12">
              <div class="detail-item d-flex align-items-center">
                <div class="detail-icon me-3">
                  <div class="d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%;">
                    <i class="bi bi-person-check text-white"></i>
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
                    <i class="bi bi-calendar-check text-white"></i>
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
                    <i class="bi bi-tag text-white"></i>
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
                    <i class="bi bi-star-fill text-white"></i>
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
    <div class="text-center mb-5">
      <h2 class="mb-3 display-6 fw-bold">Our Work Process</h2>
      <p class="text-muted fs-5">Step by step approach to deliver excellence</p>
    </div>
    
    <div class="row g-4">
      @foreach($portfolio->work_process as $index => $process)
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
        <div class="process-card text-center h-100">
          <div class="process-number mb-4">
            <div class="d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%; position: relative;">
              <span class="text-white fw-bold" style="font-size: 1.5rem;">{{ $index + 1 }}</span>
            </div>
          </div>
          
          @if(isset($process['image']) && !empty($process['image']))
          <div class="process-image mb-4">
            <img src="{{ asset('storage/portfolios/' . $process['image']) }}" alt="{{ $process['title'] ?? 'Process Step' }}" class="img-fluid rounded-3" style="max-height: 200px; width: 100%; object-fit: cover;">
          </div>
          @endif
          
          <div class="process-content">
            <h4 class="fw-bold mb-3">{{ $process['title'] ?? 'Process Step ' . ($index + 1) }}</h4>
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
    <div class="text-center mb-5">
      <h2 class="mb-3 display-6 fw-bold">Business Cases</h2>
      <p class="text-muted fs-5">Real-world applications and solutions we delivered</p>
    </div>
    
    <div class="row g-4">
      @foreach($portfolio->business_cases as $index => $case)
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
        <div class="business-case-card bg-white rounded-4 shadow-sm h-100 overflow-hidden hover-lift" style="transition: all 0.3s ease;">
          @if(isset($case['image']) && !empty($case['image']))
          <div class="case-image" style="height: 250px; overflow: hidden;">
            <img src="{{ asset('storage/portfolios/' . $case['image']) }}" alt="{{ $case['title'] ?? 'Business Case' }}" class="w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;">
          </div>
          @endif
          
          <div class="case-content p-4">
            <div class="case-number mb-3">
              <span class="badge" style="background: linear-gradient(45deg, #667eea, #764ba2); color: white; font-size: 0.9rem; padding: 8px 16px;">Case {{ $index + 1 }}</span>
            </div>
            <h4 class="fw-bold mb-3">{{ $case['title'] ?? 'Business Case ' . ($index + 1) }}</h4>
            <p class="text-muted mb-0">{{ $case['description'] ?? 'Business case description will be added here.' }}</p>
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
    <div class="row g-4 text-center">
      <div class="col-lg-3 col-md-6">
        <div class="stat-item">
          <div class="stat-icon mb-3">
            <div class="d-inline-flex align-items-center justify-content-center" style="width: 70px; height: 70px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%;">
              <i class="bi bi-calendar-check text-white" style="font-size: 1.8rem;"></i>
            </div>
          </div>
          <h4 class="fw-bold mb-2">{{ $portfolio->created_at->format('M Y') }}</h4>
          <p class="text-muted mb-0">Project Completed</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="stat-item">
          <div class="stat-icon mb-3">
            <div class="d-inline-flex align-items-center justify-content-center" style="width: 70px; height: 70px; background: linear-gradient(45deg, #f093fb, #f5576c); border-radius: 50%;">
              <i class="bi bi-person-check text-white" style="font-size: 1.8rem;"></i>
            </div>
          </div>
          <h4 class="fw-bold mb-2">{{ $portfolio->client ?: 'Confidential' }}</h4>
          <p class="text-muted mb-0">Client</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="stat-item">
          <div class="stat-icon mb-3">
            <div class="d-inline-flex align-items-center justify-content-center" style="width: 70px; height: 70px; background: linear-gradient(45deg, #4ecdc4, #44a08d); border-radius: 50%;">
              <i class="bi bi-tag text-white" style="font-size: 1.8rem;"></i>
            </div>
          </div>
          <h4 class="fw-bold mb-2">{{ ucfirst($portfolio->category) }}</h4>
          <p class="text-muted mb-0">Category</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="stat-item">
          <div class="stat-icon mb-3">
            <div class="d-inline-flex align-items-center justify-content-center" style="width: 70px; height: 70px; background: linear-gradient(45deg, #feca57, #ff9ff3); border-radius: 50%;">
              <i class="bi bi-star-fill text-white" style="font-size: 1.8rem;"></i>
            </div>
          </div>
          <h4 class="fw-bold mb-2">5.0</h4>
          <p class="text-muted mb-0">Client Rating</p>
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
        <h2 class="text-white mb-4 display-6 fw-bold">Ready to Start Your Project?</h2>
        <p class="text-white-50 mb-4 fs-5">Let's create something amazing together. Get in touch to discuss your project requirements.</p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
          <a href="#contact-form" class="btn btn-warning btn-lg px-5 py-3 rounded-pill fw-bold">
            <i class="bi bi-chat-dots me-2"></i>Start Your Project
          </a>
          @if($portfolio->project_url)
            <a href="{{ $portfolio->project_url }}" target="_blank" class="btn btn-outline-light btn-lg px-5 py-3 rounded-pill fw-bold">
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
    <div class="text-center mb-5">
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
        <div class="card h-100 border-0 shadow-sm hover-lift" style="transition: all 0.3s ease;">
          <div class="card-img-top position-relative overflow-hidden" style="height: 250px;">
            @if($related->image && file_exists(public_path('storage/portfolios/' . $related->image)))
              <img src="{{ asset('storage/portfolios/' . $related->image) }}" class="w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="{{ $related->title }}">
            @else
              <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background: linear-gradient(45deg, #667eea, #764ba2);">
                <i class="bi bi-image text-white" style="font-size: 3rem;"></i>
              </div>
            @endif
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(0,0,0,0.7); opacity: 0; transition: all 0.3s ease;">
              <a href="{{ route('case-study.show', $related) }}" class="btn btn-light btn-lg rounded-pill">
                <i class="bi bi-arrow-right me-2"></i>View Project
              </a>
            </div>
          </div>
          <div class="card-body p-4">
            <span class="badge bg-primary mb-2">{{ ucfirst($related->category) }}</span>
            <h5 class="card-title fw-bold mb-3">{{ $related->title }}</h5>
            <p class="card-text text-muted mb-3">{{ Str::limit($related->description, 100) }}</p>
            <a href="{{ route('case-study.show', $related) }}" class="btn btn-outline-primary btn-sm rounded-pill">
              View Details <i class="bi bi-arrow-right ms-1"></i>
            </a>
          </div>
        </div>
      </div>
      @empty
      <div class="col-12 text-center py-5">
        <h4 class="text-muted">No related projects found</h4>
        <p class="text-muted">Check out our other amazing projects</p>
        <a href="{{ route('case-study.index') }}" class="btn btn-primary rounded-pill px-4">View All Projects</a>
      </div>
      @endforelse
    </div>
  </div>
</section>

<!-- Client Reviews Section -->
@if(isset($portfolio->client_reviews) && is_array($portfolio->client_reviews) && count($portfolio->client_reviews) > 0)
<section class="py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
  <div class="container">
    <div class="text-center mb-5">
      <div class="d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%;">
        <i class="bi bi-chat-quote text-white" style="font-size: 1.5rem;"></i>
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
                <div class="bg-white rounded-4 p-4 position-relative" style="border: 1px solid rgba(102, 126, 234, 0.1);">
                  <!-- Quote Icon -->
                  <div class="position-absolute" style="top: -20px; left: 30px; width: 40px; height: 40px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-quote text-white" style="font-size: 1.2rem;"></i>
                  </div>
                  
                  <div class="text-center mb-4">
                    <!-- Stars -->
                    <div class="stars mb-3">
                      @for($i = 1; $i <= 5; $i++)
                        <i class="bi bi-star{{ $i <= ($review['rating'] ?? 5) ? '-fill' : '' }}" style="font-size: 1.4rem; color: #ffc107; margin: 0 2px;"></i>
                      @endfor
                    </div>
                    
                    <!-- Review Text -->
                    <blockquote class="mb-4">
                      <p class="fs-4 text-dark fst-italic lh-lg mb-0" style="font-weight: 300;">"{{ $review['message'] ?? 'Great experience working with the team. Highly recommended!' }}"</p>
                    </blockquote>
                  </div>
                  
                  <!-- Client Info -->
                  <div class="text-center">
                    <div class="client-avatar mb-3">
                      <div class="d-inline-flex align-items-center justify-content-center position-relative" style="width: 90px; height: 90px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%; box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);">
                        <span class="text-white fw-bold" style="font-size: 2rem;">{{ substr($review['name'] ?? 'Client', 0, 1) }}</span>
                        <div class="position-absolute" style="bottom: 5px; right: 5px; width: 25px; height: 25px; background: #28a745; border-radius: 50%; border: 3px solid white;">
                          <i class="bi bi-check text-white" style="font-size: 0.8rem; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"></i>
                        </div>
                      </div>
                    </div>
                    <h4 class="fw-bold mb-1" style="color: #2c3e50;">{{ $review['name'] ?? 'Anonymous Client' }}</h4>
                    <p class="text-muted mb-0 fs-6">{{ $review['position'] ?? 'Client' }}</p>
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
          <p class="text-muted fs-5 mb-4">Let's discuss your project requirements and create something amazing together.</p>
          <div class="contact-info">
            <div class="d-flex align-items-center mb-3">
              <div class="d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%;">
                <i class="bi bi-telephone text-white"></i>
              </div>
              <div>
                <h6 class="mb-0 fw-bold">Call Us</h6>
                <p class="text-muted mb-0">{{ \App\Models\SiteSetting::getValue('contact_phone', '+1 (555) 123-4567') }}</p>
              </div>
            </div>
            <div class="d-flex align-items-center mb-3">
              <div class="d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; background: linear-gradient(45deg, #f093fb, #f5576c); border-radius: 50%;">
                <i class="bi bi-envelope text-white"></i>
              </div>
              <div>
                <h6 class="mb-0 fw-bold">Email Us</h6>
                <p class="text-muted mb-0">{{ \App\Models\SiteSetting::getValue('contact_email', 'hello@company.com') }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="contact-form bg-white rounded-4 p-4" style="border: 1px solid rgba(102, 126, 234, 0.1);">
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