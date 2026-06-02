@extends('layouts.app')

@section('title', $seoSettings->blog_title)
@section('meta_description', $seoSettings->blog_description)
@section('og_title', $seoSettings->blog_title)
@section('og_description', $seoSettings->blog_description)

@push('styles')
<style>
    .page-blog { padding: 80px 0 60px; }
    .post-item-meta { display: flex; align-items: center; gap: 14px; margin-bottom: 12px; font-size: 0.84rem; color: var(--text-color); }
    .post-item-meta .post-category { background: var(--accent-color); color: var(--white-color); padding: 3px 11px; border-radius: 4px; font-size: 0.76rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; }
    .post-item-meta .post-date { display: flex; align-items: center; gap: 5px; }
</style>
@endpush

@section('content')

    @include('partials.page-header', ['pageTitle' => 'Our Blog', 'breadcrumb' => 'blog'])

    <div class="page-blog">
        <div class="container">
            <div class="row">
                @foreach ($posts as $post)
                <div class="col-lg-4 col-md-6">
                    <div class="post-item wow fadeInUp" @if(!$loop->first) data-wow-delay="{{ ($loop->index % 3) * 0.2 }}s" @endif>
                        <div class="post-featured-image">
                            <a href="{{ route('blog.show', $post['slug']) }}" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="{{ $post->image_url ?: '/template/images/template/careref.jpg' }}" alt="{{ $post['title'] }}">
                                </figure>
                            </a>
                        </div>
                        <div class="post-item-body">
                            <div class="post-item-content">
                                <div class="post-item-meta">
                                    <span class="post-category">{{ $post['category'] }}</span>
                                    <span class="post-date"><i class="fa-regular fa-calendar"></i> {{ $post['date'] }}</span>
                                </div>
                                <h2><a href="{{ route('blog.show', $post['slug']) }}">{{ $post['title'] }}</a></h2>
                            </div>
                            <div class="post-item-btn">
                                <a href="{{ route('blog.show', $post['slug']) }}" class="readmore-btn">read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @if($posts->hasPages())
            <div class="row">
                <div class="col-12 d-flex justify-content-center" style="margin-top:40px;">
                    {{ $posts->links() }}
                </div>
            </div>
            @endif

        </div>
    </div>

    @include('partials.ticker')

@endsection
