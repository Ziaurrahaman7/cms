<header id="header" class="header d-flex align-items-center sticked stikcy-menu">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
    <a href="{{ route('home') }}" class="logo d-flex align-items-center">
      @php
        $siteLogo = App\Models\SiteSetting::get('site_logo');
      @endphp
      @if($siteLogo && file_exists(public_path('storage/' . $siteLogo)))
        <img src="{{ asset('storage/' . $siteLogo) }}" alt="{{ App\Models\SiteSetting::get('site_name', 'Technoit') }}">
      @else
        <img src="{{ asset('assets/images/logo.png') }}" alt="{{ App\Models\SiteSetting::get('site_name', 'Technoit') }}">
      @endif
    </a>
    <nav id="navbar" class="navbar">
      <ul>
        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ route('about.index') }}" class="{{ request()->routeIs('about.*') ? 'active' : '' }}">About</a></li>
        <li><a href="{{ route('services.index') }}" class="{{ request()->routeIs('services.*') ? 'active' : '' }}">Services</a></li>
        <li><a href="{{ route('clients.index') }}" class="{{ request()->routeIs('clients.*') ? 'active' : '' }}">Clients</a></li>
        <li><a href="{{ route('case-study.index') }}" class="{{ request()->routeIs('case-study.*') ? 'active' : '' }}">Case Study</a></li>
        <li><a href="{{ route('posts.index') }}" class="{{ request()->routeIs('posts.*') ? 'active' : '' }}">Blog</a></li>
        <li><a href="{{ route('contact.index') }}" class="{{ request()->routeIs('contact.*') ? 'active' : '' }}">Contact</a></li>
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