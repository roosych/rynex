@php
    $tabs = [
        'general'  => ['label' => 'General', 'icon' => 'fa-gear'],
        'hero'     => ['label' => 'Hero',    'icon' => 'fa-image'],
        'about'    => ['label' => 'About',   'icon' => 'fa-circle-info'],
        'process'  => ['label' => 'Sections','icon' => 'fa-layer-group'],
        'benefits' => ['label' => 'Benefits','icon' => 'fa-list-check'],
        'seo'      => ['label' => 'SEO',     'icon' => 'fa-magnifying-glass'],
    ];
@endphp

<div style="display:flex;gap:6px;flex-wrap:wrap;margin-bottom:24px;">
    @foreach ($tabs as $key => $tab)
    <a href="{{ route('admin.settings.edit', $key) }}"
       class="admin-btn admin-btn-sm {{ $active === $key ? 'admin-btn-primary' : 'admin-btn-secondary' }}">
        <i class="fa-solid {{ $tab['icon'] }}"></i> {{ $tab['label'] }}
    </a>
    @endforeach
</div>
