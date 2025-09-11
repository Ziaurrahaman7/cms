@extends('layouts.app')

@section('title', 'Blog Posts - Technoit')

@section('content')
<!-- Blog Hero Banner -->
<section id="blog-hero" class="hero sticked-header-offset" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 60vh; position: relative; overflow: hidden;">
  <div id="particles-js"></div>
  <div class="container position-relative">
    <div class="row gy-5 align-items-center justify-content-center text-center" style="min-height: 60vh;">
      <div class="col-lg-8">
        <h1 class="text-white mb-4" data-aos="fade-up" style="font-size: 3.5rem; font-weight: 700; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">Our Blog</h1>
        <p class="text-white-50 mb-4 fs-5" data-aos="fade-up" data-aos-delay="200">Discover the latest insights, trends, and innovations in technology. Stay updated with our expert thoughts and industry knowledge.</p>
        <div class="d-flex justify-content-center gap-3" data-aos="fade-up" data-aos-delay="400">
          <a href="#blog-posts" class="btn btn-light btn-lg px-4 py-3 rounded-pill">
            <i class="bi bi-arrow-down me-2"></i>Explore Posts
          </a>
          <a href="{{ route('home') }}" class="btn btn-outline-light btn-lg px-4 py-3 rounded-pill">
            <i class="bi bi-house me-2"></i>Back to Home
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

<style>
@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-20px); }
}

#blog-hero {
  background-attachment: fixed;
}

#blog-hero::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="%23ffffff" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>') repeat;
  pointer-events: none;
}
</style>

<section id="blog-posts" class="recent-posts sections-bg" style="padding: 80px 0;">
  <div class="container" data-aos="fade-up">
    <div class="row gy-4">
      @forelse($posts as $post)
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
          <p class="post-excerpt">{{ Str::limit(strip_tags($post->content), 100) }}</p>
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
      <div class="col-lg-12 text-center">
        <p>No blog posts available at the moment.</p>
      </div>
      @endforelse
    </div>
    
    @if($posts->hasPages())
    <div class="row mt-5">
      <div class="col-lg-12 d-flex justify-content-center">
        {{ $posts->links() }}
      </div>
    </div>
    @endif
  </div>
</section>
@endsection