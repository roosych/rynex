@extends('layouts.admin')
@section('title', 'Edit ZIP Code')
@section('page_title', 'Edit ZIP Code — ' . $zipcode->code)

@section('content')

<div style="margin-bottom:16px;">
    <a href="{{ route('admin.zipcodes.index') }}" class="admin-btn admin-btn-secondary admin-btn-sm">
        <i class="fa-solid fa-arrow-left"></i> Back to ZIP Codes
    </a>
</div>

<form method="POST" action="{{ route('admin.zipcodes.update', $zipcode) }}">
    @csrf @method('PUT')
    <div class="admin-card" style="max-width:500px;">
        <div class="admin-card-header"><h2>Edit ZIP Code</h2></div>
        <div class="admin-card-body">

            <div class="mb-4">
                <label class="admin-form-label" for="code">ZIP Code <span style="color:#e63946;">*</span></label>
                <input type="text" id="code" name="code"
                       class="form-control @error('code') is-invalid @enderror"
                       value="{{ old('code', $zipcode->code) }}" maxlength="10" required>
                @error('code')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label class="admin-form-label" for="neighborhood">Neighborhood / Area</label>
                <input type="text" id="neighborhood" name="neighborhood"
                       class="form-control @error('neighborhood') is-invalid @enderror"
                       value="{{ old('neighborhood', $zipcode->neighborhood) }}" maxlength="100">
                @error('neighborhood')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label class="admin-form-label" for="sort_order">Sort Order</label>
                <input type="number" id="sort_order" name="sort_order"
                       class="form-control" value="{{ old('sort_order', $zipcode->sort_order) }}" min="0">
            </div>

            <div class="mb-4">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active"
                           value="1" {{ old('is_active', $zipcode->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Active (visible in booking form)</label>
                </div>
            </div>

            <button type="submit" class="admin-btn admin-btn-primary" style="width:100%;margin-bottom:12px;">
                <i class="fa-solid fa-floppy-disk"></i> Save Changes
            </button>
        </div>
    </div>
</form>

<div class="admin-card" style="max-width:500px;margin-top:16px;border:1px solid #fee2e2;">
    <div class="admin-card-body">
        <form method="POST" action="{{ route('admin.zipcodes.destroy', $zipcode) }}"
              onsubmit="return confirm('Delete ZIP code {{ $zipcode->code }}?')">
            @csrf @method('DELETE')
            <button type="submit" class="admin-btn admin-btn-danger" style="width:100%;">
                <i class="fa-solid fa-trash"></i> Delete ZIP Code
            </button>
        </form>
    </div>
</div>

@endsection
