@extends('layouts.app')

@section('title', $seoSettings->services_title)
@section('meta_description', $seoSettings->services_description)
@section('og_title', $seoSettings->services_title)
@section('og_description', $seoSettings->services_description)

@section('content')

    @include('partials.page-header', ['pageTitle' => 'Our Services', 'breadcrumb' => 'services'])

    <section class="page-services" style="padding:80px 0;">
        <div class="container">
            <div class="row">
                @foreach ($services as $index => $service)
                <div class="col-lg-4 col-md-6">
                    <div class="service-box wow fadeInUp" data-wow-delay="{{ ($index % 3) * 0.2 }}s">
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
        </div>
    </section>

    <section class="our-process bg-section" style="margin-bottom: 100px;">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <div class="process-video-box">
                        <div class="process-video-image">
                            <figure class="image-anime">
                                <img src="/template/images/template/technicianatwork.jpg" alt="Swift Fix technician at work">
                            </figure>
                        </div>
                        <div class="video-play-box wow fadeInUp">
                            <div class="video-play-button">
                                <a href="https://www.youtube.com/watch?v=Y-x0efG1seA" class="popup-video" data-cursor-text="Play">
                                    <i class="fa-solid fa-play"></i>
                                </a>
                            </div>
                            <div class="video-play-content">
                                <h3>How it works</h3>
                                <h2>See us in action</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="our-process-content">
                        <div class="section-title">
                            <div class="section-subtitle"><h3>our process</h3></div>
                            <h2>Fast, Professional Repair — Done Right the First Time</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">From your first call to the completed repair, every step is built around speed, transparency, and results that last.</p>
                        </div>
                        <div class="our-process-list">
                            <ul>
                                <li>Licensed &amp; Insured Technicians</li>
                                <li>Same-Day Service Available</li>
                                <li>Upfront Flat-Rate Pricing</li>
                                <li>All Major Brands Serviced</li>
                                <li>90-Day Repair Warranty</li>
                                <li>Respectful In-Home Service</li>
                            </ul>
                        </div>
                        <div class="our-process-btn">
                            <a href="{{ route('booking') }}" class="btn-default">Book a Service</a>
                        </div>
                        <div class="section-footer-text">
                            <p>Most repairs completed in a single visit — <a href="{{ route('booking') }}">contact us today</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.trusted-brands')
    @include('partials.testimonials')
    @include('partials.ticker')

@endsection
