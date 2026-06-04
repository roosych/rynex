@extends('layouts.app')

@section('title', $post->meta_title ?: (($post['title'] ?? 'Blog Post') . ' | Swift Fix Blog'))
@section('meta_description', $post['meta_description'] ?? 'Appliance repair tips and advice from Swift Fix technicians.')
@section('og_title', $post->meta_title ?: ($post['title'] ?? 'Swift Fix Blog'))
@section('og_description', $post['meta_description'] ?? 'Appliance repair tips and advice from Swift Fix technicians.')
@section('og_type', 'article')
@php $postImage = $post->og_image_url ?: null; @endphp
@if($postImage)
@section('og_image', $postImage)
@section('og_image_alt', $post['title'] ?? '')
@endif

@push('schema')
@php
$articleSchema = \Spatie\SchemaOrg\Schema::blogPosting()
    ->headline($post['title'] ?? '')
    ->description($post['meta_description'] ?? '')
    ->url(route('blog.show', $post->slug))
    ->datePublished($post->published_at)
    ->dateModified($post->updated_at)
    ->author(
        \Spatie\SchemaOrg\Schema::organization()
            ->name($generalSettings->company_name ?? 'Swift Fix Appliance Repair')
            ->url(url('/'))
    )
    ->publisher(
        \Spatie\SchemaOrg\Schema::organization()
            ->name($generalSettings->company_name ?? 'Swift Fix Appliance Repair')
            ->url(url('/'))
    );
if ($postImage) {
    $articleSchema->image($postImage);
}
@endphp
{!! $articleSchema->toScript() !!}
@endpush

@push('styles')
<style>
    .page-single-post { padding: 70px 0 60px; }
    .related-posts { padding: 60px 0 80px; background: var(--secondary-color, #f7f0f2); }
    .post-single-meta ol.breadcrumb { background: transparent; padding: 0; margin: 0; gap: 24px; }
    .post-single-meta ol.breadcrumb li { color: rgba(255,255,255,0.75); font-size: 0.9rem; display: flex; align-items: center; gap: 6px; list-style: none; padding: 0; }
    .post-single-meta ol.breadcrumb li::before { display: none; }
    .post-entry h2 { font-size: 1.5rem; font-weight: 700; color: var(--accent-color); margin: 36px 0 16px; }
    .post-entry ul { padding-left: 20px; margin-bottom: 24px; }
    .post-entry ul li { color: var(--text-color); margin-bottom: 10px; line-height: 1.7; }
    .post-item-meta { display: flex; align-items: center; gap: 14px; margin-bottom: 12px; font-size: 0.84rem; }
    .post-item-meta .post-category { background: var(--accent-color); color: var(--white-color); padding: 3px 11px; border-radius: 4px; font-size: 0.76rem; font-weight: 700; text-transform: uppercase; }
</style>
@endpush

@section('content')

    <div class="page-header bg-section dark-section mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque">{{ $post['title'] ?? 'Blog Post' }}</h1>
                        <div class="post-single-meta wow fadeInUp">
                            <ol class="breadcrumb">
                                <li><i class="fa-regular fa-clock"></i> {{ $post['date'] ?? '' }}</li>
                                <li><i class="fa-regular fa-folder"></i> {{ $post['category'] ?? '' }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-single-post">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="post-featured-image" style="margin-bottom:40px;">
                        <figure class="image-anime reveal">
                            <img src="{{ $post->image_url ?: '/template/images/template/careref.jpg' }}" alt="{{ $post['title'] ?? '' }}">
                        </figure>
                    </div>
                    <div class="post-entry">
                        {!! $post['content'] ?? '<p>Article content coming soon.</p>' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (!empty($relatedPosts))
    <div class="related-posts">
        <div class="container">
            <div class="section-title" style="margin-bottom:40px;">
                <h2 class="wow fadeInUp">Related Articles</h2>
            </div>
            <div class="row">
                @foreach ($relatedPosts as $related)
                <div class="col-lg-4 col-md-6">
                    <div class="post-item wow fadeInUp">
                        <div class="post-featured-image">
                            <a href="{{ route('blog.show', $related['slug']) }}" data-cursor-text="View">
                                <figure class="image-anime"><img src="{{ $related->image_url ?: '/template/images/template/careref.jpg' }}" alt="{{ $related['title'] }}"></figure>
                            </a>
                        </div>
                        <div class="post-item-body">
                            <div class="post-item-content">
                                <div class="post-item-meta">
                                    <span class="post-category">{{ $related['category'] }}</span>
                                    <span class="post-date"><i class="fa-regular fa-calendar"></i> {{ $related['date'] }}</span>
                                </div>
                                <h2><a href="{{ route('blog.show', $related['slug']) }}">{{ $related['title'] }}</a></h2>
                            </div>
                            <div class="post-item-btn">
                                <a href="{{ route('blog.show', $related['slug']) }}" class="readmore-btn">read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    @include('partials.ticker')

@endsection
