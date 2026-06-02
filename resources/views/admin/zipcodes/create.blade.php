@extends('layouts.admin')
@section('title', 'Add ZIP Code')
@section('page_title', 'Add ZIP Code')

@section('content')

<div style="margin-bottom:16px;">
    <a href="{{ route('admin.zipcodes.index') }}" class="admin-btn admin-btn-secondary admin-btn-sm">
        <i class="fa-solid fa-arrow-left"></i> Back to ZIP Codes
    </a>
</div>

<form method="POST" action="{{ route('admin.zipcodes.store') }}">
    @csrf
    <div class="admin-card" style="max-width:500px;">
        <div class="admin-card-header"><h2>New ZIP Code</h2></div>
        <div class="admin-card-body">

            <div class="mb-4">
                <label class="admin-form-label" for="code">ZIP Code <span style="color:#e63946;">*</span></label>
                <input type="text" id="code" name="code"
                       class="form-control @error('code') is-invalid @enderror"
                       value="{{ old('code') }}" maxlength="10" placeholder="e.g. 60601" required>
                @error('code')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label class="admin-form-label" for="neighborhood">Neighborhood / Area</label>
                <input type="text" id="neighborhood" name="neighborhood"
                       class="form-control @error('neighborhood') is-invalid @enderror"
                       value="{{ old('neighborhood') }}" maxlength="100" placeholder="e.g. Lincoln Park">
                @error('neighborhood')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label class="admin-form-label" for="sort_order">Sort Order</label>
                <input type="number" id="sort_order" name="sort_order"
                       class="form-control" value="{{ old('sort_order', 0) }}" min="0">
            </div>

            <div class="mb-4">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active"
                           value="1" {{ old('is_active', '1') ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Active (visible in booking form)</label>
                </div>
            </div>

            <button type="submit" class="admin-btn admin-btn-primary">
                <i class="fa-solid fa-plus"></i> Add ZIP Code
            </button>
        </div>
    </div>
</form>

@endsection
