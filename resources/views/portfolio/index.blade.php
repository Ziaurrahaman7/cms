@extends('layouts.app')

@section('title', 'Portfolio - ' . App\Models\SiteSetting::get('site_name', 'Technoit'))
@section('description', 'Explore our successful portfolio and project case studies showcasing our expertise.')

@section('content')
<!-- Portfolio Hero Banner -->
<section id="portfolio-hero" class="hero sticked-header-offset" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 60vh; position: relative; overflow: hidden;">
  <div id="particles-js"></div>
  <div class="container position-relative">
    <div class="row gy-5 align-items-center justify-content-center text-center" style="min-height: 60vh;">
      <div class="col-lg-8">
        <h1 class="text-white mb-4" data-aos="fade-up" style="font-size: 3.5rem; font-weight: 700; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">Portfolio</h1>
        <p class="text-white-50 mb-4 fs-5" data-aos="fade-up" data-aos-delay="200">Discover how we've helped businesses achieve their goals through innovative solutions and strategic implementations.</p>
        <div class="d-flex justify-content-center gap-3" data-aos="fade-up" data-aos-delay="400">
          <a href="#portfolio-projects" class="btn btn-light btn-lg px-4 py-3 rounded-pill">
            <i class="bi bi-arrow-down me-2"></i>View Projects
          </a>
          <a href="{{ route('contact.index') }}" class="btn btn-outline-light btn-lg px-4 py-3 rounded-pill">
            <i class="bi bi-chat-dots me-2"></i>Discuss Your Project
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

<!-- Portfolio Section -->
<section id="portfolio-projects" class="portfolio py-5">
  <div class="container" data-aos="fade-up">
    <div class="section-header text-center mb-5">
      <h2 class="mb-3">Our Success Stories</h2>
      <p class="text-muted">Real projects, real results - see how we've transformed businesses</p>
    </div>
    
    <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">
      <div>
        <ul class="portfolio-flters">
          <li data-filter="*" class="filter-active">All</li>
          @php
            $usedCategories = $portfolios->pluck('category')->unique()->filter();
          @endphp
          @foreach($usedCategories as $category)
            <li data-filter=".filter-{{ Str::slug($category) }}">{{ ucfirst($category) }}</li>
          @endforeach
        </ul>
      </div>
      
      <div class="row g-4">
        @forelse($portfolios as $portfolio)
        <div class="col-lg-4 col-md-6 portfolio-item filter-{{ Str::slug($portfolio->category) }}" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
          <div class="card shadow-sm border-0 portfolio-card" style="height: 550px; display: flex; flex-direction: column;">
            <div class="card-img-top position-relative overflow-hidden" style="height: 250px; flex-shrink: 0;">
              @if($portfolio->image && file_exists(public_path('storage/portfolios/' . $portfolio->image)))
                <img src="{{ asset('storage/portfolios/' . $portfolio->image) }}" class="w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="{{ $portfolio->title }}">
              @else
                <img src="{{ asset('assets/images/portfolio/product-' . (($loop->index % 6) + 1) . '.jpg') }}" class="w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="{{ $portfolio->title }}">
              @endif
              <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center portfolio-overlay" style="background: rgba(0,0,0,0.7); opacity: 0; transition: all 0.3s ease;">
                @if($portfolio->project_url)
                  <a href="{{ $portfolio->project_url }}" target="_blank" class="btn btn-light btn-sm">
                    <i class="bi bi-link-45deg me-1"></i>View Project
                  </a>
                @endif
              </div>
            </div>
            <div class="card-body d-flex flex-column" style="flex: 1;">
              <h5 class="card-title mb-2" style="height: 50px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $portfolio->title }}</h5>
              <p class="card-text text-muted mb-3" style="flex: 1; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{ $portfolio->description }}</p>
              <div class="text-center mb-3"><span class="badge bg-primary">{{ ucfirst($portfolio->category) }}</span></div>
              <a href="{{ route('portfolio.show', $portfolio->slug) }}" class="btn btn-sm" style="border: 2px solid #007bff; color: #007bff; background: transparent; font-size: 12px; padding: 6px 12px; margin-top: auto;">View Details</a>
            </div>
          </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
          <h3 class="text-muted">No portfolio available</h3>
          <p class="text-muted">We're working on showcasing our projects. Check back soon!</p>
        </div>
        @endforelse
      </div>
    </div>
  </div>
</section>

<!-- Call to Action Section -->
<section class="py-5" style="background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);">
  <div class="container text-center">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <h2 class="text-white mb-4">Ready to Start Your Success Story?</h2>
        <p class="text-white-50 mb-4 fs-5">Let's discuss how we can help transform your business with our proven expertise and innovative solutions.</p>
        <div class="d-flex justify-content-center gap-3">
          <a href="#contact" class="btn btn-light btn-lg px-4 py-3 rounded-pill">
            <i class="bi bi-chat-dots me-2"></i>Start a Conversation
          </a>
          <a href="{{ route('home') }}#services" class="btn btn-outline-light btn-lg px-4 py-3 rounded-pill">
            <i class="bi bi-gear me-2"></i>View Our Services
          </a>
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

.portfolio-flters {
  padding: 0;
  margin: 0 auto 35px auto;
  list-style: none;
  text-align: center;
  border-radius: 50px;
  padding: 2px 15px;
}

.portfolio-flters li {
  cursor: pointer;
  display: inline-block;
  padding: 10px 15px 8px 15px;
  font-size: 14px;
  font-weight: 600;
  line-height: 1;
  text-transform: uppercase;
  color: #272829;
  margin-bottom: 5px;
  transition: all 0.3s ease-in-out;
}

.portfolio-flters li:hover,
.portfolio-flters li.filter-active {
  color: #149ddd;
}

.portfolio-item {
  transition: all 0.3s ease-in-out;
}

.portfolio-item.hidden {
  opacity: 0;
  transform: scale(0.8);
  display: none;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const filterButtons = document.querySelectorAll('.portfolio-flters li');
  const portfolioItems = document.querySelectorAll('.portfolio-item');
  
  filterButtons.forEach(button => {
    button.addEventListener('click', function() {
      const filter = this.getAttribute('data-filter');
      
      filterButtons.forEach(btn => btn.classList.remove('filter-active'));
      this.classList.add('filter-active');
      
      portfolioItems.forEach(item => {
        if (filter === '*' || item.classList.contains(filter.substring(1))) {
          item.classList.remove('hidden');
          item.style.display = 'block';
        } else {
          item.classList.add('hidden');
          setTimeout(() => {
            item.style.display = 'none';
          }, 300);
        }
      });
    });
  });
});
</script>
@endsection