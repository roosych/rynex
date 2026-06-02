@extends('layouts.app')

@section('title', $seoSettings->home_title)
@section('meta_description', $seoSettings->home_description)
@section('og_title', $seoSettings->home_title)
@section('og_description', $seoSettings->home_description)

@push('schema')
@if($faqs->isNotEmpty())
@php
$faqSchema = \Spatie\SchemaOrg\Schema::fAQPage()->mainEntity(
    $faqs->map(fn($faq) =>
        \Spatie\SchemaOrg\Schema::question()
            ->name($faq->question)
            ->acceptedAnswer(\Spatie\SchemaOrg\Schema::answer()->text($faq->answer))
    )->toArray()
);
@endphp
{!! $faqSchema->toScript() !!}
@endif
@endpush

@push('styles')
<style>
    .platform-ratings { padding: 80px 0; }
    .platform-rating-box {
        text-align: center; padding: 40px 24px; border-radius: 12px;
        background: #fff; box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        margin-bottom: 30px; transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .platform-rating-box:hover { transform: translateY(-4px); box-shadow: 0 8px 32px rgba(0,0,0,0.13); }
    .platform-logo { display: flex; align-items: center; justify-content: center; gap: 10px; margin-bottom: 16px; }
    .platform-logo span { font-size: 1.1rem; font-weight: 700; color: #1a2e44; letter-spacing: 0.02em; }
    .platform-score { font-size: 3.2rem; font-weight: 800; color: #1a2e44; line-height: 1; margin-bottom: 8px; }
    .platform-rating-box .platform-stars { color: #f59e0b; font-size: 1.1rem; margin-bottom: 10px; gap: 2px; display: flex; justify-content: center; }
    .platform-rating-box p { color: #6b7280; font-size: 0.92rem; margin: 0; }
</style>
@endpush

@section('content')

    {{-- Hero --}}
    <div class="hero">
        <div class="hero-section hero-bg-image hero-video bg-section dark-section">
            <div class="hero-bg-video">
                <video autoplay muted loop id="myVideo"><source src="/template/images/template/bg3.mp4" type="video/mp4"></video>
            </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="hero-content">
                            <div class="section-title">
                                <h1 class="text-anime-style-3" data-cursor="-opaque">{{ $heroSettings->title }}</h1>
                                <p class="wow fadeInUp">{{ $heroSettings->subtitle }}</p>
                            </div>
                            <div class="hero-btn wow fadeInUp" data-wow-delay="0.2s">
                                <a href="{{ route('services.index') }}" class="btn-default btn-highlighted">View Our Services</a>
                                <a href="{{ route('booking') }}" class="btn-default" style="margin-left:12px;">Book a Repair</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Hero CTA Box --}}
    <div class="hero-cta-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-cta-info">
                        <div class="hero-cta-item wow fadeInUp">
                            <div class="hero-cta-item-header">
                                <div class="icon-box"><img src="/template/images/icon-contact-now.svg" alt=""></div>
                                <div class="hero-cta-item-title"><h3>Contact Us</h3></div>
                            </div>
                            <div class="hero-cta-item-content">
                                <p><a href="mailto:{{ $generalSettings->email }}"><span>Email:</span> {{ $generalSettings->email }}</a></p>
                                <p><a href="tel:{{ $generalSettings->phone_primary }}"><span>Phone:</span> {{ $generalSettings->phone_primary }}</a></p>
                            </div>
                        </div>
                        <div class="hero-cta-item wow fadeInUp" data-wow-delay="0.2s">
                            <div class="hero-cta-item-header">
                                <div class="icon-box"><img src="/template/images/icon-location.svg" alt=""></div>
                                <div class="hero-cta-item-title"><h3>Our Location</h3></div>
                            </div>
                            <div class="hero-cta-item-content">
                                <p>Serving Dallas, TX and surrounding cities</p>
                            </div>
                        </div>
                        <div class="hero-cta-item wow fadeInUp" data-wow-delay="0.4s">
                            <div class="hero-cta-item-header">
                                <div class="icon-box"><img src="/template/images/icon-watch.svg" alt=""></div>
                                <div class="hero-cta-item-title"><h3>Working Hours</h3></div>
                            </div>
                            <div class="hero-cta-item-content">
                                <p>{{ $generalSettings->hours_weekday }}</p>
                                <p>{{ $generalSettings->hours_saturday }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- About Us --}}
    <div class="about-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-us-image">
                        <div class="about-img-1">
                            <figure class="image-anime reveal">
                                <img src="/template/images/template/service-maintenance-worker-repairing.jpg" alt="Certified appliance repair technician">
                            </figure>
                        </div>
                        <div class="contact-us-circle">
                            <a href="{{ route('about') }}">
                                <img src="/template/images/contact-us-circle.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-us-content">
                        <div class="section-title">
                            <h3 class="wow fadeInUp">about us</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">{{ $aboutSettings->heading }}</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">{{ $aboutSettings->description }}</p>
                        </div>
                        <div class="about-us-body">
                            <div class="about-body-content">
                                <div class="about-body-list wow fadeInUp" data-wow-delay="0.4s">
                                    <ul>
                                        <li>Licensed & insured technicians</li>
                                        <li>All major brands and models covered</li>
                                        <li>Trusted by thousands of homeowners</li>
                                    </ul>
                                </div>
                                <div class="about-body-footer wow fadeInUp" data-wow-delay="0.6s">
                                    <a href="{{ route('about') }}" class="btn-default">learn more</a>
                                    <div class="about-video-button">
                                        <a href="https://www.youtube.com/watch?v=Y-x0efG1seA" class="popup-video"><i class="fa-solid fa-play"></i>watch video</a>
                                    </div>
                                </div>
                            </div>
                            <div class="about-team-member">
                                <img src="/template/images/icon-about-team-member.svg" alt="">
                                <h2><span class="counter">{{ $aboutSettings->technicians }}</span>+</h2>
                                <p>Certified technicians</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="about-counter-list">
                        <div class="about-counter-item">
                            <div class="icon-box"><img src="/template/images/icon-about-counter-1.svg" alt=""></div>
                            <div class="about-counter-content"><h2><span class="counter">{{ $aboutSettings->satisfaction_rate }}</span>%</h2><p>customer satisfaction rate</p></div>
                        </div>
                        <div class="about-counter-item">
                            <div class="icon-box"><img src="/template/images/icon-about-counter-2.svg" alt=""></div>
                            <div class="about-counter-content"><h2><span class="counter">{{ $aboutSettings->years_experience }}</span>+</h2><p>years of experience</p></div>
                        </div>
                        <div class="about-counter-item">
                            <div class="icon-box"><img src="/template/images/icon-about-counter-3.svg" alt=""></div>
                            <div class="about-counter-content"><h2><span class="counter">{{ $aboutSettings->appliances_repaired }}</span>+</h2><p>appliances repaired</p></div>
                        </div>
                        <div class="about-counter-item">
                            <div class="icon-box"><img src="/template/images/icon-about-counter-4.svg" alt=""></div>
                            <div class="about-counter-content"><h2><span class="counter">{{ $aboutSettings->cities_served }}</span>+</h2><p>cities & zip codes served</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Our Services Slider --}}
    <div class="our-services bg-section">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-12">
                    <div class="section-title section-title-center">
                        <h3 class="wow fadeInUp">{{ $processSettings->services_subtitle }}</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">{{ $processSettings->services_title }}</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">{{ $processSettings->services_description }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="services-slider">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                @foreach ($services as $service)
                                <div class="swiper-slide">
                                    <div class="service-box">
                                        <div class="service-image">
                                            <a href="{{ route('services.show', $service->slug) }}" data-cursor-text="View">
                                                <figure class="image-anime">
                                                    <img src="{{ $service->image_url ?: '/template/images/template/service-maintenance-worker-repairing.jpg' }}"
                                                         alt="{{ $service->title }}">
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="service-item">
                                            <div class="service-content">
                                                <h3><a href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a></h3>
                                                @if ($service->excerpt)
                                                    <p>{{ $service->excerpt }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="services-pagination"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="section-footer-text wow fadeInUp" data-wow-delay="0.2s">
                        <p>Something broken at home? <a href="{{ route('booking') }}">Give us a call — we'll be there today.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Why Choose Us --}}
    <div class="why-choose-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="why-choose-content">
                        <div class="section-title section-title-center">
                            <h3 class="wow fadeInUp">Why choose us</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">{{ $processSettings->why_heading }}</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">{{ $processSettings->why_description }}</p>
                        </div>
                        <div class="why-choose-list">
                            <div class="why-choose-list-item wow fadeInUp" data-wow-delay="0.4s">
                                <div class="why-choose-item-content">
                                    <h3>{{ $processSettings->why_feature_1_title }}</h3>
                                    <p>{{ $processSettings->why_feature_1_body }}</p>
                                </div>
                            </div>
                            <div class="why-choose-list-item wow fadeInUp" data-wow-delay="0.6s">
                                <div class="why-choose-item-content">
                                    <h3>{{ $processSettings->why_feature_2_title }}</h3>
                                    <p>{{ $processSettings->why_feature_2_body }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="why-choose-image">
                        <figure class="image-anime reveal">
                            <img src="/template/images/template/technicianatwork.jpg" alt="Expert appliance repair technician">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Our Process --}}
    <div class="our-process bg-section">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <div class="process-video-box">
                        <div class="process-video-image">
                            <figure class="image-anime">
                                <img src="/template/images/template/process.webp" alt="Appliance repair in progress">
                            </figure>
                        </div>
                        <div class="video-play-box wow fadeInUp" data-wow-delay="0.2s">
                            <div class="video-play-button">
                                <a href="https://www.youtube.com/watch?v=Y-x0efG1seA" class="popup-video" data-cursor-text="Play">
                                    <i class="fa-solid fa-play"></i>
                                </a>
                            </div>
                            <div class="video-play-content">
                                <h3>Our process</h3>
                                <h2>See how we work</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="our-process-content">
                        <div class="section-title">
                            <h3 class="wow fadeInUp">Our process</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">{{ $processSettings->process_heading }}</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">{{ $processSettings->process_description }}</p>
                        </div>
                        <div class="our-process-list wow fadeInUp" data-wow-delay="0.4s">
                            <ul>
                                <li>Licensed Technicians</li>
                                <li>Same-Day Visits</li>
                                <li>Upfront Pricing</li>
                                <li>Warranty on Parts</li>
                                <li>All Major Brands</li>
                                <li>In-Home Service</li>
                            </ul>
                        </div>
                        <div class="our-process-btn wow fadeInUp" data-wow-delay="0.6s">
                            <a href="{{ route('about') }}" class="btn-default">learn more</a>
                        </div>
                        <div class="section-footer-text wow fadeInUp" data-wow-delay="0.8s">
                            <p>Appliance acting up? — <a href="{{ route('booking') }}">Book a repair today!</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- How We Work --}}
    <div class="how-we-work">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="how-we-work-content">
                        <div class="section-title">
                            <h3 class="wow fadeInUp">How we work</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">{{ $processSettings->how_work_heading }}</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">{{ $processSettings->how_work_description }}</p>
                        </div>
                        <div class="how-work-steps">
                            <div class="how-work-step-item wow fadeInUp" data-wow-delay="0.4s">
                                <div class="how-work-step-no"><h2>01</h2></div>
                                <div class="how-work-step-content">
                                    <h3>{{ $processSettings->step_1_title }}</h3>
                                    <p>{{ $processSettings->step_1_body }}</p>
                                </div>
                            </div>
                            <div class="how-work-step-item wow fadeInUp" data-wow-delay="0.6s">
                                <div class="how-work-step-no"><h2>02</h2></div>
                                <div class="how-work-step-content">
                                    <h3>{{ $processSettings->step_2_title }}</h3>
                                    <p>{{ $processSettings->step_2_body }}</p>
                                </div>
                            </div>
                            <div class="how-work-step-item wow fadeInUp" data-wow-delay="0.8s">
                                <div class="how-work-step-no"><h2>03</h2></div>
                                <div class="how-work-step-content">
                                    <h3>{{ $processSettings->step_3_title }}</h3>
                                    <p>{{ $processSettings->step_3_body }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="how-we-work-image">
                        <div class="how-we-work-img">
                            <figure class="image-anime">
                                <img src="/template/images/template/athome.jpg" alt="Technician repairing appliance at home">
                            </figure>
                        </div>
                        <div class="how-work-contact-info wow fadeInUp" data-wow-delay="0.2s">
                            <h2>Questions? We're Here to Help!</h2>
                            <div class="how-work-contact-box">
                                <div class="icon-box"><img src="/template/images/icon-phone.svg" alt=""></div>
                                <div class="how-work-contact-content">
                                    <h3><a href="tel:{{ $generalSettings->phone_primary }}">{{ $generalSettings->phone_primary }}</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Our Benefits --}}
    <div class="our-benefit bg-section dark-section">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3 class="wow fadeInUp">our benefits</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">{{ $benefitsSettings->heading }}</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">{{ $benefitsSettings->description }}</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6 order-lg-1 order-md-1 order-1">
                    <div class="our-benefit-box-1">
                        <div class="our-benefit-item wow fadeInUp">
                            <div class="icon-box"><img src="/template/images/icon-benefit-1.svg" alt=""></div>
                            <div class="our-benefit-item-content"><h3>{{ $benefitsSettings->b1_title }}</h3><p>{{ $benefitsSettings->b1_desc }}</p></div>
                        </div>
                        <div class="our-benefit-item wow fadeInUp" data-wow-delay="0.2s">
                            <div class="icon-box"><img src="/template/images/icon-benefit-2.svg" alt=""></div>
                            <div class="our-benefit-item-content"><h3>{{ $benefitsSettings->b2_title }}</h3><p>{{ $benefitsSettings->b2_desc }}</p></div>
                        </div>
                        <div class="our-benefit-item wow fadeInUp" data-wow-delay="0.4s">
                            <div class="icon-box"><img src="/template/images/icon-benefit-3.svg" alt=""></div>
                            <div class="our-benefit-item-content"><h3>{{ $benefitsSettings->b3_title }}</h3><p>{{ $benefitsSettings->b3_desc }}</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-2 order-md-3 order-2">
                    <div class="our-benefit-image">
                        <figure><img src="/template/images/template/ds.png" alt="Quality appliance repair service"></figure>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 order-lg-3 order-md-2 order-3">
                    <div class="our-benefit-box-2">
                        <div class="our-benefit-item wow fadeInUp">
                            <div class="icon-box"><img src="/template/images/icon-benefit-4.svg" alt=""></div>
                            <div class="our-benefit-item-content"><h3>{{ $benefitsSettings->b4_title }}</h3><p>{{ $benefitsSettings->b4_desc }}</p></div>
                        </div>
                        <div class="our-benefit-item wow fadeInUp" data-wow-delay="0.2s">
                            <div class="icon-box"><img src="/template/images/icon-benefit-5.svg" alt=""></div>
                            <div class="our-benefit-item-content"><h3>{{ $benefitsSettings->b5_title }}</h3><p>{{ $benefitsSettings->b5_desc }}</p></div>
                        </div>
                        <div class="our-benefit-item wow fadeInUp" data-wow-delay="0.4s">
                            <div class="icon-box"><img src="/template/images/icon-benefit-6.svg" alt=""></div>
                            <div class="our-benefit-item-content"><h3>{{ $benefitsSettings->b6_title }}</h3><p>{{ $benefitsSettings->b6_desc }}</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Platform Ratings --}}
    <div class="platform-ratings">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <div class="section-title section-title-center">
                        <h3 class="wow fadeInUp">our ratings</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Top-rated appliance repair near you</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">Don't just take our word for it — check what homeowners say on the platforms they trust most.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <div class="platform-rating-box wow fadeInUp">
                        <div class="platform-logo"><i class="fa-brands fa-google" style="font-size:2.4rem;color:#4285F4;"></i><span>Google</span></div>
                        <div class="platform-score">4.9</div>
                        <div class="platform-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                        <p>Based on 320+ reviews</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="platform-rating-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="platform-logo"><i class="fa-brands fa-yelp" style="font-size:2.4rem;color:#d32323;"></i><span>Yelp</span></div>
                        <div class="platform-score">4.8</div>
                        <div class="platform-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                        <p>Based on 180+ reviews</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="platform-rating-box wow fadeInUp" data-wow-delay="0.4s">
                        <div class="platform-logo"><i class="fa-solid fa-wrench" style="font-size:2.4rem;color:#FF6B35;"></i><span>Angi</span></div>
                        <div class="platform-score">4.9</div>
                        <div class="platform-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                        <p>Based on 95+ reviews</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="platform-rating-box wow fadeInUp" data-wow-delay="0.6s">
                        <div class="platform-logo"><i class="fa-brands fa-facebook-f" style="font-size:2.4rem;color:#1877F2;"></i><span>Facebook</span></div>
                        <div class="platform-score">5.0</div>
                        <div class="platform-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                        <p>Based on 140+ reviews</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- FAQs --}}
    <div class="our-faqs bg-section dark-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="our-faqs-content">
                        <div class="section-title">
                            <h3 class="wow fadeInUp">frequently asked questions</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Common questions about appliance repair</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">Have questions about our repair services? Find quick, honest answers below.</p>
                        </div>
                        <div class="faq-button wow fadeInUp" data-wow-delay="0.4s">
                            <a href="{{ route('booking') }}" class="btn-default btn-highlighted">Book a Service</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="faq-accordion" id="faqaccordion">
                        @foreach ($faqs as $faq)
                        <div class="accordion-item wow fadeInUp" @if(!$loop->first) data-wow-delay="{{ ($loop->index * 0.2) }}s" @endif>
                            <h2 class="accordion-header" id="faqHeading{{ $faq->id }}">
                                <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faqCollapse{{ $faq->id }}"
                                        aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                        aria-controls="faqCollapse{{ $faq->id }}">{{ $faq->question }}</button>
                            </h2>
                            <div id="faqCollapse{{ $faq->id }}"
                                 class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                 aria-labelledby="faqHeading{{ $faq->id }}"
                                 data-bs-parent="#faqaccordion">
                                <div class="accordion-body"><p>{{ $faq->answer }}</p></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Testimonials --}}
    @include('partials.testimonials')

    {{-- Blog Preview --}}
    <div class="our-blog">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-12">
                    <div class="section-title section-title-center">
                        <h3 class="wow fadeInUp">{{ $processSettings->blog_subtitle }}</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">{{ $processSettings->blog_title }}</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">{{ $processSettings->blog_description }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($latestPosts as $post)
                <div class="col-lg-4 col-md-6">
                    <div class="post-item wow fadeInUp" @if(!$loop->first) data-wow-delay="{{ $loop->index * 0.2 }}s" @endif>
                        <div class="post-featured-image">
                            <a href="{{ route('blog.show', $post->slug) }}" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="{{ $post->image_url ?: '/template/images/template/careref.jpg' }}" alt="{{ $post->title }}">
                                </figure>
                            </a>
                        </div>
                        <div class="post-item-body">
                            <div class="post-item-content">
                                <h2><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h2>
                            </div>
                            <div class="post-item-btn">
                                <a href="{{ route('blog.show', $post->slug) }}" class="readmore-btn">read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Book Appointment CTA --}}
    <div class="book-appointment bg-section" style="margin-bottom:100px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 order-lg-1 order-2">
                    <div class="book-appointment-content">
                        <div class="booking-contact-list">
                            <div class="booking-contact-item wow fadeInUp">
                                <div class="icon-box"><img src="/template/images/icon-location-white.svg" alt=""></div>
                                <div class="booking-contact-content"><p>{{ $generalSettings->address }}</p></div>
                            </div>
                            <div class="booking-contact-item wow fadeInUp" data-wow-delay="0.2s">
                                <div class="icon-box"><img src="/template/images/icon-phone-white.svg" alt=""></div>
                                <div class="booking-contact-content">
                                    <p><a href="tel:{{ $generalSettings->phone_primary }}">{{ $generalSettings->phone_primary }}</a></p>
                                    <p><a href="tel:{{ $generalSettings->phone_secondary }}">{{ $generalSettings->phone_secondary }}</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="google-map-iframe">
                            <iframe src="{{ $generalSettings->map_embed_url }}" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 order-lg-2 order-1">
                    <div class="booking-form-box">
                        <div class="section-title section-title-center">
                            <h3 class="wow fadeInUp">Book a service</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Ready to Get It Fixed?</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">Fill out the form and we'll get back to you fast. Most jobs are booked same or next day.</p>
                        </div>
                        <div class="book-appointment-form wow fadeInUp" data-wow-delay="0.4s">
                            @if ($errors->any())
                            <div class="booking-form-alert" role="alert">
                                <strong>We couldn't send your request. Please fix:</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form id="appointmentForm" action="{{ route('booking.store') }}" method="POST" data-toggle="validator">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6 mb-4">
                                        <input type="text" name="name" class="form-control" placeholder="Full Name Here" required>
                                    </div>
                                    <div class="form-group col-md-6 mb-4">
                                        <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
                                    </div>
                                    <div class="form-group col-md-6 mb-4">
                                        <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                                    </div>
                                    <div class="form-group col-md-6 mb-4">
                                        <select name="service" class="form-control form-select" required>
                                            <option value="" disabled selected>Select appliance</option>
                                            <option value="refrigerator_repair">Refrigerator Repair</option>
                                            <option value="washer_repair">Washer Repair</option>
                                            <option value="dryer_repair">Dryer Repair</option>
                                            <option value="dishwasher_repair">Dishwasher Repair</option>
                                            <option value="oven_stove_repair">Oven & Stove Repair</option>
                                            <option value="ac_hvac_repair">AC / HVAC Repair</option>
                                            <option value="other">Other Appliance</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 mb-4">
                                        <input type="date" name="date" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6 mb-4">
                                        <input type="time" name="time" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-12 mb-5">
                                        <textarea name="message" class="form-control" rows="4" placeholder="Describe the issue with your appliance..."></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn-default"><span>send request</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
