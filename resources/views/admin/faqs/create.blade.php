@extends('layouts.admin')

@section('title', 'Add FAQ')
@section('page_title', 'Add FAQ')

@section('content')

<div style="margin-bottom:16px;">
    <a href="{{ route('admin.faqs.index') }}" class="admin-btn admin-btn-secondary admin-btn-sm">
        <i class="fa-solid fa-arrow-left"></i> Back to FAQs
    </a>
</div>

<form method="POST" action="{{ route('admin.faqs.store') }}">
    @csrf

    <div class="row">
        <div class="col-lg-8">
            <div class="admin-card">
                <div class="admin-card-header"><h2>FAQ Content</h2></div>
                <div class="admin-card-body">

                    <div class="mb-4">
                        <label class="admin-form-label" for="question">Question <span style="color:#e63946;">*</span></label>
                        <input type="text" id="question" name="question"
                               class="form-control @error('question') is-invalid @enderror"
                               value="{{ old('question') }}" required maxlength="500">
                        @error('question')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-2">
                        <label class="admin-form-label" for="answer">Answer <span style="color:#e63946;">*</span></label>
                        <textarea id="answer" name="answer"
                                  class="form-control @error('answer') is-invalid @enderror"
                                  rows="5" required>{{ old('answer') }}</textarea>
                        @error('answer')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
                                   value="1" {{ old('is_active', '1') ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Active (visible on site)</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label" for="sort_order">Sort Order</label>
                        <input type="number" id="sort_order" name="sort_order" class="form-control"
                               value="{{ old('sort_order', 0) }}" min="0">
                        <div class="admin-form-hint">Lower = appears first</div>
                    </div>

                    <button type="submit" class="admin-btn admin-btn-primary" style="width:100%;">
                        <i class="fa-solid fa-floppy-disk"></i> Create FAQ
                    </button>

                </div>
            </div>
        </div>
    </div>
</form>

@endsection
