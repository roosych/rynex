{{-- Trusted Brands slider — $brands injected via View composer (AppServiceProvider) --}}
@if ($brands->isNotEmpty())
<div class="trusted-client">
    <div class="container">
        <div class="row section-row">
            <div class="col-lg-12">
                <div class="section-title section-title-center">
                    <h3 class="wow fadeInUp">our brands</h3>
                    <h2 class="text-anime-style-3" data-cursor="-opaque">We Repair All Major Brands</h2>
                    <p class="wow fadeInUp" data-wow-delay="0.2s">From everyday essentials to high-end appliances, our technicians are trained and equipped to service every major brand.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="testimonial-company-slider">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @foreach ($brands as $brand)
                            <div class="swiper-slide">
                                <div class="trusted-client-logo">
                                    @if ($brand->logo_url)
                                        <img src="{{ $brand->logo_url }}" alt="{{ $brand->name }}">
                                    @else
                                        <span class="trusted-client-name">{{ $brand->name }}</span>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="trusted-client-button-prev"><i class="fa-solid fa-arrow-left"></i></div>
                    <div class="trusted-client-button-next"><i class="fa-solid fa-arrow-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
