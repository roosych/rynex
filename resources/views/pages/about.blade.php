@extends('layouts.app')

@section('title', $seoSettings->about_title)
@section('meta_description', $seoSettings->about_description)
@section('og_title', $seoSettings->about_title)
@section('og_description', $seoSettings->about_description)

@section('content')

    @include('partials.page-header', ['pageTitle' => 'About Us', 'breadcrumb' => 'about us'])

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
                            <a href="{{ route('booking') }}">
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
                                    <a href="{{ route('booking') }}" class="btn-default">book a service</a>
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

    {{-- Mission / Vision --}}
    <div class="our-mission-vision bg-section">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3 class="wow fadeInUp">Our Mission / Vision</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Built on Trust. Driven by Quality. Backed by Warranty.</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">We believe every homeowner deserves fast, honest appliance repair at a fair price — without the runaround.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mission-vision-list">
                        <div class="mission-vision-item wow fadeInUp">
                            <div class="icon-box"><img src="/template/images/icon-our-mission.svg" alt=""></div>
                            <div class="mission-vision-content">
                                <h3>{{ $aboutSettings->mission_title }}</h3>
                                <p>{{ $aboutSettings->mission_text }}</p>
                            </div>
                        </div>
                        <div class="mission-vision-item active wow fadeInUp" data-wow-delay="0.2s">
                            <div class="icon-box"><img src="/template/images/icon-our-vision.svg" alt=""></div>
                            <div class="mission-vision-content">
                                <h3>{{ $aboutSettings->vision_title }}</h3>
                                <p>{{ $aboutSettings->vision_text }}</p>
                            </div>
                        </div>
                        <div class="mission-vision-item wow fadeInUp" data-wow-delay="0.4s">
                            <div class="icon-box"><img src="/template/images/icon-our-value.svg" alt=""></div>
                            <div class="mission-vision-content">
                                <h3>{{ $aboutSettings->values_title }}</h3>
                                <p>{{ $aboutSettings->values_text }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Benefits --}}
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

    {{-- Testimonials --}}
    @include('partials.testimonials')

    {{-- Ticker --}}
    @include('partials.ticker')

@endsection
