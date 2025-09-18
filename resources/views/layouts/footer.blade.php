<footer id="footer" class="footer-section">
  <div class="container">
      <div class="footer-content pt-5 pb-5">
          <div class="row">
              <div class="col-xl-4 col-lg-4 mb-50">
                  <div class="footer-widget">
                      <div class="footer-logo">
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
                      </div>
                      <div class="footer-text">
                          <p>{{ App\Models\SiteSetting::get('footer_description', 'Professional IT solutions and business services to help your company grow and succeed in the digital world.') }}</p>
                      </div>
                      <div class="footer-social-icon">
                          <span>Follow us</span>
                          @if(App\Models\SiteSetting::get('social_twitter'))
                            <a href="{{ App\Models\SiteSetting::get('social_twitter') }}" class="twitter"><i class="bi bi-twitter-x"></i></a>
                          @endif
                          @if(App\Models\SiteSetting::get('social_facebook'))
                            <a href="{{ App\Models\SiteSetting::get('social_facebook') }}" class="facebook"><i class="bi bi-facebook"></i></a>
                          @endif
                          @if(App\Models\SiteSetting::get('social_instagram'))
                            <a href="{{ App\Models\SiteSetting::get('social_instagram') }}" class="instagram"><i class="bi bi-instagram"></i></a>
                          @endif
                          @if(App\Models\SiteSetting::get('social_linkedin'))
                            <a href="{{ App\Models\SiteSetting::get('social_linkedin') }}" class="linkedin"><i class="bi bi-linkedin"></i></a>
                          @endif
                      </div>
                  </div>
              </div>
              
              <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                    <div class="service-widget footer-widget">
                      <div class="footer-widget-heading">
                          <h3>Services</h3>
                      </div>
                        <ul class="list">
                            @php
                              $footerServices = App\Models\Service::active()->ordered()->take(6)->get();
                            @endphp
                            @forelse($footerServices as $service)
                              <li><a href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a></li>
                            @empty
                              <li><a href="#services">Web Design</a></li>
                              <li><a href="#services">App Development</a></li>
                              <li><a href="#services">Cloud Services</a></li>
                              <li><a href="#services">Domain and Hosting</a></li>
                              <li><a href="#services">SEO Optimization</a></li>
                              <li><a href="#services">Social Media</a></li>
                            @endforelse
                            @if(App\Models\Service::active()->count() > 6)
                              <li><a href="#services">More...</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                    <div class="service-widget footer-widget">
                      <div class="footer-widget-heading">
                          <h3>Information</h3>
                      </div>
                        <ul class="list">
                          <li><a href="#featured">About</a></li>
                          <li><a href="#pricing">Pricing</a></li>
                          <li><a href="#team">Team</a></li>
                          <li><a href="#portfolio">Portfolio</a></li>
                          <li><a href="#faq">FAQs</a></li>
                          <li><a href="{{ route('case-study.index') }}">Case Study</a></li>
                          <li><a href="{{ route('posts.index') }}">Blogs</a></li>
                        </ul>
                    </div>
                </div>
              <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                  <div class="contact-widget footer-widget">
                      <div class="footer-widget-heading">
                          <h3>Contacts</h3>
                      </div>
                        <div class="footer-text">
                            <p><i class="bi bi-geo-alt-fill mr-15"></i> {{ App\Models\SiteSetting::get('contact_address', '101 West Town, PBO 12345, United States') }}</p>
                            <p><i class="bi bi-telephone-inbound-fill mr-15"></i> {{ App\Models\SiteSetting::get('contact_phone', '+1 1234 56 789') }}</p>
                            <p><i class="bi bi-envelope-fill mr-15"></i> {{ App\Models\SiteSetting::get('contact_email', 'contact@example.com') }}</p>
                        </div>
                  </div>
                  <div class="footer-widget">
                      <div class="footer-widget-heading">
                          <h3>Newsletter</h3>
                      </div>
                      <div class="footer-text mb-25">
                          <p>Don't miss to subscribe to our new feeds, kindly fill the form below.</p>
                      </div>
                      <div class="subscribe-form">
                          <form action="#">
                              <input type="text" placeholder="Email Address">
                              <button><i class="bi bi-telegram"></i></button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-xl-6 col-lg-6 text-left text-lg-left">
                  <div class="copyright-text">
                      <p>{{ App\Models\SiteSetting::get('footer_copyright', '© 2024 Technoit. All rights reserved.') }}</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</footer>