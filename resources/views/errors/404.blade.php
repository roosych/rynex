@extends('layouts.app')

@section('title', 'Page Not Found | ' . $generalSettings->company_name)

@section('content')

    @include('partials.page-header', ['pageTitle' => 'Page not found', 'breadcrumb' => '404 error page'])

    <div class="error-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="error-page-image wow fadeInUp">
                        <img src="/template/images/404-error-img.png" alt="404 error">
                    </div>
                    <div class="error-page-content">
                        <div class="section-title">
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Oops! page not found</h2>
                        </div>
                        <div class="error-page-content-body">
                            <p class="wow fadeInUp" data-wow-delay="0.25s">The page you are looking for does not exist</p>
                            <a class="btn-default wow fadeInUp" data-wow-delay="0.5s" href="{{ route('home') }}"><span>back to home</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
