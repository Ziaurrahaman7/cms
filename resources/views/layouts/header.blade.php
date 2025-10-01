<header id="header" class="header d-flex align-items-center sticked stikcy-menu" style="background: rgba(255, 255, 255, 0.95) !important; backdrop-filter: blur(10px) !important;">
<style>
.header .navbar a {
  color: #333 !important;
}
.header .navbar a:hover {
  color: #007bff !important;
}
.header .navbar a.active {
  color: #007bff !important; 01713426386
}

/* Mobile menu open state - header height 100% */
@media (max-width: 991px) {
  body.mobile-nav-active .header.sticked {
    height: 100vh !important;
  }
  
  /* Mobile nav menu text color white */
  body.mobile-nav-active .header .navbar a {
    color: #fff !important;
  }
  body.mobile-nav-active .header .navbar a:hover {
    color: #fff !important;
  }
  body.mobile-nav-active .header .navbar a.active {
    color: #fff !important;
  }
}

</style>
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
        <li class="dropdown">
          <a href="#" class="{{ request()->routeIs('services.*') ? 'active' : '' }}">Services <i class="bi bi-chevron-down dropdown-indicator"></i></a>
          <ul>
            <li><a href="{{ route('services.index') }}">All Services</a></li>
            @php
              $headerServices = App\Models\Service::active()->ordered()->take(6)->get();
            @endphp
            @foreach($headerServices as $service)
              <li><a href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a></li>
            @endforeach
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="{{ request()->routeIs('products.*') ? 'active' : '' }}">Products <i class="bi bi-chevron-down dropdown-indicator"></i></a>
          <ul>
            @php
              $headerProducts = App\Models\Product::active()->ordered()->get();
            @endphp
            @forelse($headerProducts as $product)
              <li><a href="{{ route('products.show', $product->slug) }}">{{ $product->title }}</a></li>
            @empty
              <li><a href="#">No Products Available</a></li>
            @endforelse
          </ul>
        </li>
        <li><a href="{{ route('case-study.index') }}" class="{{ request()->routeIs('case-study.*') ? 'active' : '' }}">Case Study</a></li>
      </ul>
    </nav>
    <a href="{{ route('contact.index') }}" class="btn-get-started hide-on-mobile">Get Quotes</a>
    <button id="darkmode-button"><i class="bi bi-moon-fill"></i></button>
    <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
    <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
  </div>
  {{-- <div id="rtl-button" style="cursor: pointer;">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span class="rtl-label">RTL</span>
  </div> --}}
</header>