@extends('layouts.app')

@section('title', $caseStudy->meta_title ?: $caseStudy->title . ' - Case Study - ' . App\Models\SiteSetting::get('site_name', 'Technoit'))
@section('description', $caseStudy->meta_description ?: Str::limit(strip_tags($caseStudy->description), 160))
@section('keywords', $caseStudy->meta_keywords ?: $caseStudy->title . ', case study, ' . $caseStudy->category)

@section('content')
<!-- Case Study Hero Section -->
<section class="sticked-header-offset position-relative" style="padding-top:130px;min-height: 70vh; @if($caseStudy->featured_image) background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('storage/' . $caseStudy->featured_image) }}') center/cover no-repeat; @else background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); @endif">
  <div class="container position-relative" style="z-index: 2;">
    <div class="row align-items-center" style="min-height: 70vh;">
      <!-- Left Side: Title, Description, CTA -->
      <div class="col-lg-6">
        <div class="text-white hero-content">

          <span class="px-3 py-2 mb-3 badge bg-warning text-dark">{{ ucfirst($caseStudy->category) }} Case Study</span>
          <h1 class="mb-4 display-4 fw-bold" data-aos="fade-up">{{ $caseStudy->title }}</h1>
          <p class="mb-4 fs-5 lead" data-aos="fade-up" data-aos-delay="200">{{ Str::limit(strip_tags($caseStudy->description), 200) }}</p>
          <div class="flex-wrap gap-3 d-flex" data-aos="fade-up" data-aos-delay="400">
            @if($caseStudy->project_url)
              <a href="{{ $caseStudy->project_url }}" target="_blank" class="px-4 py-3 btn btn-warning btn-lg rounded-pill fw-bold">
                <i class="bi bi-link-45deg me-2"></i>View Live Project
              </a>
            @endif
            <a href="#case-study-details" class="px-4 py-3 btn btn-outline-light btn-lg rounded-pill fw-bold">
              <i class="bi bi-arrow-down me-2"></i>Read Case Study
            </a>
          </div>
        </div>
      </div>
      
      <!-- Right Side: Project Details Card -->
      <div class="py-4 col-lg-6">
        <div class="p-4 bg-white shadow-lg project-details-card rounded-4" data-aos="fade-left" data-aos-delay="600" style="backdrop-filter: blur(10px); background: rgba(255,255,255,0.95);">
          <h5 class="mb-4 text-dark fw-bold"><i class="bi bi-info-circle me-2 text-primary"></i>Project Overview</h5>
          <div class="row g-4">
            @if($caseStudy->client)
            <div class="col-12">
              <div class="detail-item d-flex align-items-center">
                <div class="detail-icon me-3">
                  <div class="d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%;">
                    <i class="text-white bi bi-person-check"></i>
                  </div>
                </div>
                <div>
                  <small class="text-muted d-block">Client</small>
                  <strong class="text-dark fs-6">{{ $caseStudy->client }}</strong>
                </div>
              </div>
            </div>
            @endif
            @if($caseStudy->project_date)
            <div class="col-12">
              <div class="detail-item d-flex align-items-center">
                <div class="detail-icon me-3">
                  <div class="d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background: linear-gradient(45deg, #f093fb, #f5576c); border-radius: 50%;">
                    <i class="text-white bi bi-calendar-check"></i>
                  </div>
                </div>
                <div>
                  <small class="text-muted d-block">Completed</small>
                  <strong class="text-dark fs-6">{{ $caseStudy->project_date->format('M d, Y') }}</strong>
                </div>
              </div>
            </div>
            @endif
            <div class="col-12">
              <div class="detail-item d-flex align-items-center">
                <div class="detail-icon me-3">
                  <div class="d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background: linear-gradient(45deg, #4ecdc4, #44a08d); border-radius: 50%;">
                    <i class="text-white bi bi-tag"></i>
                  </div>
                </div>
                <div>
                  <small class="text-muted d-block">Category</small>
                  <strong class="text-dark fs-6">{{ ucfirst($caseStudy->category) }}</strong>
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
</section>

<!-- Work Process Section -->
@if($caseStudy->work_process && is_array($caseStudy->work_process) && count($caseStudy->work_process) > 0)
<section class="py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
  <div class="container">
    <div class="mb-5 text-center">
      <h2 class="mb-3 display-6 fw-bold text-white">Our Work Process</h2>
      <p class="text-white-50 fs-5">Step by step approach to deliver excellence</p>
    </div>
    
    <div class="row g-4">
      @foreach($caseStudy->work_process as $index => $process)
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
        <div class="card border-0 shadow-lg h-100 process-card" style="background: rgba(255,255,255,0.95); backdrop-filter: blur(10px);">
          <div class="card-body text-center p-4">
            <div class="mb-4 process-number position-relative">
              <div class="d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background: linear-gradient(45deg, #ffd700, #ff6b6b); border-radius: 50%; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                <span class="text-white fw-bold" style="font-size: 1.8rem;">{{ is_array($process) ? ($process['order'] ?? $index + 1) : $index + 1 }}</span>
              </div>
            </div>
            
            <div class="process-content">
              <h4 class="mb-3 fw-bold text-dark">{{ is_array($process) ? ($process['title'] ?? 'Process Step ' . ($index + 1)) : 'Process Step ' . ($index + 1) }}</h4>
              <p class="text-muted mb-0 lh-lg">{{ is_array($process) ? ($process['description'] ?? 'Process description will be added here.') : 'Process description will be added here.' }}</p>
            </div>
          </div>
          
          <div class="card-footer bg-transparent border-0 text-center">
            <div class="d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%;">
              <i class="bi bi-check2 text-white fw-bold"></i>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- Technologies Used -->
@if($caseStudy->technologies)
<section class="py-5">
  <div class="container">
    <div class="mb-5 text-center">
      <h2 class="mb-3 display-6 fw-bold d-flex align-items-center justify-content-center">
        <i class="bi bi-gear-fill me-3 text-primary" style="font-size: 2rem;"></i>
        Technologies Used
      </h2>
      <p class="text-muted fs-5">Tools and technologies that powered this project</p>
    </div>
    <div class="row g-4">
      @if(is_array($caseStudy->technologies))
        @foreach($caseStudy->technologies as $index => $tech)
        <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
          <div class="card border-0 shadow-sm h-100 hover-lift text-center">
            <div class="card-body p-4">
              @if(is_array($tech) && isset($tech['icon']))
                <i class="{{ $tech['icon'] }} text-primary mb-3" style="font-size: 3rem;"></i>
              @else
                <i class="bi bi-code-slash text-primary mb-3" style="font-size: 3rem;"></i>
              @endif
              <h5 class="mb-0 fw-bold">{{ is_array($tech) ? ($tech['name'] ?? 'Technology') : $tech }}</h5>
            </div>
          </div>
        </div>
        @endforeach
      @else
        @foreach(explode(',', $caseStudy->technologies) as $index => $tech)
        <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
          <div class="card border-0 shadow-sm h-100 hover-lift text-center">
            <div class="card-body p-4">
              <i class="bi bi-code-slash text-primary mb-3" style="font-size: 3rem;"></i>
              <h5 class="mb-0 fw-bold">{{ trim($tech) }}</h5>
            </div>
          </div>
        </div>
        @endforeach
      @endif
    </div>
  </div>
</section>
@endif

<!-- Custom Sections -->
@if($caseStudy->sections && is_array($caseStudy->sections) && count($caseStudy->sections) > 0)
@foreach($caseStudy->sections as $index => $section)
<section class="py-5 {{ $index % 2 == 0 ? 'bg-light' : '' }}">
  <div class="container">
    <div class="row align-items-center {{ $index % 2 == 1 ? 'flex-row-reverse' : '' }}">
      @if(is_array($section) && isset($section['image']) && $section['image'])
      <div class="mb-4 col-lg-6 mb-lg-0">
        <img src="{{ asset('storage/' . $section['image']) }}" alt="{{ $section['title'] ?? 'Section Image' }}" class="shadow img-fluid rounded-3" data-aos="fade-{{ $index % 2 == 0 ? 'right' : 'left' }}">
      </div>
      <div class="col-lg-6">
      @else
      <div class="col-lg-12">
      @endif
        <div class="px-lg-4" data-aos="fade-{{ $index % 2 == 0 ? 'left' : 'right' }}">
          @if(is_array($section) && isset($section['title']) && $section['title'])
            <h2 class="mb-4 display-6 fw-bold">{{ $section['title'] }}</h2>
          @endif
          @if(is_array($section) && isset($section['content']) && $section['content'])
            <div class="content fs-5 text-muted lh-lg">
              {!! nl2br(e($section['content'])) !!}
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
@endforeach
@endif

<!-- Challenges -->
@if($caseStudy->challenges)
<section class="py-5" style="background: #f8f9fa;">
  <div class="container">
    <div class="mb-5 text-center">
      <h2 class="mb-3 display-6 fw-bold text-danger d-flex align-items-center justify-content-center">
        <i class="bi bi-exclamation-triangle-fill me-3" style="font-size: 2rem;"></i>
        Project Challenges
      </h2>
      <p class="text-muted fs-5">Obstacles we faced and overcame during development</p>
    </div>
    <div class="row align-items-center">
      @if($caseStudy->challenges_image)
      <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
        <img src="{{ asset('storage/' . $caseStudy->challenges_image) }}" alt="Challenges" class="img-fluid rounded-3 shadow">
      </div>
      <div class="col-lg-6" data-aos="fade-left">
      @else
      <div class="col-12" data-aos="fade-up">
      @endif
        <div class="p-4 bg-white rounded-3 border-start border-danger border-4 shadow-sm">
          <div class="content fs-5 text-muted lh-lg">
            {!! nl2br(e($caseStudy->challenges)) !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endif

<!-- Solutions -->
@if($caseStudy->solutions)
<section class="py-5">
  <div class="container">
    <div class="mb-5 text-center">
      <h2 class="mb-3 display-6 fw-bold text-success d-flex align-items-center justify-content-center">
        <i class="bi bi-lightbulb-fill me-3" style="font-size: 2rem;"></i>
        Solutions Provided
      </h2>
      <p class="text-muted fs-5">How we solved the challenges and implemented solutions</p>
    </div>
    <div class="row align-items-center">
      @if($caseStudy->solutions_image)
      <div class="col-lg-6" data-aos="fade-left">
        <div class="p-4 bg-light rounded-3 border-start border-success border-4 shadow-sm">
          <div class="content fs-5 text-muted lh-lg">
            {!! nl2br(e($caseStudy->solutions)) !!}
          </div>
        </div>
      </div>
      <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
        <img src="{{ asset('storage/' . $caseStudy->solutions_image) }}" alt="Solutions" class="img-fluid rounded-3 shadow">
      </div>
      @else
      <div class="col-12" data-aos="fade-up">
        <div class="p-4 bg-light rounded-3 border-start border-success border-4 shadow-sm">
          <div class="content fs-5 text-muted lh-lg">
            {!! nl2br(e($caseStudy->solutions)) !!}
          </div>
        </div>
      </div>
      @endif
    </div>
    </div>
  </div>
</section>
@endif

<!-- Results -->
@if($caseStudy->results)
<section class="py-5 position-relative overflow-hidden" @if($caseStudy->results_image) style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('{{ asset('storage/' . $caseStudy->results_image) }}') center/cover no-repeat; min-height: 60vh;" @else style="background: linear-gradient(135deg, #ffd700 0%, #ff6b6b 100%); min-height: 60vh;" @endif>
  <div class="container position-relative h-100 d-flex align-items-center" style="z-index: 2;">
    <div class="row w-100">
      <div class="col-lg-8 mx-auto text-center">
        <div class="mb-5">
          <h2 class="mb-3 display-6 fw-bold text-white d-flex align-items-center justify-content-center" data-aos="fade-up">
            <i class="bi bi-trophy-fill me-3" style="font-size: 2rem;"></i>
            Project Results & Outcomes
          </h2>
          <p class="text-white-50 fs-5" data-aos="fade-up" data-aos-delay="200">Measurable impact and achievements from our solution</p>
        </div>
        
        <div class="p-5 rounded-4 shadow-lg" style="background: rgba(255,255,255,0.95); backdrop-filter: blur(10px);" data-aos="fade-up" data-aos-delay="400">
          <div class="content fs-5 text-dark lh-lg">
            {!! nl2br(e($caseStudy->results)) !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endif

<!-- Client Testimonial -->
@if($caseStudy->client_testimonial && is_array($caseStudy->client_testimonial))
<section class="py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
  <div class="container position-relative">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="text-center mb-5">
          <div class="mb-4 d-inline-flex align-items-center justify-content-center" style="width: 100px; height: 100px; background: rgba(255,255,255,0.2); border-radius: 50%;" data-aos="zoom-in">
            <i class="text-white bi bi-chat-heart-fill" style="font-size: 2.5rem;"></i>
          </div>
          <h2 class="mb-3 text-white display-5 fw-bold" data-aos="fade-up">What Our Client Says</h2>
          <p class="text-white-50 fs-5" data-aos="fade-up" data-aos-delay="200">Real feedback from our valued client</p>
        </div>
        
        <div class="card border-0 shadow-lg" style="border-radius: 25px; background: rgba(255,255,255,0.98);" data-aos="fade-up" data-aos-delay="400">
          <div class="card-body p-5">
            <div class="row align-items-center">
              @if(isset($caseStudy->client_testimonial['image']) && $caseStudy->client_testimonial['image'])
              <div class="col-lg-4 text-center mb-4 mb-lg-0">
                <div class="position-relative d-inline-block">
                  <img src="{{ asset('storage/' . $caseStudy->client_testimonial['image']) }}" alt="{{ $caseStudy->client_testimonial['name'] ?? 'Client' }}" class="rounded-circle shadow" style="width: 150px; height: 150px; object-fit: cover; border: 5px solid #fff;">
                  <div class="position-absolute top-0 end-0" style="background: linear-gradient(45deg, #ffd700, #ff6b6b); width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-quote text-white fw-bold"></i>
                  </div>
                </div>
              </div>
              <div class="col-lg-8">
              @else
              <div class="col-12 text-center">
              @endif
                <blockquote class="mb-4">
                  <p class="fs-4 text-dark lh-lg mb-0" style="font-style: italic; font-weight: 300;">"{{ $caseStudy->client_testimonial['message'] ?? 'Outstanding work! The team exceeded our expectations and delivered exceptional results.' }}"</p>
                </blockquote>
                
                <div class="client-info {{ isset($caseStudy->client_testimonial['image']) ? 'text-start' : 'text-center' }}">
                  <div class="stars mb-3">
                    @for($i = 1; $i <= ($caseStudy->client_testimonial['rating'] ?? 5); $i++)
                      <i class="bi bi-star-fill" style="color: #ffd700; font-size: 1.3rem;"></i>
                    @endfor
                    @for($i = ($caseStudy->client_testimonial['rating'] ?? 5) + 1; $i <= 5; $i++)
                      <i class="bi bi-star" style="color: #ddd; font-size: 1.3rem;"></i>
                    @endfor
                  </div>
                  
                  <h4 class="mb-1 fw-bold text-primary">{{ $caseStudy->client_testimonial['name'] ?? $caseStudy->client ?? 'Satisfied Client' }}</h4>
                  <p class="text-muted mb-0 fs-6">{{ $caseStudy->client_testimonial['position'] ?? 'Client' }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endif

<!-- CTA Section -->
<section class="py-5" style="background: #f8f9fa;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card border-0 shadow-lg" data-aos="fade-up">
          <div class="card-body p-5 text-center">
            <h2 class="mb-4 display-5 fw-bold text-dark">Ready to Start Your Project?</h2>
            <p class="mb-4 fs-5 lh-lg text-muted">Let's discuss how we can help you achieve similar results for your business. Our team is ready to bring your vision to life.</p>
            <div class="d-flex flex-wrap gap-3 justify-content-center">
              <a href="{{ route('contact.index') }}" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow">
                <i class="bi bi-chat-dots me-2"></i>Get In Touch
              </a>
              <a href="{{ route('case-study.index') }}" class="btn btn-outline-primary btn-lg px-5 py-3 rounded-pill fw-bold">
                <i class="bi bi-grid me-2"></i>View More Projects
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
.hover-lift {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.hover-lift:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
}

.breadcrumb-item + .breadcrumb-item::before {
  color: rgba(255, 255, 255, 0.5);
}
</style>
@endsection