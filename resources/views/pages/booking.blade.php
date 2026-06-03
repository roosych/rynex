@extends('layouts.app')

@section('title', $seoSettings->booking_title)
@section('meta_description', $seoSettings->booking_description)
@section('og_title', $seoSettings->booking_title)
@section('og_description', $seoSettings->booking_description)

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
<style>
    .contact-info { padding: 60px 0 30px; }
    .book-appointment { padding: 80px 0; margin-bottom: 100px; }
    .contact-info-item {
        background: var(--white-color); border-radius: 16px; padding: 24px 22px; margin-bottom: 16px;
        display: flex; align-items: flex-start; gap: 18px;
        box-shadow: 0 4px 28px rgba(0,0,0,0.07); border-bottom: 3px solid var(--accent-color);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .contact-info-item:hover { transform: translateY(-4px); box-shadow: 0 10px 40px rgba(0,0,0,0.13); }
    .contact-info-item .icon-box { background: var(--accent-color); border-radius: 12px; width: 52px; height: 52px; min-width: 52px; display: flex; align-items: center; justify-content: center; }
    .contact-info-item .icon-box img { width: 100%; max-width: 24px; filter: brightness(0) invert(1); }
    .contact-info-content h3 { color: var(--accent-color); font-size: 18px; font-weight: 700; text-transform: capitalize; margin-bottom: 6px; }
    .contact-info-content p { color: var(--text-color); margin: 0 0 3px; font-size: 0.95rem; }
    .contact-info-content p a { color: var(--text-color); transition: color 0.25s ease; }
    .contact-info-content p a:hover { color: var(--accent-color); }

    /* Success modal */
    .booking-modal-overlay {
        display: none;
        position: fixed; inset: 0; z-index: 9999;
        background: rgba(0,0,0,0.55);
        align-items: center; justify-content: center;
        padding: 20px;
    }
    .booking-modal-overlay.is-open { display: flex; }
    .booking-modal-box {
        background: var(--white-color, #fff);
        border-radius: 20px;
        padding: 48px 40px 40px;
        max-width: 440px; width: 100%;
        text-align: center;
        box-shadow: 0 24px 80px rgba(0,0,0,0.18);
        animation: modalIn 0.35s cubic-bezier(.34,1.56,.64,1) both;
    }
    @keyframes modalIn {
        from { opacity: 0; transform: scale(0.85) translateY(30px); }
        to   { opacity: 1; transform: scale(1) translateY(0); }
    }
    .booking-modal-icon {
        width: 72px; height: 72px;
        margin: 0 auto 24px;
        color: var(--accent-color, #e63946);
    }
    .booking-modal-icon svg { width: 100%; height: 100%; }
    .booking-modal-box h3 {
        font-size: 1.6rem; font-weight: 700;
        color: var(--heading-color, #1a1a2e);
        margin-bottom: 12px;
    }
    .booking-modal-box p {
        color: var(--text-color, #555);
        line-height: 1.65;
        margin-bottom: 28px;
    }
    .booking-modal-close { display: inline-flex; }

    /* Select2 — точное соответствие .book-appointment-form .form-control */
    .select2-container { width: 100% !important; }

    .select2-container--default .select2-selection--single {
        height: auto;
        padding: 17px 44px 17px 20px;
        border: 1px solid var(--divider-color);
        border-radius: 14px;
        background-color: var(--white-color);
        font-size: 16px;
        font-weight: 400;
        line-height: 1.5em;
        color: var(--text-color);
        opacity: 0.5;
        box-shadow: none;
        outline: none;
        transition: opacity 0.2s, border-color 0.2s;
    }
    .select2-container--default.select2-container--open .select2-selection--single,
    .select2-container--default.select2-container--focus .select2-selection--single {
        opacity: 1;
        border-color: var(--accent-color);
    }
    /* Если значение выбрано — убираем приглушение */
    .select2-container--default.select2-container--below .select2-selection--single:not(:has(.select2-selection__placeholder)),
    .select2-container--default.select2-container--above .select2-selection--single:not(:has(.select2-selection__placeholder)) {
        opacity: 1;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 1.5em;
        padding: 0;
        color: var(--text-color);
    }
    .select2-container--default .select2-selection--single .select2-selection__placeholder {
        color: var(--text-color);
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 100%;
        top: 0;
        right: 18px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow b {
        border-color: var(--text-color) transparent transparent transparent;
        opacity: 0.5;
    }
    .select2-container--default.select2-container--open .select2-selection__arrow b {
        border-color: transparent transparent var(--accent-color) transparent;
        opacity: 1;
    }

    /* Dropdown */
    .select2-dropdown {
        border: 1px solid var(--divider-color);
        border-radius: 14px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.10);
        overflow: hidden;
    }
    .select2-container--default .select2-search--dropdown {
        padding: 10px 12px 6px;
    }
    .select2-container--default .select2-search--dropdown .select2-search__field {
        padding: 10px 14px;
        border: 1px solid var(--divider-color);
        border-radius: 8px;
        font-size: 15px;
        color: var(--text-color);
        outline: none;
        width: 100%;
    }
    .select2-container--default .select2-search--dropdown .select2-search__field:focus {
        border-color: var(--accent-color);
    }
    .select2-results__options {
        max-height: 220px;
    }
    .select2-container--default .select2-results__option {
        padding: 10px 16px;
        font-size: 15px;
        color: var(--text-color);
    }
    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: var(--accent-color);
        color: #fff;
    }
    .select2-container--default .select2-results__option[aria-selected=true] {
        background-color: rgba(0,0,0,0.04);
        color: var(--accent-color);
        font-weight: 500;
    }
</style>
@endpush

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

    {{-- Booking Form --}}
    <div class="book-appointment bg-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 order-lg-1 order-2">
                    <div class="book-appointment-content">
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
                                        <input type="text" name="name" class="form-control" placeholder="Full Name Here" value="{{ old('name') }}" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-md-6 mb-4">
                                        <input type="text" id="phone_input" name="phone" class="form-control" placeholder="(555) 555-5555" value="{{ old('phone') }}" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-md-6 mb-4">
                                        <select id="brand_select" name="brand" class="form-control" required>
                                            <option value="" disabled selected>Select brand</option>
                                            @foreach($brands as $brand)
                                            <option value="{{ $brand->name }}" {{ old('brand') == $brand->name ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-md-6 mb-4">
                                        <select id="service_select" name="service" class="form-control" required>
                                            <option value="" disabled selected>Select appliance</option>
                                            <option value="refrigerator_repair" {{ old('service') == 'refrigerator_repair' ? 'selected' : '' }}>Refrigerator Repair</option>
                                            <option value="washer_repair" {{ old('service') == 'washer_repair' ? 'selected' : '' }}>Washer Repair</option>
                                            <option value="dryer_repair" {{ old('service') == 'dryer_repair' ? 'selected' : '' }}>Dryer Repair</option>
                                            <option value="dishwasher_repair" {{ old('service') == 'dishwasher_repair' ? 'selected' : '' }}>Dishwasher Repair</option>
                                            <option value="oven_stove_repair" {{ old('service') == 'oven_stove_repair' ? 'selected' : '' }}>Oven & Stove Repair</option>
                                            <option value="ac_hvac_repair" {{ old('service') == 'ac_hvac_repair' ? 'selected' : '' }}>AC / HVAC Repair</option>
                                            <option value="other" {{ old('service') == 'other' ? 'selected' : '' }}>Other Appliance</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-md-6 mb-4">
                                        <select id="zip_code_select" name="zip_code" class="form-control" required>
                                            <option value="" disabled selected>Select ZIP Code</option>
                                            @foreach($zipCodes as $zip)
                                            <option value="{{ $zip->code }}" {{ old('zip_code') == $zip->code ? 'selected' : '' }}>
                                                {{ $zip->code }}{{ $zip->neighborhood ? ' — ' . $zip->neighborhood : '' }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-md-6 mb-4">
                                        <input type="date" name="date" class="form-control" value="{{ old('date') }}" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-md-12 mb-5">
                                        <textarea name="message" class="form-control" rows="4" placeholder="Describe the issue with your appliance...">{{ old('message') }}</textarea>
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

    {{-- Success Modal --}}
    @if (session('success'))
    <div id="booking-success-modal" class="booking-modal-overlay" role="dialog" aria-modal="true">
        <div class="booking-modal-box">
            <div class="booking-modal-icon">
                <svg viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="26" cy="26" r="25" stroke="currentColor" stroke-width="2"/>
                    <path d="M14 27l9 9 15-18" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <h3>Request Received!</h3>
            <p>{{ session('success') }}</p>
            <button class="btn-default booking-modal-close" onclick="document.getElementById('booking-success-modal').classList.remove('is-open')">
                <span>Got it</span>
            </button>
        </div>
    </div>
    @endif

    {{-- Testimonials --}}
    @include('partials.testimonials')

    {{-- Ticker --}}
    @include('partials.ticker')

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.9/dist/inputmask.min.js"></script>
<script>
$(function () {
    // Open success modal if present
    var modal = document.getElementById('booking-success-modal');
    if (modal) {
        modal.classList.add('is-open');
        modal.addEventListener('click', function (e) {
            if (e.target === modal) modal.classList.remove('is-open');
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') modal.classList.remove('is-open');
        });
    }

    // Phone mask — US format (555) 555-5555
    Inputmask('(999) 999-9999').mask(document.getElementById('phone_input'));

    $('#service_select').select2({
        placeholder: 'Select appliance',
        minimumResultsForSearch: Infinity,
        width: '100%',
        dropdownParent: $('#service_select').parent(),
    });

    $('#brand_select').select2({
        placeholder: 'Select brand',
        width: '100%',
        dropdownParent: $('#brand_select').parent(),
    });

    $('#zip_code_select').select2({
        placeholder: 'Select ZIP Code',
        width: '100%',
        dropdownParent: $('#zip_code_select').parent(),
    });
});
</script>
@endpush

@endsection
