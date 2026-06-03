@extends('layouts.admin')

@section('title', 'Brands')
@section('page_title', 'Brands')

@section('content')

<div class="admin-card">
    <div class="admin-card-header">
        <h2><i class="fa-solid fa-copyright" style="margin-right:8px;color:var(--accent-color);"></i>All Brands</h2>
        <a href="{{ route('admin.brands.create') }}" class="admin-btn admin-btn-primary">
            <i class="fa-solid fa-plus"></i> Add Brand
        </a>
    </div>
    <div class="admin-card-body" style="padding:0;">
        @if ($brands->isEmpty())
            <div style="padding:28px 24px;text-align:center;color:#9ca3af;">No brands found.</div>
        @else
        <table class="admin-table">
            <thead>
                <tr>
                    <th style="width:80px;">Logo</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                <tr>
                    <td>
                        @if ($brand->logo_url)
                            <img src="{{ $brand->logo_url }}" alt="{{ $brand->name }}"
                                 style="height:40px;max-width:64px;object-fit:contain;">
                        @else
                            <span style="color:#d1d5db;"><i class="fa-regular fa-image"></i></span>
                        @endif
                    </td>
                    <td><strong>{{ $brand->name }}</strong></td>
                    <td>
                        <label class="brand-switch" title="Toggle active">
                            <input type="checkbox" class="brand-toggle" data-id="{{ $brand->id }}"
                                   {{ $brand->is_active ? 'checked' : '' }}>
                            <span class="brand-switch-slider"></span>
                        </label>
                        <span class="brand-switch-label">{{ $brand->is_active ? 'Active' : 'Inactive' }}</span>
                    </td>
                    <td style="text-align:right;">
                        <a href="{{ route('admin.brands.edit', $brand) }}"
                           class="admin-btn admin-btn-secondary admin-btn-sm">
                            <i class="fa-solid fa-pencil"></i> Edit
                        </a>
                        <form method="POST" action="{{ route('admin.brands.destroy', $brand) }}"
                              style="display:inline;" onsubmit="return confirm('Delete this brand?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="admin-btn admin-btn-danger admin-btn-sm">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>

@push('styles')
<style>
.brand-switch { position: relative; display: inline-block; width: 42px; height: 24px; vertical-align: middle; }
.brand-switch input { opacity: 0; width: 0; height: 0; }
.brand-switch-slider {
    position: absolute; cursor: pointer; inset: 0;
    background: #cbd5e1; border-radius: 24px; transition: background 0.2s;
}
.brand-switch-slider::before {
    content: ""; position: absolute; height: 18px; width: 18px; left: 3px; bottom: 3px;
    background: #fff; border-radius: 50%; transition: transform 0.2s;
}
.brand-switch input:checked + .brand-switch-slider { background: #10b981; }
.brand-switch input:checked + .brand-switch-slider::before { transform: translateX(18px); }
.brand-switch input:disabled + .brand-switch-slider { opacity: 0.5; cursor: default; }
.brand-switch-label { margin-left: 10px; font-size: 0.82rem; color: #6b7280; }
</style>
@endpush

@push('scripts')
<script>
document.querySelectorAll('.brand-toggle').forEach(function (input) {
    input.addEventListener('change', function () {
        var label = input.closest('td').querySelector('.brand-switch-label');
        input.disabled = true;
        fetch('{{ url('admin/brands') }}/' + input.dataset.id + '/toggle', {
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(function (res) {
            if (!res.ok) throw new Error('Request failed');
            return res.json();
        })
        .then(function (data) {
            input.checked = data.is_active;
            if (label) label.textContent = data.is_active ? 'Active' : 'Inactive';
        })
        .catch(function () {
            input.checked = !input.checked; // revert on error
            alert('Could not update brand status. Please try again.');
        })
        .finally(function () {
            input.disabled = false;
        });
    });
});
</script>
@endpush

@endsection
