@extends('layouts.admin')
@section('title', 'Process & Sections Settings')
@section('page_title', 'Settings — Sections')

@section('content')
@include('admin.settings._tabs', ['active' => 'process'])

<form method="POST" action="{{ route('admin.settings.update', 'process') }}">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <div class="admin-card">
                <div class="admin-card-header"><h2>Services Section</h2></div>
                <div class="admin-card-body">
                    <div class="mb-3"><label class="admin-form-label">Subtitle (label above heading)</label>
                        <input type="text" name="services_subtitle" class="form-control" value="{{ old('services_subtitle', $settings->services_subtitle) }}"></div>
                    <div class="mb-3"><label class="admin-form-label">Heading</label>
                        <input type="text" name="services_title" class="form-control" value="{{ old('services_title', $settings->services_title) }}"></div>
                    <div class="mb-3"><label class="admin-form-label">Description</label>
                        <textarea name="services_description" class="form-control" rows="2">{{ old('services_description', $settings->services_description) }}</textarea></div>
                </div>
            </div>

            <div class="admin-card">
                <div class="admin-card-header"><h2>Why Choose Us</h2></div>
                <div class="admin-card-body">
                    <div class="mb-3"><label class="admin-form-label">Heading</label>
                        <input type="text" name="why_heading" class="form-control" value="{{ old('why_heading', $settings->why_heading) }}"></div>
                    <div class="mb-3"><label class="admin-form-label">Description</label>
                        <textarea name="why_description" class="form-control" rows="2">{{ old('why_description', $settings->why_description) }}</textarea></div>
                    <div class="mb-3"><label class="admin-form-label">Feature 1 — Title</label>
                        <input type="text" name="why_feature_1_title" class="form-control" value="{{ old('why_feature_1_title', $settings->why_feature_1_title) }}"></div>
                    <div class="mb-3"><label class="admin-form-label">Feature 1 — Body</label>
                        <textarea name="why_feature_1_body" class="form-control" rows="2">{{ old('why_feature_1_body', $settings->why_feature_1_body) }}</textarea></div>
                    <div class="mb-3"><label class="admin-form-label">Feature 2 — Title</label>
                        <input type="text" name="why_feature_2_title" class="form-control" value="{{ old('why_feature_2_title', $settings->why_feature_2_title) }}"></div>
                    <div class="mb-3"><label class="admin-form-label">Feature 2 — Body</label>
                        <textarea name="why_feature_2_body" class="form-control" rows="2">{{ old('why_feature_2_body', $settings->why_feature_2_body) }}</textarea></div>
                </div>
            </div>

            <div class="admin-card">
                <div class="admin-card-header"><h2>Blog Preview Section</h2></div>
                <div class="admin-card-body">
                    <div class="mb-3"><label class="admin-form-label">Subtitle</label>
                        <input type="text" name="blog_subtitle" class="form-control" value="{{ old('blog_subtitle', $settings->blog_subtitle) }}"></div>
                    <div class="mb-3"><label class="admin-form-label">Heading</label>
                        <input type="text" name="blog_title" class="form-control" value="{{ old('blog_title', $settings->blog_title) }}"></div>
                    <div class="mb-3"><label class="admin-form-label">Description</label>
                        <textarea name="blog_description" class="form-control" rows="2">{{ old('blog_description', $settings->blog_description) }}</textarea></div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="admin-card">
                <div class="admin-card-header"><h2>Process Section</h2></div>
                <div class="admin-card-body">
                    <div class="mb-3"><label class="admin-form-label">Heading</label>
                        <input type="text" name="process_heading" class="form-control" value="{{ old('process_heading', $settings->process_heading) }}"></div>
                    <div class="mb-3"><label class="admin-form-label">Description</label>
                        <textarea name="process_description" class="form-control" rows="2">{{ old('process_description', $settings->process_description) }}</textarea></div>
                </div>
            </div>

            <div class="admin-card">
                <div class="admin-card-header"><h2>How We Work — 3 Steps</h2></div>
                <div class="admin-card-body">
                    <div class="mb-3"><label class="admin-form-label">Heading</label>
                        <input type="text" name="how_work_heading" class="form-control" value="{{ old('how_work_heading', $settings->how_work_heading) }}"></div>
                    <div class="mb-3"><label class="admin-form-label">Description</label>
                        <textarea name="how_work_description" class="form-control" rows="2">{{ old('how_work_description', $settings->how_work_description) }}</textarea></div>
                    @foreach ([1,2,3] as $n)
                    <hr style="margin:16px 0;">
                    <div class="mb-3"><label class="admin-form-label">Step {{ $n }} — Title</label>
                        <input type="text" name="step_{{ $n }}_title" class="form-control" value="{{ old('step_'.$n.'_title', $settings->{'step_'.$n.'_title'}) }}"></div>
                    <div class="mb-3"><label class="admin-form-label">Step {{ $n }} — Body</label>
                        <textarea name="step_{{ $n }}_body" class="form-control" rows="2">{{ old('step_'.$n.'_body', $settings->{'step_'.$n.'_body'}) }}</textarea></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="admin-btn admin-btn-primary">
        <i class="fa-solid fa-floppy-disk"></i> Save Sections Settings
    </button>
</form>
@endsection
