@extends('layouts.app')

@section('title', $seoSettings->booking_title)
@section('meta_description', $seoSettings->booking_description)
@section('og_title', $seoSettings->booking_title)
@section('og_description', $seoSettings->booking_description)

@section('content')

    @include('partials.page-header', ['pageTitle' => 'Book a Service', 'breadcrumb' => 'book a service'])

    {{-- Contact Info Cards --}}
    <div class="contact-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-item wow fadeInUp">
                        <div class="icon-box"><img src="/template/images/icon-phone.svg" alt=""></div>
                        <div class="contact-info-content">
                            <h3>phone</h3>
                            <p><a href="tel:{{ $generalSettings->phone_primary }}">{{ $generalSettings->phone_primary }}</a></p>
                            <p><a href="tel:{{ $generalSettings->phone_secondary }}">{{ $generalSettings->phone_secondary }}</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-item wow fadeInUp" data-wow-delay="0.2s">
                        <div class="icon-box"><img src="/template/images/icon-location.svg" alt=""></div>
                        <div class="contact-info-content">
                            <h3>address</h3>
                            <p>{{ $generalSettings->address }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-item wow fadeInUp" data-wow-delay="0.4s">
                        <div class="icon-box"><img src="/template/images/icon-watch.svg" alt=""></div>
                        <div class="contact-info-content">
                            <h3>working hours</h3>
                            <p>{{ $generalSettings->hours_weekday }}</p>
                            <p>{{ $generalSettings->hours_saturday }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.booking-form', ['showMap' => true])

    {{-- Testimonials --}}
    @include('partials.testimonials')

    {{-- Ticker --}}
    @include('partials.ticker')

@endsection
