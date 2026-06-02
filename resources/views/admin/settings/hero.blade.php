@extends('layouts.admin')
@section('title', 'Hero Settings')
@section('page_title', 'Settings — Hero Section')

@section('content')
@include('admin.settings._tabs', ['active' => 'hero'])

<form method="POST" action="{{ route('admin.settings.update', 'hero') }}">
    @csrf
    <div class="admin-card">
        <div class="admin-card-header"><h2>Homepage Hero Section</h2></div>
        <div class="admin-card-body">
            <div class="mb-4">
                <label class="admin-form-label">Hero Title</label>
                <input type="text" name="title" class="form-control"
                       value="{{ old('title', $settings->title) }}">
                <div class="admin-form-hint">Main headline shown over the video background</div>
            </div>
            <div class="mb-4">
                <label class="admin-form-label">Hero Subtitle</label>
                <input type="text" name="subtitle" class="form-control"
                       value="{{ old('subtitle', $settings->subtitle) }}">
            </div>
        </div>
    </div>
    <button type="submit" class="admin-btn admin-btn-primary">
        <i class="fa-solid fa-floppy-disk"></i> Save Hero Settings
    </button>
</form>
@endsection
