@extends('layouts.app')

@section('title', 'About Us - ' . App\Models\SiteSetting::get('site_name', 'Technoit'))
@section('description', 'Learn more about our company, team, and mission to deliver exceptional IT solutions.')

@section('content')
<style>
  .text-justify{
    text-align: justify !important;
  }
</style>
<!-- About Hero Banner -->
<section id="about-hero" class="hero sticked-header-offset" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 70vh; position: relative; overflow: hidden;">
  <div id="particles-js"></div>
  <div class="container position-relative">
    <div class="text-center row gy-5 align-items-center justify-content-center" style="min-height: 70vh;">
      <div class="col-lg-8">
        <h1 class="mb-4 text-white" data-aos="fade-up" style="font-size: 3.5rem; font-weight: 700; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">About Us</h1>
        <p class="mb-4 text-white-50 fs-5" data-aos="fade-up" data-aos-delay="200">Discover our story, mission, and the passionate team behind our innovative IT solutions.</p>
        <div class="gap-3 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="400">
          <a href="#about-content" class="px-4 py-3 btn btn-light btn-lg rounded-pill">
            <i class="bi bi-arrow-down me-2"></i>Learn More
          </a>
          <a href="#team" class="px-4 py-3 btn btn-outline-light btn-lg rounded-pill">
            <i class="bi bi-people me-2"></i>Meet Our Team
          </a>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Animated Background Elements -->
  <div class="position-absolute" style="top: 10%; left: 10%; width: 100px; height: 100px; background: rgba(255,255,255,0.1); border-radius: 50%; animation: float 6s ease-in-out infinite;"></div>
  <div class="position-absolute" style="top: 60%; right: 15%; width: 150px; height: 150px; background: rgba(255,255,255,0.05); border-radius: 50%; animation: float 8s ease-in-out infinite reverse;"></div>
  <div class="position-absolute" style="bottom: 20%; left: 20%; width: 80px; height: 80px; background: rgba(255,255,255,0.08); border-radius: 50%; animation: float 7s ease-in-out infinite;"></div>
</section>

<!-- About Content Section -->
<section id="about-content" class="py-5">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6" data-aos="fade-right">
        <div class="about-content">
          <h2 class="mb-4">Who We Are</h2>
          <p class="mb-4 text-justify">{{ App\Models\SiteSetting::get('about_who_we_are', 'We are a passionate team of technology experts dedicated to delivering innovative IT solutions that drive business growth and success.') }}</p>
          
          <div class="mb-4 row g-4">
            <div class="col-6">
              <div class="text-center stat-item">
                <h3 class="mb-2 fw-bold text-primary">{{ App\Models\SiteSetting::get('stats_projects_completed', '500+') }}</h3>
                <p class="mb-0 text-muted">{{ App\Models\SiteSetting::get('stats_projects_label', 'Projects Completed') }}</p>
              </div>
            </div>
            <div class="col-6">
              <div class="text-center stat-item">
                <h3 class="mb-2 fw-bold text-primary">{{ App\Models\SiteSetting::get('stats_happy_clients', '200+') }}</h3>
                <p class="mb-0 text-muted">{{ App\Models\SiteSetting::get('stats_happy_clients_label', 'Happy Clients') }}</p>
              </div>
            </div>
            <div class="col-6">
              <div class="text-center stat-item">
                <h3 class="mb-2 fw-bold text-primary">{{ App\Models\SiteSetting::get('stats_years_experience', '5+') }}</h3>
                <p class="mb-0 text-muted">{{ App\Models\SiteSetting::get('stats_years_experience_label', 'Years Experience') }}</p>
              </div>
            </div>
            <div class="col-6">
              <div class="text-center stat-item">
                <h3 class="mb-2 fw-bold text-primary">{{ App\Models\SiteSetting::get('stats_countries_served', '15+') }}</h3>
                <p class="mb-0 text-muted">{{ App\Models\SiteSetting::get('stats_countries_served_label', 'Countries Served') }}</p>
              </div>
            </div>
          </div>
          
          <a href="{{ route('contact.index') }}" class="px-4 py-3 btn btn-primary btn-lg rounded-pill">
            <i class="bi bi-envelope me-2"></i>Get In Touch
          </a>
        </div>
      </div>
      
      <div class="col-lg-6" data-aos="fade-left">
        <div class="about-image">
          <div class="image-wrapper position-relative">
            @php
              $aboutImage = App\Models\SiteSetting::get('about_image');
            @endphp
            @if($aboutImage && file_exists(public_path('storage/' . $aboutImage)))
              <img src="{{ asset('storage/' . $aboutImage) }}" alt="About Us" class="shadow-lg img-fluid rounded-4">
            @else
              <img src="{{ asset('assets/images/graphic-tree.png') }}" alt="About Us" class="shadow-lg img-fluid rounded-4">
            @endif
            <div class="top-0 p-3 text-white shadow floating-badge position-absolute start-0 bg-primary rounded-4" style="transform: translate(-20px, -20px);">
              <i class="bi bi-award-fill fs-2"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Mission & Vision Section -->
<section class="py-5" style="background: #f8f9fa;">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-6" data-aos="fade-up">
        <div class="p-4 shadow-sm bg2-white mission-card rounded-4 h-100">
          <div class="mb-4 icon-wrapper" style="width: 80px; height: 80px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
            <i class="text-white bi bi-bullseye" style="font-size: 2rem;"></i>
          </div>
          <h3 class="mb-3">Our Mission</h3>
          <p class="text-justify">{{ App\Models\SiteSetting::get('about_mission', 'To empower businesses with innovative technology solutions that drive growth, efficiency, and success in the digital age. We strive to be the trusted partner for all your IT needs.') }}</p>
        </div>
      </div>
      
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
        <div class="p-4 bg-white shadow-sm vision-card rounded-4 h-100">
          <div class="mb-4 icon-wrapper" style="width: 80px; height: 80px; background: linear-gradient(45deg, #4ecdc4, #44a08d); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
            <i class="text-white bi bi-eye" style="font-size: 2rem;"></i>
          </div>
          <h3 class="mb-3">Our Vision</h3>
          <p class="text-justify">{{ App\Models\SiteSetting::get('about_vision', 'To be the leading IT solutions provider globally, recognized for our innovation, quality, and commitment to client success. We envision a future where technology seamlessly enhances every business.') }}</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Certificates, Awards & Achievements Section -->
<section id="achievements" class="py-5">
  <div class="container">
    <div class="mb-5 text-center section-header">
      <h2 class="mb-3">Certificates, Awards & Achievements</h2>
      <p class="text-muted">Recognition of our excellence and commitment to quality</p>
    </div>
    
    <div class="row g-4">
      @forelse($achievements as $achievement)
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index + 1) * 100 }}">
        <div class="p-4 text-center bg-white shadow-sm achievement-card rounded-4 h-100">
          <div class="mb-3 achievement-icon">
            @if($achievement->image && file_exists(public_path('storage/achievements/' . $achievement->image)))
              <img src="{{ asset('storage/achievements/' . $achievement->image) }}" alt="{{ $achievement->title }}" class="img-fluid rounded-3" style="width: 100%; height: 200px; object-fit: contain;">
            @else
              <div class="mx-auto rounded-3" style="width: 100%; height: 200px; background: linear-gradient(45deg, #667eea, #764ba2); display: flex; align-items: center; justify-content: center;">
                <i class="text-white bi bi-award" style="font-size: 3rem;"></i>
              </div>
            @endif
          </div>
          <h4 class="mb-3">{{ $achievement->title }}</h4>
          {{-- <p class="mb-3 text-muted">{{ $achievement->description }}</p> --}}
          {{-- <div class="achievement-year">
            <span class="px-3 py-1 badge 
              @if($achievement->category === 'certificate') bg-primary
              @elseif($achievement->category === 'achievement') bg-success
              @else bg-warning text-dark @endif">{{ $achievement->year }}</span>
          </div> --}}
        </div>
      </div>
      @empty
      <div class="text-center col-12">
        <p class="text-muted">No achievements available at the moment.</p>
      </div>
      @endforelse
    </div>
    
    @if($achievements->count() >= 6)
    <div class="mt-5 row">
      <div class="text-center col-12">
        <a href="{{ route('about.certificates') }}" class="px-4 py-3 btn btn-primary btn-lg rounded-pill">
          <i class="bi bi-award me-2"></i>See All Certificates
        </a>
      </div>
    </div>
    @endif
  </div>
</section>

<!-- Team Section -->
<section id="team" class="py-5 team sections-bg">
  <div class="container aos-init aos-animate" data-aos="fade-up">
    <div class="mb-5 text-center section-header">
      <h2 class="mb-3">Meet Our Team</h2>
      <p class="text-muted">The talented professionals behind our success</p>
    </div>
    
    <div class="row gy-4">
      @forelse($teams as $team)
      <div class="col-xl-3 col-md-6 d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="{{ ($loop->index + 1) * 100 }}">
        <div class="member">
          @if($team->image && file_exists(public_path('storage/teams/' . $team->image)))
            <img src="{{ asset('storage/teams/' . $team->image) }}" class="img-fluid" alt="{{ $team->name }}" style="width: 100%; height: 300px; object-fit: cover;">
          @else
            <img src="{{ asset('assets/images/team/team-1.jpg') }}" class="img-fluid" alt="{{ $team->name }}" style="width: 100%; height: 300px; object-fit: cover;">
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
      <div class="text-center col-12">
        <p class="text-muted">No team members found.</p>
      </div>
      @endforelse
    </div>
  </div>
</section>

<!-- FAQ Section -->
<section id="faq" class="py-5" style="background: #f8f9fa;">
  <div class="container">
    <div class="mb-5 text-center section-header">
      <h2 class="mb-3">Frequently Asked Questions</h2>
      <p class="text-muted">Find answers to common questions about our services</p>
    </div>
    
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="accordion accordion-flush" id="aboutFaqAccordion">
          @forelse($faqs as $faq)
          <div class="mb-3 border-0 shadow-sm accordion-item rounded-3">
            <h3 class="accordion-header">
              <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }} rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#faq-{{ $faq->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}">
                <span class="fw-semibold">{{ $faq->question }}</span>
              </button>
            </h3>
            <div id="faq-{{ $faq->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" data-bs-parent="#aboutFaqAccordion">
              <div class="accordion-body">
                {{ $faq->answer }}
              </div>
            </div>
          </div>
          @empty
          <div class="text-center">
            <p class="text-muted">No FAQs available at the moment.</p>
          </div>
          @endforelse
        </div>
      </div>
    </div>
  </div>
</section>

<!-- News & Events (Blog) Section -->
<section id="news-events" class="py-5">
  <div class="container">
    <div class="mb-5 text-center section-header">
      <h2 class="mb-3">News & Events</h2>
      <p class="text-muted">Stay updated with our latest news and upcoming events</p>
    </div>
    
    <div class="row gy-4">
      @forelse($latestPosts as $post)
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index + 1) * 100 }}">
        <article class="overflow-hidden bg-white shadow-sm blog-card rounded-4 h-100">
          <div class="post-img">
            @if($post->image && file_exists(public_path('storage/posts/' . $post->image)))
              <img src="{{ asset('storage/posts/' . $post->image) }}" alt="" class="img-fluid" style="height: 200px; object-fit: cover;">
            @else
              <img src="{{ asset('assets/images/blog/blog-' . (($loop->index % 3) + 1) . '.jpg') }}" alt="" class="img-fluid" style="height: 200px; object-fit: cover;">
            @endif
          </div>
          <div class="p-4 card-body">
            <p class="mb-2 post-category text-primary small fw-bold">Technology</p>
            <h5 class="mb-3 title">
              <a href="{{ route('posts.show', $post) }}" class="text-decoration-none text-dark">{{ $post->title }}</a>
            </h5>
            <p class="mb-3 post-excerpt text-muted">{{ Str::limit(strip_tags($post->content), 100) }}</p>
            <div class="d-flex align-items-center justify-content-between">
              <div class="post-meta">
                <small class="text-muted">
                  <i class="bi bi-calendar me-1"></i>
                  {{ $post->created_at->format('M d, Y') }}
                </small>
              </div>
              <a href="{{ route('posts.show', $post) }}" class="btn btn-outline-primary btn-sm rounded-pill">Read More</a>
            </div>
          </div>
        </article>
      </div>
      @empty
      <div class="text-center col-12">
        <p class="text-muted">No blog posts available at the moment.</p>
      </div>
      @endforelse
    </div>
    
    @if($latestPosts->count() > 0)
    <div class="mt-5 row">
      <div class="text-center col-12">
        <a href="{{ route('posts.index') }}" class="px-4 py-3 btn btn-primary btn-lg rounded-pill">
          <i class="bi bi-newspaper me-2"></i>View All Posts
        </a>
      </div>
    </div>
    @endif
  </div>
</section>

<style>
@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-20px); }
}

.blog-card:hover {
  transform: translateY(-5px);
  transition: all 0.3s ease;
}

.mission-card:hover,
.vision-card:hover,
.achievement-card:hover {
  transform: translateY(-5px);
  transition: all 0.3s ease;
}
</style>
@endsection