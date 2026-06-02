@extends('layouts.admin')
@section('title', 'SEO Settings')
@section('page_title', 'Settings — SEO')

@section('content')
@include('admin.settings._tabs', ['active' => 'seo'])

@php
$pages = [
    'home'     => ['label' => 'Home Page',        'url' => route('home')],
    'about'    => ['label' => 'About Us',          'url' => route('about')],
    'services' => ['label' => 'Services Index',    'url' => route('services.index')],
    'blog'     => ['label' => 'Blog Index',        'url' => route('blog.index')],
    'booking'  => ['label' => 'Booking Page',      'url' => route('booking')],
];
@endphp

<form method="POST" action="{{ route('admin.settings.update', 'seo') }}" enctype="multipart/form-data">
    @csrf

    <div style="margin-bottom:20px;padding:14px 18px;background:#f0f9ff;border:1px solid #bae6fd;border-radius:10px;font-size:0.85rem;color:#0369a1;">
        <i class="fa-solid fa-circle-info" style="margin-right:6px;"></i>
        <strong>Title format:</strong> Keyword | City | Brand &nbsp;·&nbsp;
        <strong>Description:</strong> 120–160 символов — конкретно, с ключевым словом и CTA
    </div>

    <div class="admin-card" style="margin-bottom:20px;">
        <div class="admin-card-header"><h2 style="margin:0;">Default Social Share Image (Open Graph)</h2></div>
        <div class="admin-card-body">
            <label class="admin-form-label">Default OG image
                <span style="color:#888;font-weight:400;">— показывается при шеринге страниц без своей картинки</span>
            </label>
            @if($settings->default_og_image)
                <div style="margin-bottom:10px;">
                    <img src="{{ $settings->default_og_image }}" style="max-width:320px;width:100%;border-radius:8px;border:1px solid #e5e7eb;" alt="Current OG image">
                </div>
            @endif
            <input type="file" name="default_og_image_file" class="form-control" accept="image/*">
            <div class="admin-form-hint">Рекомендуемый размер <strong>1200×630</strong> px (JPG/PNG). Логотип/текст держи ближе к центру.</div>
        </div>
    </div>

    @foreach($pages as $key => $page)
    @php
        $titleKey = $key . '_title';
        $descKey  = $key . '_description';
        $titleVal = old($titleKey, $settings->$titleKey);
        $descVal  = old($descKey,  $settings->$descKey);
        $titleLen = mb_strlen($titleVal);
        $descLen  = mb_strlen($descVal);
    @endphp
    <div class="admin-card" style="margin-bottom:20px;">
        <div class="admin-card-header" style="display:flex;align-items:center;justify-content:space-between;">
            <h2 style="margin:0;">{{ $page['label'] }}</h2>
            <a href="{{ $page['url'] }}" target="_blank" class="admin-btn admin-btn-secondary admin-btn-sm">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> View
            </a>
        </div>
        <div class="admin-card-body">
            <div class="mb-4">
                <div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:6px;">
                    <label class="admin-form-label" style="margin:0;">Meta Title</label>
                    <span class="seo-counter {{ $titleLen > 60 ? 'over' : ($titleLen >= 50 ? 'good' : 'low') }}"
                          id="cnt-title-{{ $key }}">{{ $titleLen }} / 60</span>
                </div>
                <input type="text" name="{{ $titleKey }}"
                       class="form-control seo-title-input" data-counter="cnt-title-{{ $key }}"
                       value="{{ $titleVal }}" maxlength="100">
                <div class="admin-form-hint">Оптимально 50–60 символов</div>
            </div>
            <div class="mb-2">
                <div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:6px;">
                    <label class="admin-form-label" style="margin:0;">Meta Description</label>
                    <span class="seo-counter {{ $descLen > 160 ? 'over' : ($descLen >= 120 ? 'good' : 'low') }}"
                          id="cnt-desc-{{ $key }}">{{ $descLen }} / 160</span>
                </div>
                <textarea name="{{ $descKey }}" rows="2"
                          class="form-control seo-desc-input" data-counter="cnt-desc-{{ $key }}"
                          maxlength="320">{{ $descVal }}</textarea>
                <div class="admin-form-hint">Оптимально 120–160 символов</div>
            </div>

            {{-- SERP Preview --}}
            <div class="serp-preview" id="serp-{{ $key }}">
                <div class="serp-title" id="serp-title-{{ $key }}">{{ $titleVal ?: 'Page Title' }}</div>
                <div class="serp-url">{{ $page['url'] }}</div>
                <div class="serp-desc" id="serp-desc-{{ $key }}">{{ $descVal ?: 'Meta description will appear here...' }}</div>
            </div>
        </div>
    </div>
    @endforeach

    <button type="submit" class="admin-btn admin-btn-primary">
        <i class="fa-solid fa-floppy-disk"></i> Save SEO Settings
    </button>
</form>

<style>
.seo-counter { font-size:0.78rem; font-weight:600; padding:2px 8px; border-radius:20px; }
.seo-counter.good { background:#d1fae5; color:#065f46; }
.seo-counter.low  { background:#fef3c7; color:#92400e; }
.seo-counter.over { background:#fee2e2; color:#991b1b; }

.serp-preview {
    margin-top:16px;
    padding:14px 16px;
    background:#fff;
    border:1px solid #e5e7eb;
    border-radius:10px;
    font-family: Arial, sans-serif;
}
.serp-title {
    font-size:1rem;
    color:#1a0dab;
    font-weight:400;
    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
    margin-bottom:2px;
}
.serp-url {
    font-size:0.78rem;
    color:#006621;
    margin-bottom:4px;
    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
}
.serp-desc {
    font-size:0.82rem;
    color:#545454;
    line-height:1.5;
    display:-webkit-box;
    -webkit-line-clamp:2;
    -webkit-box-orient:vertical;
    overflow:hidden;
}
</style>

<script>
document.querySelectorAll('.seo-title-input, .seo-desc-input').forEach(input => {
    const isTitle  = input.classList.contains('seo-title-input');
    const limit    = isTitle ? 60 : 160;
    const counter  = document.getElementById(input.dataset.counter);
    const key      = input.dataset.counter.replace('cnt-title-', '').replace('cnt-desc-', '');
    const serpEl   = document.getElementById(isTitle ? `serp-title-${key}` : `serp-desc-${key}`);

    const update = () => {
        const len = input.value.length;
        counter.textContent = `${len} / ${limit}`;
        counter.className = 'seo-counter ' + (len > limit ? 'over' : len >= (isTitle ? 50 : 120) ? 'good' : 'low');
        if (serpEl) serpEl.textContent = input.value || (isTitle ? 'Page Title' : 'Meta description will appear here...');
    };

    input.addEventListener('input', update);
});
</script>

@endsection
