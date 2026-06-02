{{--
  Reusable SEO preview card.
  Expects $metaTitleField and $metaDescField to be JS field IDs,
  and $serpUrl to be the canonical URL string shown in the preview.
--}}
@php
$metaTitleVal = old($metaTitleField ?? 'meta_title', $model->meta_title ?? '');
$metaDescVal  = old($metaDescField  ?? 'meta_description', $model->meta_description ?? '');
$titleLimit   = 60;
$descLimit    = 160;
@endphp

<div class="admin-card" id="seo-preview-card" style="margin-top:24px;">
    <div class="admin-card-header"><h2>SEO Preview</h2></div>
    <div class="admin-card-body">

        {{-- Meta Title --}}
        <div class="mb-1" style="display:flex;justify-content:space-between;align-items:center;">
            <span style="font-size:0.8rem;color:#6b7280;">Meta Title</span>
            <span id="seo_title_counter" class="seo-counter" data-min="50" data-max="{{ $titleLimit }}">
                {{ mb_strlen($metaTitleVal) }}/{{ $titleLimit }}
            </span>
        </div>

        {{-- Meta Description --}}
        <div class="mb-3" style="display:flex;justify-content:space-between;align-items:center;">
            <span style="font-size:0.8rem;color:#6b7280;">Meta Description</span>
            <span id="seo_desc_counter" class="seo-counter" data-min="120" data-max="{{ $descLimit }}">
                {{ mb_strlen($metaDescVal) }}/{{ $descLimit }}
            </span>
        </div>

        {{-- SERP Preview --}}
        <div class="serp-preview-box">
            <div class="serp-title" id="serp_title_preview">{{ $metaTitleVal ?: $serpFallbackTitle ?? '' }}</div>
            <div class="serp-url">{{ $serpUrl ?? url('/') }}</div>
            <div class="serp-desc" id="serp_desc_preview">{{ $metaDescVal ?: $serpFallbackDesc ?? '' }}</div>
        </div>

    </div>
</div>

@once
@push('styles')
<style>
.seo-counter { font-size:0.78rem; font-weight:600; padding:2px 7px; border-radius:10px; background:#f3f4f6; color:#374151; }
.seo-counter.good  { background:#d1fae5; color:#065f46; }
.seo-counter.low   { background:#fef3c7; color:#92400e; }
.seo-counter.over  { background:#fee2e2; color:#991b1b; }
.serp-preview-box  { border:1px solid #e5e7eb; border-radius:8px; padding:16px 20px; background:#fff; }
.serp-title { font-size:1.05rem; color:#1a0dab; font-weight:400; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; margin-bottom:2px; }
.serp-url   { font-size:0.78rem; color:#006621; margin-bottom:4px; }
.serp-desc  { font-size:0.84rem; color:#545454; line-height:1.55; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden; }
</style>
@endpush

@push('scripts')
<script>
(function () {
    function updateCounter(el, len) {
        var min = +el.dataset.min, max = +el.dataset.max;
        el.textContent = len + '/' + max;
        el.className = 'seo-counter ' + (len >= min && len <= max ? 'good' : len > max ? 'over' : 'low');
    }

    function bindSeoPreview(titleId, descId, titlePrev, descPrev, fallbackTitle, fallbackDesc) {
        var titleEl = document.getElementById(titleId);
        var descEl  = document.getElementById(descId);
        var titleCounter = document.getElementById('seo_title_counter');
        var descCounter  = document.getElementById('seo_desc_counter');
        var titlePrevEl  = document.getElementById(titlePrev);
        var descPrevEl   = document.getElementById(descPrev);

        if (!titleEl || !descEl) return;

        updateCounter(titleCounter, titleEl.value.length);
        updateCounter(descCounter,  descEl.value.length);

        titleEl.addEventListener('input', function () {
            updateCounter(titleCounter, this.value.length);
            titlePrevEl.textContent = this.value || fallbackTitle;
        });
        descEl.addEventListener('input', function () {
            updateCounter(descCounter, this.value.length);
            descPrevEl.textContent = this.value || fallbackDesc;
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        bindSeoPreview(
            '{{ $metaTitleField ?? "meta_title" }}',
            '{{ $metaDescField  ?? "meta_description" }}',
            'serp_title_preview',
            'serp_desc_preview',
            '{{ addslashes($serpFallbackTitle ?? '') }}',
            '{{ addslashes($serpFallbackDesc  ?? '') }}'
        );
    });
})();
</script>
@endpush
@endonce
