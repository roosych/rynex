@extends('layouts.admin')

@section('title', 'Edit Service')
@section('page_title', 'Edit Service')

@section('content')

<div style="margin-bottom:16px;">
    <a href="{{ route('admin.services.index') }}" class="admin-btn admin-btn-secondary admin-btn-sm">
        <i class="fa-solid fa-arrow-left"></i> Back to Services
    </a>
</div>

<form method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data">
    @csrf @method('PUT')

    <div class="row">
        <div class="col-lg-8">
            <div class="admin-card">
                <div class="admin-card-header"><h2>Service Details</h2></div>
                <div class="admin-card-body">

                    <div class="mb-4">
                        <label class="admin-form-label" for="title">Title <span style="color:#e63946;">*</span></label>
                        <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title', $service->title) }}" required>
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label" for="slug">Slug <span style="color:#e63946;">*</span></label>
                        <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror"
                               value="{{ old('slug', $service->slug) }}" required>
                        @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label" for="excerpt">Excerpt</label>
                        <input type="text" id="excerpt" name="excerpt" class="form-control @error('excerpt') is-invalid @enderror"
                               value="{{ old('excerpt', $service->excerpt) }}" maxlength="500">
                        @error('excerpt')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label" for="meta_title">Meta Title <span class="admin-form-hint" style="display:inline;margin-left:6px;">50–60 символов</span></label>
                        <input type="text" id="meta_title" name="meta_title"
                               class="form-control @error('meta_title') is-invalid @enderror"
                               value="{{ old('meta_title', $service->meta_title) }}" maxlength="100"
                               placeholder="Оставь пустым — будет: {{ $service->title }} in Dallas, TX | Swift Fix">
                        @error('meta_title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label" for="meta_description">Meta Description <span class="admin-form-hint" style="display:inline;margin-left:6px;">120–160 символов</span></label>
                        <input type="text" id="meta_description" name="meta_description"
                               class="form-control @error('meta_description') is-invalid @enderror"
                               value="{{ old('meta_description', $service->meta_description) }}" maxlength="320">
                        @error('meta_description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Current Image</label>
                        @php $currentImg = $service->getFirstMediaUrl('image') ?: $service->image; @endphp
                        @if ($currentImg)
                            <div style="margin-bottom:10px;">
                                <img src="{{ $currentImg }}" style="height:70px;border-radius:6px;object-fit:cover;" alt="">
                            </div>
                        @endif
                        <label class="admin-form-label" for="image_file">Upload New Image</label>
                        <input type="file" id="image_file" name="image_file" class="form-control @error('image_file') is-invalid @enderror"
                               accept="image/*">
                        <div class="admin-form-hint">Leave blank to keep the current image</div>
                        @error('image_file')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-4">
                        <label class="admin-form-label" for="image">Image Path (fallback)</label>
                        <input type="text" id="image" name="image" class="form-control @error('image') is-invalid @enderror"
                               value="{{ old('image', $service->image) }}">
                        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    @include('admin.partials.seo-preview', [
                        'model'            => $service,
                        'metaTitleField'   => 'meta_title',
                        'metaDescField'    => 'meta_description',
                        'serpUrl'          => route('services.show', $service->slug),
                        'serpFallbackTitle'=> $service->title . ' in Dallas, TX | Swift Fix',
                        'serpFallbackDesc' => 'Professional ' . $service->title . ' in Dallas, TX.',
                    ])

                    <div class="mb-2" style="margin-top:24px;">
                        <label class="admin-form-label" for="content">Content</label>
                        <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror"
                                  rows="14">{{ old('content', $service->content) }}</textarea>
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
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active"
                                   value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Active (visible on site)</label>
                        </div>
                    </div>

                    <button type="submit" class="admin-btn admin-btn-primary" style="width:100%;margin-bottom:12px;">
                        <i class="fa-solid fa-floppy-disk"></i> Save Changes
                    </button>

                    <a href="{{ route('services.show', $service->slug) }}" target="_blank"
                       class="admin-btn admin-btn-secondary" style="width:100%;justify-content:center;">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i> View on Site
                    </a>
                </div>
            </div>

            <div class="admin-card" style="border:1px solid #fee2e2;">
                <div class="admin-card-body">
                    <form method="POST" action="{{ route('admin.services.destroy', $service) }}"
                          onsubmit="return confirm('Delete this service permanently?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="admin-btn admin-btn-danger" style="width:100%;">
                            <i class="fa-solid fa-trash"></i> Delete Service
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script src="https://cdn.tiny.cloud/1/{{ config('services.tinymce.key') }}/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
    selector: '#content',
    height: 500,
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
</script>
@endpush

@endsection
