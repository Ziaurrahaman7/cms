<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', App\Models\SiteSetting::get('meta_title', 'Technoit - IT Solutions & Business Services'))</title>
  <meta name="description" content="@yield('description', App\Models\SiteSetting::get('meta_description', 'Professional IT Solutions and Business Services for your company'))">
  <meta name="keywords" content="@yield('keywords', App\Models\SiteSetting::get('meta_keywords', 'IT solutions, web development, business services'))">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Favicons -->
  @php
    $siteFavicon = App\Models\SiteSetting::get('site_favicon');
  @endphp
  @if($siteFavicon && file_exists(public_path('storage/' . $siteFavicon)))
    <link href="{{ asset('storage/' . $siteFavicon) }}" rel="icon">
    <link href="{{ asset('storage/' . $siteFavicon) }}" rel="apple-touch-icon">
  @else
    <link href="{{ asset('assets/images/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/images/apple-touch-icon.png') }}" rel="apple-touch-icon">
  @endif

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/stylesheets/font-awesome.min.css') }}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/stylesheets/styles.css') }}" id="theme-style" rel="stylesheet">
  
  <style>
    .portfolio-wrap:hover img {
      transform: scale(1.1);
    }
    .portfolio-wrap:hover .portfolio-overlay {
      opacity: 1 !important;
    }
    
    /* WhatsApp Float Button */
    .whatsapp-float {
      position: fixed;
      width: 60px;
      height: 60px;
      bottom: 90px;
      right: 20px;
      background-color: #25d366;
      color: white;
      border-radius: 50px;
      text-align: center;
      font-size: 30px;
      box-shadow: 2px 2px 10px rgba(0,0,0,0.3);
      z-index: 1000;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
      text-decoration: none;
    }
    
    .whatsapp-float:hover {
      background-color: #128c7e;
      transform: scale(1.1);
      color: white;
      text-decoration: none;
    }
    
    .whatsapp-float i {
      margin-top: 2px;
    }
    
    /* Animation */
    @keyframes pulse {
      0% {
        transform: scale(1);
      }
      50% {
        transform: scale(1.1);
      }
      100% {
        transform: scale(1);
      }
    }
    
    .whatsapp-float {
      animation: pulse 2s infinite;
    }
    
    .whatsapp-float:hover {
      animation: none;
    }
  </style>
</head>

<body>
  @include('layouts.header')

  @yield('content')

  @include('layouts.footer')

  <!-- Color Picker Widget -->
  @include('components.color-picker')

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Fixed WhatsApp Button - All Pages -->
  @php
    $whatsappNumber = App\Models\SiteSetting::get('contact_whatsapp', '+8801234567890');
  @endphp
  <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $whatsappNumber) }}" target="_blank" class="whatsapp-float" title="Chat on WhatsApp">
    <i class="fab fa-whatsapp"></i>
  </a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/javascripts/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/javascripts/plugins.js') }}"></script>
  <script src="{{ asset('assets/javascripts/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/javascripts/validator.min.js') }}"></script>
  <script src="{{ asset('assets/javascripts/contactform.js') }}"></script>
  <script src="{{ asset('assets/javascripts/particles.min.js') }}"></script>
  <script src="{{ asset('assets/javascripts/script.js') }}"></script>
  <script src="{{ asset('assets/javascripts/main.js') }}"></script>
  
  <script>
    // Initialize GLightbox for portfolio
    document.addEventListener('DOMContentLoaded', function() {
      const lightbox = GLightbox({
        selector: '.glightbox',
        touchNavigation: true,
        loop: true,
        autoplayVideos: true
      });
    });
  </script>
</body>
</html>