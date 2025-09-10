@extends('layouts.app')

@section('title', $service->meta_title ?: $service->title)
@section('description', $service->meta_description ?: $service->description)

@section('content')
<!-- Service Hero Section -->
<section class="service-hero" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 100px 0 60px;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="hero-content text-white">
                    <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="breadcrumb bg-transparent p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('home') }}#services" class="text-white-50">Services</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">{{ $service->title }}</li>
                        </ol>
                    </nav>
                    <h1 class="display-4 fw-bold mb-4">{{ $service->title }}</h1>
                    <p class="lead mb-4" style="font-size: 1.2rem; opacity: 0.9;">{{ $service->description }}</p>
                    <div class="d-flex gap-3">
                        <a href="#contact" class="btn btn-light btn-lg px-4 py-3 rounded-pill">Get Started</a>
                        <a href="#service-details" class="btn btn-outline-light btn-lg px-4 py-3 rounded-pill">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="hero-image text-center">
                    @if($service->image && file_exists(public_path('storage/services/' . $service->image)))
                        <img src="{{ asset('storage/services/' . $service->image) }}" alt="{{ $service->title }}" class="img-fluid rounded-4 shadow-lg" style="max-height: 400px;">
                    @else
                        <div class="service-icon-large bg-white rounded-4 shadow-lg p-5 d-inline-block">
                            @if($service->icon)
                                <i class="{{ $service->icon }}" style="font-size: 5rem; color: #667eea;"></i>
                            @else
                                <svg width="80" height="80" fill="#667eea" viewBox="0 0 24 24">
                                    <path d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                                </svg>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Service Details Section -->
<section id="service-details" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if($service->content)
                    <div class="service-content">
                        <h2 class="mb-4">Service Details</h2>
                        <div class="content-wrapper" style="font-size: 1.1rem; line-height: 1.8;">
                            {!! $service->content !!}
                        </div>
                    </div>
                @endif
                
                <!-- Service FAQs -->
                @if($service->faqs->count() > 0)
                <div class="service-faqs mt-5">
                    <h2 class="mb-4">Frequently Asked Questions</h2>
                    <div class="accordion" id="serviceFaqAccordion">
                        @foreach($service->faqs->where('is_active', true) as $faq)
                        <div class="accordion-item border-0 mb-3 shadow-sm rounded-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }} rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#faq-{{ $faq->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}">
                                    <span class="fw-semibold">{{ $faq->question }}</span>
                                </button>
                            </h3>
                            <div id="faq-{{ $faq->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" data-bs-parent="#serviceFaqAccordion">
                                <div class="accordion-body">
                                    {{ $faq->answer }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="service-sidebar">
                    <!-- Contact Card -->
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-3">Need This Service?</h5>
                            <p class="text-muted mb-4">Get in touch with our experts to discuss your requirements.</p>
                            <div class="d-grid gap-2">
                                <a href="#contact" class="btn btn-primary btn-lg rounded-pill">Get Quote</a>
                                <a href="tel:+1234567890" class="btn btn-outline-primary rounded-pill">Call Now</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Other Services -->
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-3">Other Services</h5>
                            @php
                                $otherServices = App\Models\Service::active()->where('id', '!=', $service->id)->take(4)->get();
                            @endphp
                            @foreach($otherServices as $otherService)
                            <div class="d-flex align-items-center mb-3 pb-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                                <div class="service-icon me-3">
                                    @if($otherService->icon)
                                        <i class="{{ $otherService->icon }}" style="font-size: 1.5rem; color: #667eea;"></i>
                                    @else
                                        <div class="bg-light rounded p-2">
                                            <svg width="24" height="24" fill="#667eea" viewBox="0 0 24 24">
                                                <path d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <h6 class="mb-1"><a href="{{ route('services.show', $otherService->slug) }}" class="text-decoration-none text-dark">{{ $otherService->title }}</a></h6>
                                    <small class="text-muted">{{ Str::limit($otherService->description, 60) }}</small>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-5" style="background: #f8f9fa;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="mb-4">Ready to Get Started?</h2>
                <p class="lead mb-4">Contact us today to discuss how our {{ $service->title }} can help your business grow.</p>
                
                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <div class="contact-item">
                            <div class="d-flex align-items-center">
                                <div class="contact-icon me-3">
                                    <i class="bi bi-telephone-fill" style="font-size: 1.5rem; color: #667eea;"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Call Us</h6>
                                    <p class="text-muted mb-0">+1 (234) 567-890</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-item">
                            <div class="d-flex align-items-center">
                                <div class="contact-icon me-3">
                                    <i class="bi bi-envelope-fill" style="font-size: 1.5rem; color: #667eea;"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Email Us</h6>
                                    <p class="text-muted mb-0">info@example.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4">Get a Free Quote</h5>
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name *</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="company" class="form-label">Company</label>
                                    <input type="text" class="form-control" id="company" name="company" value="{{ old('company') }}">
                                </div>
                                <div class="col-12">
                                    <label for="service" class="form-label">Service Interested In</label>
                                    <select class="form-control" id="service" name="service">
                                        <option value="">Select a service</option>
                                        @php
                                            $services = App\Models\Service::active()->ordered()->get();
                                        @endphp
                                        @foreach($services as $serviceOption)
                                            <option value="{{ $serviceOption->title }}" {{ old('service', $service->title ?? '') === $serviceOption->title ? 'selected' : '' }}>
                                                {{ $serviceOption->title }}
                                            </option>
                                        @endforeach
                                        <option value="Others" {{ old('service') === 'Others' ? 'selected' : '' }}>Others</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="message" class="form-label">Message *</label>
                                    <textarea class="form-control" id="message" name="message" rows="4" placeholder="Tell us about your project requirements..." required>{{ old('message') }}</textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill" style="background: linear-gradient(45deg, #667eea, #764ba2); border: none;">
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection