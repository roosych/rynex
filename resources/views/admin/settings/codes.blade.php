@extends('layouts.admin')
@section('title', 'Codes Settings')
@section('page_title', 'Settings — Codes')

@section('content')
@include('admin.settings._tabs', ['active' => 'codes'])

<div style="margin-bottom:20px;padding:14px 18px;background:#f0f9ff;border:1px solid #bae6fd;border-radius:10px;font-size:0.85rem;color:#0369a1;">
    <i class="fa-solid fa-circle-info" style="margin-right:6px;"></i>
    Google Analytics и Google Tag Manager подключаются автоматически по ID — просто вставь ID ниже.
    Произвольный код (пиксели, виджеты чата и т.д.) можно добавить в поля Head/Body/Footer.
</div>

<form method="POST" action="{{ route('admin.settings.update', 'codes') }}">
    @csrf

    <div class="admin-card" style="margin-bottom:20px;">
        <div class="admin-card-header"><h2 style="margin:0;">Google Analytics & Tag Manager</h2></div>
        <div class="admin-card-body">
            <div class="mb-4">
                <label class="admin-form-label">Google Analytics Measurement ID</label>
                <input type="text" name="google_analytics_id" class="form-control"
                       value="{{ old('google_analytics_id', $settings->google_analytics_id) }}"
                       placeholder="G-XXXXXXXXXX">
                <div class="admin-form-hint">Настройки → Сбор данных → Потоки данных в Google Analytics</div>
            </div>
            <div class="mb-2">
                <label class="admin-form-label">Google Tag Manager Container ID</label>
                <input type="text" name="google_tag_manager_id" class="form-control"
                       value="{{ old('google_tag_manager_id', $settings->google_tag_manager_id) }}"
                       placeholder="GTM-XXXXXXX">
                <div class="admin-form-hint">Код GTM (скрипт в &lt;head&gt; и noscript в &lt;body&gt;) подставится автоматически</div>
            </div>
        </div>
    </div>

    <div class="admin-card" style="margin-bottom:20px;">
        <div class="admin-card-header"><h2 style="margin:0;">Custom Head Code</h2></div>
        <div class="admin-card-body">
            <label class="admin-form-label">
                Код перед &lt;/head&gt;
                <span style="color:#888;font-weight:400;">— мета-теги подтверждения, сторонние пиксели и т.д.</span>
            </label>
            <textarea name="head_code" class="form-control" rows="6" style="font-family:monospace;font-size:0.85rem;"
                      placeholder="<meta name=&quot;facebook-domain-verification&quot; content=&quot;...&quot;>">{{ old('head_code', $settings->head_code) }}</textarea>
        </div>
    </div>

    <div class="admin-card" style="margin-bottom:20px;">
        <div class="admin-card-header"><h2 style="margin:0;">Custom Body Code</h2></div>
        <div class="admin-card-body">
            <label class="admin-form-label">
                Код сразу после &lt;body&gt;
                <span style="color:#888;font-weight:400;">— noscript-теги, разметка чат-виджетов</span>
            </label>
            <textarea name="body_code" class="form-control" rows="6" style="font-family:monospace;font-size:0.85rem;">{{ old('body_code', $settings->body_code) }}</textarea>
        </div>
    </div>

    <div class="admin-card" style="margin-bottom:20px;">
        <div class="admin-card-header"><h2 style="margin:0;">Custom Footer Code</h2></div>
        <div class="admin-card-body">
            <label class="admin-form-label">
                Код перед &lt;/body&gt;
                <span style="color:#888;font-weight:400;">— скрипты, которые должны загружаться последними (чаты, доп. трекеры)</span>
            </label>
            <textarea name="footer_code" class="form-control" rows="6" style="font-family:monospace;font-size:0.85rem;">{{ old('footer_code', $settings->footer_code) }}</textarea>
        </div>
    </div>

    <button type="submit" class="admin-btn admin-btn-primary">
        <i class="fa-solid fa-floppy-disk"></i> Save Codes Settings
    </button>
</form>
@endsection
