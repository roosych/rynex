@extends('layouts.admin')

@section('title', 'New Post')
@section('page_title', 'New Post')

@section('content')

<div style="margin-bottom:16px;">
    <a href="{{ route('admin.posts.index') }}" class="admin-btn admin-btn-secondary admin-btn-sm">
        <i class="fa-solid fa-arrow-left"></i> Back to Posts
    </a>
</div>

<form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-lg-8">
            <div class="admin-card">
                <div class="admin-card-header"><h2>Post Content</h2></div>
                <div class="admin-card-body">

                    <div class="mb-4">
                        <label class="admin-form-label" for="title">Title <span style="color:#e63946;">*</span></label>
                        <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title') }}" required>
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label" for="slug">Slug <span style="color:#e63946;">*</span></label>
                        <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror"
                               value="{{ old('slug') }}" required>
                        @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label" for="meta_description">Meta Description</label>
                        <input type="text" id="meta_description" name="meta_description"
                               class="form-control @error('meta_description') is-invalid @enderror"
                               value="{{ old('meta_description') }}" maxlength="320">
                        @error('meta_description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label" for="image_file">Upload Image</label>
                        <input type="file" id="image_file" name="image_file" class="form-control @error('image_file') is-invalid @enderror"
                               accept="image/*">
                        <div class="admin-form-hint">Upload a new image, or enter a path below</div>
                        @error('image_file')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-4">
                        <label class="admin-form-label" for="image">Image Path (fallback)</label>
                        <input type="text" id="image" name="image" class="form-control @error('image') is-invalid @enderror"
                               value="{{ old('image') }}" placeholder="/template/images/template/careref.jpg">
                        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-2">
                        <label class="admin-form-label" for="content">Content</label>
                        <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror"
                                  rows="16">{{ old('content') }}</textarea>
                        @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="admin-card">
                <div class="admin-card-header"><h2>Options</h2></div>
                <div class="admin-card-body">

                    <div class="mb-4">
                        <label class="admin-form-label" for="category">Category <span style="color:#e63946;">*</span></label>
                        <input type="text" id="category" name="category"
                               class="form-control @error('category') is-invalid @enderror"
                               value="{{ old('category') }}" required list="category-suggestions">
                        <datalist id="category-suggestions">
                            <option value="Refrigerator">
                            <option value="Washer">
                            <option value="Dishwasher">
                            <option value="Oven">
                            <option value="HVAC">
                            <option value="General">
                        </datalist>
                        @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label" for="published_at">Publish Date <span style="color:#e63946;">*</span></label>
                        <input type="date" id="published_at" name="published_at"
                               class="form-control @error('published_at') is-invalid @enderror"
                               value="{{ old('published_at', date('Y-m-d')) }}" required>
                        @error('published_at')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-4">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active"
                                   value="1" {{ old('is_active', '1') ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Published (visible on site)</label>
                        </div>
                    </div>

                    <button type="submit" class="admin-btn admin-btn-primary" style="width:100%;">
                        <i class="fa-solid fa-floppy-disk"></i> Create Post
                    </button>

                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@push('scripts')
<script src="https://cdn.tiny.cloud/1/{{ config('services.tinymce.key') }}/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
    selector: '#content',
    height: 520,
    menubar: false,
    plugins: 'lists link image code',
    toolbar: 'undo redo | bold italic | h2 h3 | bullist numlist | link image | code',
    link_assume_external_targets: true,
    link_default_target: '_blank',
    content_style: 'body { font-family: sans-serif; font-size: 15px; line-height: 1.7; color: #333; padding: 12px; }',
    setup: function (editor) {
        editor.on('change', function () { editor.save(); });
    }
});

document.getElementById('title').addEventListener('input', function () {
    var slug = this.value.toLowerCase()
        .replace(/[^a-z0-9\s-]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-')
        .replace(/^-|-$/g, '');
    document.getElementById('slug').value = slug;
});
</script>
@endpush
