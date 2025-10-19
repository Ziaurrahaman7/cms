@extends('layouts.app')

@section('title', $post->title . ' - Technoit')

@section('content')
<!-- Hero Section -->
<section class="hero-blog" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 100px 0; position: relative; overflow: hidden;">
  <div class="hero-shapes" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;">
    <div style="position: absolute; top: 20%; left: 10%; width: 100px; height: 100px; background: rgba(255,255,255,0.1); border-radius: 50%; animation: float 6s ease-in-out infinite;"></div>
    <div style="position: absolute; top: 60%; right: 15%; width: 150px; height: 150px; background: rgba(255,255,255,0.05); border-radius: 50%; animation: float 8s ease-in-out infinite reverse;"></div>
  </div>

  <div class="container" style="position: relative; z-index: 2;">
    <div class="row align-items-center">
      <div class="col-lg-8 mx-auto text-center">
        <div class="hero-content text-white">
          <span class="badge bg-light text-dark px-3 py-2 mb-3" style="font-size: 14px; border-radius: 20px;">{{ $post->created_at->format('M d, Y') }}</span>
          <h1 class="display-4 fw-bold mb-4 text-white" style="line-height: 1.2; color: white !important;">{{ $post->title }}</h1>
          <p class="lead mb-4" style="font-size: 1.2rem; opacity: 0.9;">{{ $post->meta_description ?? 'Discover insights and knowledge in this comprehensive article.' }}</p>
          <div class="hero-meta d-flex justify-content-center align-items-center gap-4">
            <div class="d-flex align-items-center">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" class="me-2">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
              </svg>
              <span>{{ ceil(str_word_count(strip_tags($post->content)) / 200) }} min read</span>
            </div>
            <div class="d-flex align-items-center">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" class="me-2">
                <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
              </svg>
              <span>{{ rand(100, 999) }} views</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Featured Image -->
<section class="featured-image-section" style="background: #f8f9fa; padding: 0; margin: 0;">
  <div class="container-fluid px-0">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="featured-image text-center" style="margin: 0; padding: 40px 20px;">
          @if($post->image && file_exists(public_path('storage/posts/' . $post->image)))
            <img src="{{ asset('storage/posts/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid" style="max-height: 500px; width: auto; border-radius: 20px; box-shadow: 0 25px 50px rgba(0,0,0,0.15);">
          @else
            <img src="{{ asset('assets/images/blog/blog-1.jpg') }}" alt="{{ $post->title }}" class="img-fluid" style="max-height: 500px; width: auto; border-radius: 20px; box-shadow: 0 25px 50px rgba(0,0,0,0.15);">
          @endif
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Main Content -->
<section class="blog-content" style="padding: 60px 0; margin: 0;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10 col-xl-9">
        <!-- Article Content -->
        <article class="blog-article">
          <div class="content-wrapper" style="font-size: 1.15rem; line-height: 1.9; color: #444; max-width: none;">
            <div class="prose max-w-none">
              {!! $post->content !!}
            </div>
          </div>

          <!-- Tags & Share -->
          <div class="article-footer mt-5 pt-4" style="border-top: 2px solid #f8f9fa;">
            <div class="row align-items-center">
              <div class="col-md-6">
                @if($post->meta_keywords)
                  <div class="tags">
                    <span class="fw-bold me-2">Tags:</span>
                    @foreach(explode(',', $post->meta_keywords) as $tag)
                      <span class="badge bg-primary me-2 mb-2" style="font-size: 0.9rem;">{{ trim($tag) }}</span>
                    @endforeach
                  </div>
                @endif
              </div>
              <div class="col-md-6 text-md-end">
                <div class="share-buttons d-flex  gap-4 justify-content-md-end justify-content-start align-items-center mt-3 mt-md-0">
                  <span class="fw-bold me-3">Share:</span>
                  <a href="https://facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" class=" facebook" target="_blank">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                      <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>

                  </a>
                  <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}" class=" twitter" target="_blank">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                      <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                    </svg>

                  </a>
                  <a href="https://linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}" class=" linkedin" target="_blank">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                      <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                    </svg>

                  </a>
                </div>
              </div>
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
</section>

<!-- Related Posts -->
<section class="related-posts py-5" style="background: #f8f9fa;">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center mb-5">
        <h3 class="fw-bold">Related Articles</h3>
        <p class="text-muted">Discover more insights and knowledge</p>
      </div>
    </div>

    <div class="row">
      @php
        $relatedPosts = App\Models\Post::where('status', 'published')->where('id', '!=', $post->id)->latest()->take(3)->get();
      @endphp

      @foreach($relatedPosts as $relatedPost)
      <div class="col-lg-4 mb-4">
        <div class="card h-100 border-0 shadow-sm" style="transition: transform 0.3s ease; border-radius: 15px;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
          <div class="card-img-wrapper" style="height: 200px; overflow: hidden; border-radius: 15px 15px 0 0;">
            @if($relatedPost->image && file_exists(public_path('storage/posts/' . $relatedPost->image)))
              <img src="{{ asset('storage/posts/' . $relatedPost->image) }}" class="card-img-top" alt="{{ $relatedPost->title }}" style="height: 100%; object-fit: cover;">
            @else
              <img src="{{ asset('assets/images/blog/blog-' . (($loop->index % 3) + 1) . '.jpg') }}" class="card-img-top" alt="{{ $relatedPost->title }}" style="height: 100%; object-fit: cover;">
            @endif
          </div>
          <div class="card-body p-4">
            <small class="text-muted">{{ $relatedPost->created_at->format('M d, Y') }}</small>
            <h5 class="card-title mt-2 mb-3"><a href="{{ route('posts.show', $relatedPost) }}" class="text-decoration-none text-dark">{{ Str::limit($relatedPost->title, 60) }}</a></h5>
            <p class="card-text text-muted">{{ Str::limit(strip_tags($relatedPost->content), 100) }}</p>
            <a href="{{ route('posts.show', $relatedPost) }}" class="btn btn-outline-primary btn-sm d-flex align-items-center justify-content-center">
              Read More
              <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="ms-2">
                <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
              </svg>
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="row mt-5">
      <div class="col-lg-12 text-center">
        <a href="{{ route('posts.index') }}" class="btn btn-primary btn-lg px-5 d-flex align-items-center justify-content-center" style="border-radius: 25px; width: fit-content; margin: 0 auto;">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="me-2">
            <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
          </svg>
          Back to All Articles
        </a>
      </div>
    </div>
  </div>
</section>

<style>
@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-20px); }
}

.content-wrapper p {
  margin-bottom: 1.5rem;
  text-align: justify;
}

.content-wrapper h1, .content-wrapper h2, .content-wrapper h3, .content-wrapper h4, .content-wrapper h5, .content-wrapper h6 {
  color: #2c3e50;
  margin-top: 2.5rem;
  margin-bottom: 1.5rem;
  font-weight: 600;
}

.content-wrapper h1 { font-size: 2.5rem; }
.content-wrapper h2 { font-size: 2rem; }
.content-wrapper h3 { font-size: 1.75rem; }
.content-wrapper h4 { font-size: 1.5rem; }
.content-wrapper h5 { font-size: 1.25rem; }
.content-wrapper h6 { font-size: 1.1rem; }

.content-wrapper img {
  border-radius: 10px;
  margin: 2rem auto;
  display: block;
  max-width: 100%;
  height: auto;
  box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.content-wrapper blockquote {
  border-left: 4px solid #667eea;
  padding: 1.5rem;
  margin: 2rem 0;
  font-style: italic;
  background: #f8f9fa;
  border-radius: 0 10px 10px 0;
  font-size: 1.1rem;
}

.content-wrapper ul, .content-wrapper ol {
  margin: 1.5rem 0;
  padding-left: 2rem;
}

.content-wrapper li {
  margin-bottom: 0.5rem;
}

.content-wrapper a {
  color: #667eea;
  text-decoration: none;
  border-bottom: 1px solid transparent;
  transition: all 0.3s ease;
}

.content-wrapper a:hover {
  color: #764ba2;
  border-bottom-color: #764ba2;
}

.content-wrapper strong {
  font-weight: 600;
  color: #2c3e50;
}

.content-wrapper em {
  font-style: italic;
  color: #555;
}

. {
  display: inline-flex;
  align-items: center;
  padding: 8px 16px;
  border-radius: 25px;
  text-decoration: none;
  color: white;
  font-size: 14px;
  font-weight: 500;
  transition: all 0.3s ease;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.:hover {
  transform: translateY(-2px);
  box-shadow: 0 4px 20px rgba(0,0,0,0.2);
  color: white;
}

. svg {
  margin-right: 8px;
}

..facebook {
  background: linear-gradient(45deg, #1877f2, #42a5f5);
}

..twitter {
  background: linear-gradient(45deg, #1da1f2, #42a5f5);
}

..linkedin {
  background: linear-gradient(45deg, #0077b5, #0288d1);
}

..facebook:hover {
  background: linear-gradient(45deg, #166fe5, #1976d2);
}

..twitter:hover {
  background: linear-gradient(45deg, #1a94da, #1976d2);
}

..linkedin:hover {
  background: linear-gradient(45deg, #005885, #0277bd);
}
</style>
@endsection
