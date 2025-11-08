@extends('layouts.app')

@section('title', 'Contact Us')
@section('description', 'Get in touch with us for any inquiries.')

@section('content')
<!-- Contact Hero Banner -->
<section class="hero py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 50vh;">
  <div class="container">
    <div class="text-center text-white">
      <h1 class="mb-4">Get In Touch</h1>
      <p class="mb-0">Ready to start your next project? Send us a message.</p>
    </div>
  </div>
</section>

<!-- Contact Form Section -->
<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        
        <div class="bg-white p-4 shadow rounded">
          <form method="POST" action="{{ route('contact.store') }}">
            @csrf
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Full Name *</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email Address *</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone">
              </div>
              <div class="col-md-6 mb-3">
                <label for="company" class="form-label">Company</label>
                <input type="text" class="form-control" id="company" name="company">
              </div>
              <div class="col-12 mb-3">
                <label for="service" class="form-label">Service</label>
                <select class="form-control" id="service" name="service">
                  <option value="">Select a service</option>
                  @foreach(App\Models\Service::active()->ordered()->get() as $service)
                    <option value="{{ $service->title }}">{{ $service->title }}</option>
                  @endforeach
                  <option value="Others">Others</option>
                </select>
              </div>
              <div class="col-12 mb-3">
                <label for="message" class="form-label">Message *</label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
              </div>
              <div class="col-12 text-center">
                <button type="submit" class="px-5 py-3 btn btn-primary btn-lg rounded-pill fw-bold" style="background: linear-gradient(45deg, #667eea, #764ba2); border: none; min-width: 200px;">
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
@endsection