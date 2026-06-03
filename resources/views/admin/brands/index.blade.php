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
                        <span class="badge-status {{ $brand->is_active ? 'badge-active' : 'badge-inactive' }}">
                            {{ $brand->is_active ? 'Active' : 'Inactive' }}
                        </span>
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

@endsection
