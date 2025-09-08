<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', 'Technoit - IT Solutions & Business Services')</title>
  <meta name="description" content="@yield('description', 'Technoit - IT Solutions & Business Services Multipurpose Responsive Website Template')">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Favicons -->
  <link href="{{ asset('assets/images/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/images/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/stylesheets/font-awesome.min.css') }}" rel="stylesheet">
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
  </style>
</head>

<body>
  @include('layouts.header')

  @yield('content')

  @include('layouts.footer')

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
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