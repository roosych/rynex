@extends('layouts.admin')

@section('title', 'Edit Brand')
@section('page_title', 'Edit Brand')

@section('content')

<div style="margin-bottom:16px;">
    <a href="{{ route('admin.brands.index') }}" class="admin-btn admin-btn-secondary admin-btn-sm">
        <i class="fa-solid fa-arrow-left"></i> Back to Brands
    </a>
</div>

<form method="POST" action="{{ route('admin.brands.update', $brand) }}" enctype="multipart/form-data">
    @csrf @method('PUT')

    <div class="row">
        <div class="col-lg-8">
            <div class="admin-card">
                <div class="admin-card-header"><h2>Brand Details</h2></div>
                <div class="admin-card-body">

                    <div class="mb-4">
                        <label class="admin-form-label" for="name">Name <span style="color:#e63946;">*</span></label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $brand->name) }}" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Current Logo</label>
                        @php $currentLogo = $brand->getFirstMediaUrl('logo') ?: $brand->image; @endphp
                        @if ($currentLogo)
                            <div style="margin-bottom:10px;">
                                <img src="{{ $currentLogo }}" style="height:60px;max-width:120px;object-fit:contain;" alt="">
                            </div>
                        @endif
                        <label class="admin-form-label" for="image_file">Upload New Logo</label>
                        <input type="file" id="image_file" name="image_file" class="form-control @error('image_file') is-invalid @enderror"
                               accept="image/*">
                        <div class="admin-form-hint">Leave blank to keep the current logo</div>
                        @error('image_file')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-2">
                        <label class="admin-form-label" for="image">Logo Path (fallback)</label>
                        <input type="text" id="image" name="image" class="form-control @error('image') is-invalid @enderror"
                               value="{{ old('image', $brand->image) }}">
                        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="admin-card">
                <div class="admin-card-header"><h2>Options</h2></div>
                <div class="admin-card-body">

                    <div class="mb-4">
                        <label class="admin-form-label" for="sort_order">Sort Order</label>
                        <input type="number" id="sort_order" name="sort_order" min="0"
                               class="form-control @error('sort_order') is-invalid @enderror"
                               value="{{ old('sort_order', $brand->sort_order) }}">
                        @error('sort_order')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-4">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active"
                                   value="1" {{ old('is_active', $brand->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Active (shown in booking form)</label>
                        </div>
                    </div>

                    <button type="submit" class="admin-btn admin-btn-primary" style="width:100%;margin-bottom:12px;">
                        <i class="fa-solid fa-floppy-disk"></i> Save Changes
                    </button>
                </div>
            </div>

            <div class="admin-card" style="border:1px solid #fee2e2;">
                <div class="admin-card-body">
                    <button type="submit" form="brand-delete-form" class="admin-btn admin-btn-danger" style="width:100%;">
                        <i class="fa-solid fa-trash"></i> Delete Brand
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

{{-- Kept outside the update form: nested forms are invalid and would hijack the Save submit --}}
<form id="brand-delete-form" method="POST" action="{{ route('admin.brands.destroy', $brand) }}"
      onsubmit="return confirm('Delete this brand permanently?')">
    @csrf @method('DELETE')
</form>

@endsection
