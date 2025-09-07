<header id="header" class="header d-flex align-items-center sticked stikcy-menu">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
    <a href="{{ route('home') }}" class="logo d-flex align-items-center">
      <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
    </a>
    <nav id="navbar" class="navbar">
      <ul>
        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
        <li><a href="#services" class="">Services</a></li>
        <li><a href="#portfolio" class="">Portfolio</a></li>
        <li><a href="#testimonials" class="">Testimonials</a></li>
        <li><a href="#team" class="">Team</a></li>
        <li class="dropdown"><a href="#"><span>Menu</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
          <ul>
            <li><a href="#featured">About</a></li>
            <li><a href="#pricing">Pricing</a></li>
            <li><a href="#faq">FAQs</a></li>
            <li><a href="{{ route('posts.index') }}">Blogs</a></li>
          </ul>
        </li>
        <li><a href="{{ route('posts.index') }}">News</a></li>
      </ul>
    </nav>
    <a href="#contact" class="btn-get-started hide-on-mobile">Get Quotes</a>
    <button id="darkmode-button"><i class="bi bi-moon-fill"></i></button>
    <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
    <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
  </div>
  <div id="rtl-button" style="cursor: pointer;">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span class="rtl-label">RTL</span>
  </div>
</header>