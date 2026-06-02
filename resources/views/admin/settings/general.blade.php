@extends('layouts.admin')
@section('title', 'General Settings')
@section('page_title', 'Settings — General')

@section('content')
@include('admin.settings._tabs', ['active' => 'general'])

<form method="POST" action="{{ route('admin.settings.update', 'general') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <div class="admin-card">
                <div class="admin-card-header"><h2>Company Info</h2></div>
                <div class="admin-card-body">
                    @foreach ([
                        ['company_name', 'Company Name'],
                        ['tagline',      'Tagline'],
                        ['email',        'Public Email Address'],
                        ['address',      'Address'],
                    ] as [$key, $label])
                    <div class="mb-4">
                        <label class="admin-form-label">{{ $label }}</label>
                        <input type="text" name="{{ $key }}" class="form-control"
                               value="{{ old($key, $settings->$key) }}">
                    </div>
                    @endforeach

                    <div class="mb-4">
                        <label class="admin-form-label">
                            Booking Notification Emails
                            <span style="font-weight:400;color:#6b7280;font-size:0.8rem;margin-left:6px;">— получатели уведомлений о заказах</span>
                        </label>
                        <textarea name="booking_notify_emails" class="form-control" rows="3"
                                  placeholder="email1@example.com, email2@example.com">{{ old('booking_notify_emails', $settings->booking_notify_emails) }}</textarea>
                        <div class="admin-form-hint">Несколько адресов — через запятую</div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-4">
                                <label class="admin-form-label">Latitude</label>
                                <input type="text" name="latitude" class="form-control"
                                       value="{{ old('latitude', $settings->latitude) }}"
                                       placeholder="e.g. 41.8827">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-4">
                                <label class="admin-form-label">Longitude</label>
                                <input type="text" name="longitude" class="form-control"
                                       value="{{ old('longitude', $settings->longitude) }}"
                                       placeholder="e.g. -87.6233">
                            </div>
                        </div>
                    </div>
                    <div class="admin-form-hint" style="margin-top:-12px;margin-bottom:16px;">
                        <a href="https://maps.google.com" target="_blank" rel="noopener">maps.google.com</a>
                        — правый клик по точке → «Что здесь?» — скопируй координаты
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="admin-card">
                <div class="admin-card-header"><h2>Contact & Hours</h2></div>
                <div class="admin-card-body">
                    @foreach ([
                        ['phone_primary',   'Primary Phone'],
                        ['phone_secondary', 'Secondary Phone'],
                        ['hours_weekday',   'Weekday Hours'],
                        ['hours_saturday',  'Saturday Hours'],
                    ] as [$key, $label])
                    <div class="mb-4">
                        <label class="admin-form-label">{{ $label }}</label>
                        <input type="text" name="{{ $key }}" class="form-control"
                               value="{{ old($key, $settings->$key) }}">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="admin-card">
                <div class="admin-card-header"><h2>Social Media</h2></div>
                <div class="admin-card-body">
                    @foreach ([
                        ['social_facebook',  'Facebook URL'],
                        ['social_instagram', 'Instagram URL'],
                        ['social_yelp',      'Yelp URL'],
                    ] as [$key, $label])
                    <div class="mb-4">
                        <label class="admin-form-label">{{ $label }}</label>
                        <input type="text" name="{{ $key }}" class="form-control"
                               value="{{ old($key, $settings->$key) }}">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="admin-card">
                <div class="admin-card-header"><h2>Footer & Map</h2></div>
                <div class="admin-card-body">
                    <div class="mb-4">
                        <label class="admin-form-label">Footer About Text</label>
                        <textarea name="footer_about" class="form-control" rows="3">{{ old('footer_about', $settings->footer_about) }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label class="admin-form-label">Google Maps Embed URL</label>
                        <input type="text" name="map_embed_url" class="form-control"
                               value="{{ old('map_embed_url', $settings->map_embed_url) }}">
                        <div class="admin-form-hint">Paste the src="" value from the Google Maps embed iframe</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="col-lg-12">
            <div class="admin-card">
                <div class="admin-card-header"><h2>Logo & Favicon</h2></div>
                <div class="admin-card-body">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="admin-form-label">Main Logo <span style="color:#888;font-weight:400;">(header — on light background)</span></label>
                            @if($settings->logo)
                                <div style="margin-bottom:10px;padding:10px;background:#f5f5f5;border-radius:8px;display:inline-block;">
                                    <img src="{{ $settings->logo }}" style="height:50px;object-fit:contain;" alt="Current logo">
                                </div>
                            @else
                                <div style="margin-bottom:10px;padding:10px;background:#f5f5f5;border-radius:8px;display:inline-block;">
                                    <img src="/template/images/template/logo1.png" style="height:50px;object-fit:contain;" alt="Default logo">
                                </div>
                            @endif
                            <input type="file" name="logo_file" class="form-control" accept="image/*">
                            <div class="admin-form-hint">PNG с прозрачным фоном, рекомендуется ширина 300px+</div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="admin-form-label">White Logo <span style="color:#888;font-weight:400;">(footer — on dark background)</span></label>
                            @if($settings->logo_white)
                                <div style="margin-bottom:10px;padding:10px;background:#222;border-radius:8px;display:inline-block;">
                                    <img src="{{ $settings->logo_white }}" style="height:50px;object-fit:contain;" alt="Current white logo">
                                </div>
                            @else
                                <div style="margin-bottom:10px;padding:10px;background:#222;border-radius:8px;display:inline-block;">
                                    <img src="/template/images/template/logo1white.png" style="height:50px;object-fit:contain;" alt="Default white logo">
                                </div>
                            @endif
                            <input type="file" name="logo_white_file" class="form-control" accept="image/*">
                            <div class="admin-form-hint">PNG белый/светлый логотип для тёмного фона</div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="admin-form-label">Favicon <span style="color:#888;font-weight:400;">(иконка вкладки браузера)</span></label>
                            @if($settings->favicon)
                                <div style="margin-bottom:10px;padding:10px;background:#f5f5f5;border-radius:8px;display:inline-block;">
                                    <img src="{{ $settings->favicon }}" style="height:32px;width:32px;object-fit:contain;" alt="Current favicon">
                                </div>
                            @else
                                <div style="margin-bottom:10px;padding:10px;background:#f5f5f5;border-radius:8px;display:inline-block;">
                                    <img src="/template/images/template/favicon.png" style="height:32px;width:32px;object-fit:contain;" alt="Default favicon">
                                </div>
                            @endif
                            <input type="file" name="favicon_file" class="form-control" accept="image/png,image/x-icon,image/svg+xml,image/*">
                            <div class="admin-form-hint">PNG/ICO/SVG, квадратное изображение (32×32 или 512×512)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <button type="submit" class="admin-btn admin-btn-primary">
        <i class="fa-solid fa-floppy-disk"></i> Save General Settings
    </button>
</form>
@endsection
