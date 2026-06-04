@extends('layouts.app')

@section('title', $service->meta_title ?: $service->title . ' in Dallas, TX | Swift Fix Appliance Repair')
@section('meta_description', $service->meta_description ?: 'Professional ' . $service->title . ' in Dallas, TX. Certified technicians, same-day service, 90-day warranty. Call Swift Fix now.')
@section('og_title', $service->meta_title ?: $service->title . ' in Dallas, TX | Swift Fix')
@section('og_description', $service->meta_description ?: 'Professional ' . $service->title . ' in Dallas, TX.')
@section('og_type', 'article')
@php $serviceImage = $service->og_image_url ?: null; @endphp
@if($serviceImage)
@section('og_image', $serviceImage)
@section('og_image_alt', $service->title)
@endif

@push('schema')
@php
$serviceSchema = \Spatie\SchemaOrg\Schema::service()
    ->name($service->title)
    ->description($service->meta_description ?? $service->description ?? '')
    ->url(route('services.show', $service->slug))
    ->provider(
        \Spatie\SchemaOrg\Schema::localBusiness()
            ->name($generalSettings->company_name ?? 'Swift Fix Appliance Repair')
            ->telephone($generalSettings->phone_primary ?? '')
            ->url(url('/'))
    )
    ->areaServed(
        \Spatie\SchemaOrg\Schema::city()->name('Dallas, TX')
    );
@endphp
{!! $serviceSchema->toScript() !!}
@endpush

@section('content')

    @include('partials.page-header', ['pageTitle' => $service->title, 'breadcrumb' => $service->title])

    <div class="page-service-single">
        <div class="container">
            <div class="row">

                {{-- Sidebar --}}
                <div class="col-lg-4">
                    <div class="page-single-sidebar">
                        <div class="page-catagery-list wow fadeInUp">
                            <h3>Our Services</h3>
                            <ul>
                                @foreach ($allServices as $s)
                                <li><a href="{{ route('services.show', $s->slug) }}"
                                       {{ $s->slug === $service->slug ? 'style=font-weight:700;' : '' }}>
                                    {{ $s->title }}
                                </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Main Content --}}
                <div class="col-lg-8">
                    <div class="service-single-content">
                        <div class="service-feature-image">
                            <figure class="image-anime reveal">
                                <img src="{{ $service->image_url ?: '/template/images/template/technicianatwork.jpg' }}"
                                     alt="{{ $service->title }}">
                            </figure>
                        </div>
                        <div class="service-entry">
                            {!! $service->content ?? '<p>Professional appliance repair service. Contact us today for a same-day appointment.</p>' !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('partials.trusted-brands')

    @include('partials.booking-form', ['showMap' => false])

    @include('partials.ticker')

@endsection
