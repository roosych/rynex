<footer class="footer-main bg-section dark-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="about-footer">
                    <div class="footer-logo">
                        @if ($generalSettings->logo_white)
                            <img src="{{ $generalSettings->logo_white }}" width="240" alt="{{ $generalSettings->company_name }}" style="max-width:230px;">
                        @else
                            <a href="{{ route('home') }}" class="footer-brand-name" style="color:#fff;font-size:1.75rem;font-weight:700;text-decoration:none;display:inline-block;">{{ $generalSettings->company_name }}</a>
                        @endif
                    </div>
                    <div class="about-footer-content">
                        <p>{{ $generalSettings->footer_about }}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-5">
                <div class="footer-links">
                    <h3>contact us</h3>
                    @if (filled($generalSettings->phone_primary))
                    <div class="footer-contact-item">
                        <div class="icon-box"><img src="/template/images/icon-phone.svg" alt=""></div>
                        <div class="footer-contact-content">
                            <h3>For more information</h3>
                            <p><a href="tel:{{ $generalSettings->phone_primary }}">{{ $generalSettings->phone_primary }}</a></p>
                        </div>
                    </div>
                    @endif
                    @if (filled($generalSettings->phone_secondary))
                    <div class="footer-contact-item">
                        <div class="icon-box"><img src="/template/images/icon-headphone.svg" alt=""></div>
                        <div class="footer-contact-content">
                            <h3>Urgent service line</h3>
                            <p><a href="tel:{{ $generalSettings->phone_secondary }}">{{ $generalSettings->phone_secondary }}</a></p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="footer-links">
                    <h3>get in touch</h3>
                    <div class="footer-contact-info-item">
                        <h3>Location</h3>
                        <p>{{ $generalSettings->address }}</p>
                    </div>
                    <div class="footer-contact-info-item">
                        <h3>Email</h3>
                        <p><a href="mailto:{{ $generalSettings->email }}">{{ $generalSettings->email }}</a></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-3">
                <div class="footer-links">
                    <h3>quick link</h3>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About us</a></li>
                        <li><a href="{{ route('services.index') }}">Our services</a></li>
                        <li><a href="{{ route('blog.index') }}">Blog</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="footer-copyright">
                    <div class="footer-copyright-text">
                        <p>Copyright &copy; {{ date('Y') }} {{ $generalSettings->company_name }}. All Rights Reserved.</p>
                    </div>
                    <div class="footer-social-links">
                        <span>Follow us on social</span>
                        <ul>
                            @if ($generalSettings->social_facebook)
                            <li><a href="{{ $generalSettings->social_facebook }}" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a></li>
                            @endif
                            @if ($generalSettings->social_instagram)
                            <li><a href="{{ $generalSettings->social_instagram }}" target="_blank" rel="noopener" aria-label="Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a></li>
                            @endif
                            @if ($generalSettings->social_yelp)
                            <li><a href="{{ $generalSettings->social_yelp }}" target="_blank" rel="noopener" aria-label="Yelp"><i class="fa-brands fa-yelp" aria-hidden="true"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
