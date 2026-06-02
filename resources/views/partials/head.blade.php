<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
<meta name="description" content="@yield('meta_description', 'Fast, affordable appliance repair near you. We fix refrigerators, washers, dryers, ovens & more. Certified technicians, same-day service, warranty included.')">
<meta name="keywords" content="@yield('meta_keywords', 'appliance repair, refrigerator repair, washer repair, dryer repair, dishwasher repair, oven repair, HVAC repair, same day appliance repair near me')">
<meta name="author" content="{{ $generalSettings->company_name ?? 'Swift Fix Appliance Repair' }}">
<title>@yield('title', 'Appliance Repair Services | Same Day Service Near You')</title>

@php
    // Resolve the OG/Twitter image: page-supplied (@section('og_image')) → admin default → template fallback.
    $ogImage = trim($__env->yieldContent(
        'og_image',
        ($seoSettings->default_og_image ?? '') ?: asset('template/images/template/technicianatwork.jpg')
    ));
    // Social crawlers require absolute URLs.
    if ($ogImage !== '' && ! \Illuminate\Support\Str::startsWith($ogImage, ['http://', 'https://'])) {
        $ogImage = url($ogImage);
    }
    $ogImageAlt = trim($__env->yieldContent('og_image_alt', $generalSettings->company_name ?? 'Swift Fix Appliance Repair'));
@endphp

{{-- Canonical --}}
<link rel="canonical" href="@yield('canonical', request()->url())">

{{-- Open Graph --}}
<meta property="og:type" content="@yield('og_type', 'website')">
<meta property="og:url" content="@yield('canonical', request()->url())">
<meta property="og:title" content="@yield('og_title', 'Swift Fix Appliance Repair | Dallas, TX')">
<meta property="og:description" content="@yield('og_description', 'Fast, affordable appliance repair near you. Certified technicians, same-day service, warranty included.')">
<meta property="og:image" content="{{ $ogImage }}">
<meta property="og:image:secure_url" content="{{ $ogImage }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="{{ $ogImageAlt }}">
<meta property="og:site_name" content="{{ $generalSettings->company_name ?? 'Swift Fix Appliance Repair' }}">
<meta property="og:locale" content="en_US">

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="@yield('og_title', 'Swift Fix Appliance Repair | Dallas, TX')">
<meta name="twitter:description" content="@yield('og_description', 'Fast, affordable appliance repair near you.')">
<meta name="twitter:image" content="{{ $ogImage }}">
<meta name="twitter:image:alt" content="{{ $ogImageAlt }}">
<link rel="shortcut icon" href="{{ $generalSettings->favicon ?: '/template/images/template/favicon.png' }}">
<link rel="preconnect" href="https://fonts.googleapis.com/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700;900&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
<link href="/template/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="/template/css/slicknav.min.css" rel="stylesheet">
<link rel="stylesheet" href="/template/css/swiper-bundle.min.css">
<link href="/template/css/all.min.css" rel="stylesheet" media="screen">
<link href="/template/css/animate.css" rel="stylesheet">
<link rel="stylesheet" href="/template/css/magnific-popup.css">
<link rel="stylesheet" href="/template/css/mousecursor.css">
<link rel="stylesheet" href="/template/css/twentytwenty.css">
<link href="/template/css/custom.css" rel="stylesheet" media="screen">
@stack('styles')
@stack('schema')
