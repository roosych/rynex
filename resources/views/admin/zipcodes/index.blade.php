@extends('layouts.admin')
@section('title', 'ZIP Codes')
@section('page_title', 'ZIP Codes — Chicago Area')

@section('content')

<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;gap:12px;flex-wrap:wrap;">
    <div>
        <span style="color:#6b7280;font-size:0.9rem;">{{ $zipCodes->total() }} zip codes total</span>
    </div>
    <a href="{{ route('admin.zipcodes.create') }}" class="admin-btn admin-btn-primary">
        <i class="fa-solid fa-plus"></i> Add ZIP Code
    </a>
</div>

@if(session('success'))
    <div class="admin-alert admin-alert-success" style="margin-bottom:16px;">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ route('admin.zipcodes.bulk-toggle') }}" id="bulkForm">
    @csrf
    <div class="admin-card">
        <div class="admin-card-header" style="display:flex;align-items:center;justify-content:space-between;gap:12px;flex-wrap:wrap;">
            <h2 style="margin:0;">ZIP Codes</h2>
            <div style="display:flex;gap:8px;">
                <button type="submit" name="active" value="1" class="admin-btn admin-btn-secondary admin-btn-sm">
                    <i class="fa-solid fa-eye"></i> Enable Selected
                </button>
                <button type="submit" name="active" value="0" class="admin-btn admin-btn-secondary admin-btn-sm" style="color:#dc3545;">
                    <i class="fa-solid fa-eye-slash"></i> Disable Selected
                </button>
            </div>
        </div>
        <div class="admin-card-body" style="padding:0;">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width:40px;">
                            <input type="checkbox" id="checkAll" style="cursor:pointer;">
                        </th>
                        <th>ZIP Code</th>
                        <th>Neighborhood / Area</th>
                        <th style="width:80px;text-align:center;">Order</th>
                        <th style="width:90px;text-align:center;">Status</th>
                        <th style="width:100px;text-align:center;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($zipCodes as $zip)
                    <tr>
                        <td>
                            <input type="checkbox" name="ids[]" value="{{ $zip->id }}" class="zip-check" style="cursor:pointer;">
                        </td>
                        <td><strong>{{ $zip->code }}</strong></td>
                        <td style="color:#6b7280;">{{ $zip->neighborhood ?: '—' }}</td>
                        <td style="text-align:center;color:#9ca3af;">{{ $zip->sort_order }}</td>
                        <td style="text-align:center;">
                            @if($zip->is_active)
                                <span class="admin-badge admin-badge-success">Active</span>
                            @else
                                <span class="admin-badge admin-badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td style="text-align:center;">
                            <a href="{{ route('admin.zipcodes.edit', $zip) }}" class="admin-btn admin-btn-secondary admin-btn-sm">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" style="text-align:center;color:#9ca3af;padding:32px;">No ZIP codes yet. <a href="{{ route('admin.zipcodes.create') }}">Add one</a></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</form>

{{ $zipCodes->links('vendor.pagination.admin') }}

<script>
document.getElementById('checkAll').addEventListener('change', function () {
    document.querySelectorAll('.zip-check').forEach(cb => cb.checked = this.checked);
});
</script>

@endsection
