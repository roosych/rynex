@extends('layouts.app')

@section('title', 'Privacy Policy | ' . $generalSettings->company_name)
@section('meta_description', 'How ' . $generalSettings->company_name . ' collects, uses, and protects the information you share with us.')
@section('og_title', 'Privacy Policy | ' . $generalSettings->company_name)
@section('og_description', 'How ' . $generalSettings->company_name . ' collects, uses, and protects the information you share with us.')

@push('styles')
<style>
    .post-entry h2 { font-size: 1.4rem; font-weight: 700; color: var(--accent-color); margin: 36px 0 14px; }
    .post-entry p { margin-bottom: 16px; line-height: 1.7; }
    .post-entry ul { padding-left: 20px; margin-bottom: 20px; }
    .post-entry ul li { margin-bottom: 8px; line-height: 1.7; }
</style>
@endpush

@section('content')

    @include('partials.page-header', ['pageTitle' => 'Privacy Policy', 'breadcrumb' => 'privacy policy'])

    <div class="page-single-post">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="post-entry">

                        <p><em>Last updated: September 2026</em></p>

                        <p>{{ $generalSettings->company_name }} ("we," "us," or "our") provides appliance repair services in the Chicago, IL area and operates this website. This page explains what information we collect when you visit our site or book a service, how we use it, and how to reach us with questions.</p>

                        <h2>Information We Collect</h2>
                        <p>When you fill out our booking form, we collect what you provide: your name, phone number, ZIP code, the appliance brand and service you need, your preferred date, and any message you leave us. We use this to schedule and complete your repair — nothing more.</p>
                        <p>If you call or email us directly, we collect whatever information you choose to share during that conversation.</p>

                        <h2>Cookies and Analytics</h2>
                        <p>Like most websites, we use cookies through Google Analytics and Google Tag Manager to understand how visitors use our site — for example, which pages get viewed and whether someone clicked our phone number or submitted a booking request. This helps us understand what's working and improve our site and advertising. These tools don't collect your name, phone number, or anything else you type into our forms.</p>
                        <p>You can turn off cookies in your browser settings at any time. Doing so may affect how some parts of the site behave, but it won't stop you from booking a service.</p>

                        <h2>How We Use Your Information</h2>
                        <ul>
                            <li>To schedule, confirm, and complete the repair you requested</li>
                            <li>To contact you about your service request by phone, text, or email</li>
                            <li>To understand how people use our website and improve it</li>
                            <li>To meet legal or accounting requirements, when they apply</li>
                        </ul>

                        <h2>Phone Calls and Text Messages</h2>
                        <p>By submitting our booking form, you agree that we may contact you by phone or text message about your service request, including to confirm your appointment. Message and data rates may apply. You can ask us to stop texting you at any time.</p>

                        <h2>Sharing Your Information</h2>
                        <p>We do not sell your personal information. We share it only with the technicians and staff who need it to complete your repair, and with the service providers that help us run our business (for example, scheduling or email tools) — and only for that purpose.</p>

                        <h2>Data Retention</h2>
                        <p>We keep booking and contact information for as long as reasonably necessary for scheduling, customer service, and our business records, and remove it when it's no longer needed.</p>

                        <h2>Your Choices</h2>
                        <p>You can ask what information we have about you, ask us to correct it, or ask us to delete it, by emailing
                            <a href="mailto:{{ $generalSettings->email }}">{{ $generalSettings->email }}</a> or calling
                            <a href="tel:{{ preg_replace('/[^\d+]/', '', $generalSettings->phone_primary) }}">{{ $generalSettings->phone_primary }}</a>.
                        </p>

                        <h2>Children's Privacy</h2>
                        <p>Our site and services are intended for adults arranging appliance repairs. We don't knowingly collect information from children under 13.</p>

                        <h2>Third-Party Links</h2>
                        <p>Our site may link to third-party services such as Google Maps or our social media pages. Those sites have their own privacy policies, and we aren't responsible for how they handle your information.</p>

                        <h2>Changes to This Policy</h2>
                        <p>We may update this policy from time to time. Any changes will be posted on this page with a new "last updated" date.</p>

                        <h2>Contact Us</h2>
                        <p>Questions about this policy or how we handle your information? Reach out:</p>
                        <ul>
                            <li>Email: <a href="mailto:{{ $generalSettings->email }}">{{ $generalSettings->email }}</a></li>
                            <li>Phone: <a href="tel:{{ preg_replace('/[^\d+]/', '', $generalSettings->phone_primary) }}">{{ $generalSettings->phone_primary }}</a></li>
                            @if($generalSettings->address)
                            <li>Address: {{ $generalSettings->address }}</li>
                            @endif
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
