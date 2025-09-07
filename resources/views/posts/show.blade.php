@extends('layouts.app')

@section('title', $post->title . ' - Technoit')

@section('content')
<section class="page-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{ $post->title }}</h1>
        <p>Published on {{ $post->created_at->format('M d, Y') }}</p>
      </div>
    </div>
  </div>
</section>

<section class="blog-details">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <article class="blog-post">
          <div class="post-img mb-4">
            <img src="{{ $post->image ? asset('storage/posts/' . $post->image) : asset('assets/images/blog/blog-1.jpg') }}" alt="{{ $post->title }}" class="img-fluid">
          </div>
          
          <div class="post-content">
            {!! $post->content !!}
          </div>
          
          <div class="post-meta mt-4 pt-4 border-top">
            <p><strong>Category:</strong> Technology</p>
            <p><strong>Published:</strong> {{ $post->created_at->format('M d, Y') }}</p>
          </div>
        </article>
      </div>
      
      <div class="col-lg-4">
        <div class="sidebar">
          <div class="widget">
            <h4>Recent Posts</h4>
            @php
              $recentPosts = App\Models\Post::where('status', 'published')->where('id', '!=', $post->id)->latest()->take(3)->get();
            @endphp
            @foreach($recentPosts as $recentPost)
            <div class="recent-post-item mb-3">
              <h6><a href="{{ route('posts.show', $recentPost) }}">{{ $recentPost->title }}</a></h6>
              <small class="text-muted">{{ $recentPost->created_at->format('M d, Y') }}</small>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    
    <div class="row mt-5">
      <div class="col-lg-12 text-center">
        <a href="{{ route('posts.index') }}" class="btn btn-primary">← Back to Blog</a>
      </div>
    </div>
  </div>
</section>
@endsection