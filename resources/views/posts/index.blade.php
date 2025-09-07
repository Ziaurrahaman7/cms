@extends('layouts.app')

@section('title', 'Blog Posts - Technoit')

@section('content')
<section class="page-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>Our Blog</h1>
        <p>Latest news and insights from our team</p>
      </div>
    </div>
  </div>
</section>

<section id="recent-posts" class="recent-posts sections-bg">
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