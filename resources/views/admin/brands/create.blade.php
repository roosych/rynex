@extends('layouts.admin')

@section('title', 'Add Brand')
@section('page_title', 'Add Brand')

@section('content')

<div style="margin-bottom:16px;">
    <a href="{{ route('admin.brands.index') }}" class="admin-btn admin-btn-secondary admin-btn-sm">
        <i class="fa-solid fa-arrow-left"></i> Back to Brands
    </a>
</div>

<form method="POST" action="{{ route('admin.brands.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-lg-8">
            <div class="admin-card">
                <div class="admin-card-header"><h2>Brand Details</h2></div>
                <div class="admin-card-body">

                    <div class="mb-4">
                        <label class="admin-form-label" for="name">Name <span style="color:#e63946;">*</span></label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label" for="image_file">Upload Logo</label>
                        <input type="file" id="image_file" name="image_file" class="form-control @error('image_file') is-invalid @enderror"
                               accept="image/*">
                        <div class="admin-form-hint">Upload a logo image, or enter a path below</div>
                        @error('image_file')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-2">
                        <label class="admin-form-label" for="image">Logo Path (fallback)</label>
                        <input type="text" id="image" name="image" class="form-control @error('image') is-invalid @enderror"
                               value="{{ old('image') }}" placeholder="/template/images/brands/samsung.png">
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
                               value="{{ old('sort_order', 0) }}">
                        @error('sort_order')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-4">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active"
                                   value="1" {{ old('is_active', '1') ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Active (shown in booking form)</label>
                        </div>
                    </div>

                    <button type="submit" class="admin-btn admin-btn-primary" style="width:100%;">
                        <i class="fa-solid fa-floppy-disk"></i> Create Brand
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
