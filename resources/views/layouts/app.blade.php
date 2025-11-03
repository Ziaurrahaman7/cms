<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', App\Models\SiteSetting::get('meta_title', 'Technoit - IT Solutions & Business Services'))</title>
  <meta name="description" content="@yield('description', App\Models\SiteSetting::get('meta_description', 'Professional IT Solutions and Business Services for your company'))">
  <meta name="keywords" content="@yield('keywords', App\Models\SiteSetting::get('meta_keywords', 'IT solutions, web development, business services'))">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="canonical" href="{{ url()->current() }}">

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

  <!-- Preconnect for faster font loading -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <!-- Optimized Google Fonts - only essential weights -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Critical CSS first -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <!-- Non-critical CSS with preload -->
  <link rel="preload" href="{{ asset('assets/vendor/aos/aos.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet"></noscript>
  <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"></noscript>
  <link rel="preload" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet"></noscript>
  <link rel="preload" href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet"></noscript>

  <!-- Main CSS File -->
  <link href="{{ asset('assets/stylesheets/styles.css') }}" id="theme-style" rel="stylesheet">
  
  <!-- Dynamic Theme Colors -->
  <style>
    :root {
      --primary-color: {{ App\Models\SiteSetting::get('theme_primary_color', '#667eea') }};
      --secondary-color: {{ App\Models\SiteSetting::get('theme_secondary_color', '#764ba2') }};
      --accent-color: {{ App\Models\SiteSetting::get('theme_accent_color', '#ffc107') }};
      --success-color: {{ App\Models\SiteSetting::get('theme_success_color', '#28a745') }};
      --info-color: {{ App\Models\SiteSetting::get('theme_info_color', '#17a2b8') }};
      --warning-color: {{ App\Models\SiteSetting::get('theme_warning_color', '#ffc107') }};
      --danger-color: {{ App\Models\SiteSetting::get('theme_danger_color', '#dc3545') }};
      
      /* Legacy variable names for existing CSS */
      --color-primary: {{ App\Models\SiteSetting::get('theme_primary_color', '#667eea') }};
      --color-secondary: {{ App\Models\SiteSetting::get('theme_secondary_color', '#764ba2') }};
    }
    
    /* Apply theme colors */
    .btn-primary, .bg-primary {
      background-color: var(--primary-color) !important;
      border-color: var(--primary-color) !important;
    }
    
    .btn-outline-primary {
      color: var(--primary-color) !important;
      border-color: var(--primary-color) !important;
    }
    
    .btn-outline-primary:hover {
      background-color: var(--primary-color) !important;
      border-color: var(--primary-color) !important;
    }
    
    .text-primary {
      color: var(--primary-color) !important;
    }
    
    .btn-warning, .bg-warning {
      background-color: var(--warning-color) !important;
      border-color: var(--warning-color) !important;
    }
    
    .btn-success, .bg-success {
      background-color: var(--success-color) !important;
      border-color: var(--success-color) !important;
    }
    
    .btn-info, .bg-info {
      background-color: var(--info-color) !important;
      border-color: var(--info-color) !important;
    }
    
    .btn-danger, .bg-danger {
      background-color: var(--danger-color) !important;
      border-color: var(--danger-color) !important;
    }
    

    
    /* Links */
    a {
      color: var(--primary-color);
    }
    
    a:hover {
      color: var(--secondary-color);
    }
    
    /* Section headers and other primary color elements */
    .section-header h2,
    .text-primary,
    h1, h2, h3, h4, h5, h6 {
      color: var(--primary-color) !important;
    }
    
    /* Icon boxes and feature elements */
    .icon-box .icon,
    .feature-icon,
    .service-icon {
      background: linear-gradient(45deg, var(--primary-color), var(--secondary-color)) !important;
    }
    
    /* Badges and labels */
    .badge.bg-primary {
      background-color: var(--primary-color) !important;
    }
    
    /* Borders */
    .border-primary {
      border-color: var(--primary-color) !important;
    }
  </style>
  
  <style>
    .portfolio-wrap:hover img {
      transform: scale(1.1);
    }
    .portfolio-wrap:hover .portfolio-overlay {
      opacity: 1 !important;
    }
    
    /* Back to Top Button */
    .scroll-top {
      position: fixed;
      width: 50px;
      height: 50px;
      bottom: 170px;
      right: 20px;
      background: linear-gradient(45deg, #667eea, #764ba2);
      color: white;
      border-radius: 50px;
      text-align: center;
      font-size: 20px;
      box-shadow: 2px 2px 10px rgba(0,0,0,0.3);
      z-index: 1001;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
      text-decoration: none;
      opacity: 0;
      visibility: hidden;
    }
    
    .scroll-top.active {
      opacity: 1;
      visibility: visible;
      bottom: 170px !important;
    }
    
    .scroll-top:hover {
      background: linear-gradient(45deg, #764ba2, #667eea);
      transform: translateY(-2px);
      color: white;
      text-decoration: none;
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
  <style>
        /* Global text justification */
    .text-content, .description, .content, article p, .post-content, .blog-content, .testimonial-item p, .about .content p, .recent-posts article p, .blog .posts-list article p, .blog .blog-details .content p, .contact-information-box-3 .contact-info p, .footer-text p, .service-card p, .product-card p, .industry-solution-card p, .list-wrap p, .icon-box p, .card-text, .card-body p {
      /* text-align: justify !important;*/
    }

  </style>
  
  <!-- Custom Header Script -->
  @php
    $customHeaderScript = App\Models\SiteSetting::get('custom_header_script', '');
  @endphp
  @if($customHeaderScript)
    {!! $customHeaderScript !!}
  @endif
</head>

<body>
  @include('layouts.header')

  @yield('content')

  @include('layouts.footer')



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

  <!-- Critical JS -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
  <!-- Non-critical JS with defer -->
  <script src="{{ asset('assets/javascripts/jquery.min.js') }}" defer></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}" defer></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}" defer></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}" defer></script>
  <script src="{{ asset('assets/javascripts/purecounter_vanilla.js') }}" defer></script>
  <script src="{{ asset('assets/javascripts/particles.min.js') }}" defer></script>
  <script src="{{ asset('assets/javascripts/plugins.js') }}" defer></script>
  <script src="{{ asset('assets/javascripts/script.js') }}" defer></script>
  <script src="{{ asset('assets/javascripts/main.js') }}" defer></script>
  
  <script>
    // Optimized initialization
    window.addEventListener('load', function() {
      // Initialize GLightbox after page load
      if (typeof GLightbox !== 'undefined') {
        GLightbox({ selector: '.glightbox', touchNavigation: true, loop: true });
      }
      
      // Back to Top Button
      const scrollTop = document.querySelector('.scroll-top');
      if (scrollTop) {
        let ticking = false;
        const toggleScrollTop = () => {
          scrollTop.classList.toggle('active', window.scrollY > 100);
          ticking = false;
        };
        
        window.addEventListener('scroll', () => {
          if (!ticking) {
            requestAnimationFrame(toggleScrollTop);
            ticking = true;
          }
        });
        
        scrollTop.addEventListener('click', (e) => {
          e.preventDefault();
          window.scrollTo({ top: 0, behavior: 'smooth' });
        });
      }
    });
  </script>

  
  
  <!-- Custom Body Script -->
  @php
    $customBodyScript = App\Models\SiteSetting::get('custom_body_script', '');
  @endphp
  @if($customBodyScript)
    {!! $customBodyScript !!}
  @endif
</body>
</html>