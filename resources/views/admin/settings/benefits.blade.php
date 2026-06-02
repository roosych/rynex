@extends('layouts.admin')
@section('title', 'Benefits Settings')
@section('page_title', 'Settings — Benefits')

@section('content')
@include('admin.settings._tabs', ['active' => 'benefits'])

<form method="POST" action="{{ route('admin.settings.update', 'benefits') }}">
    @csrf
    <div class="admin-card">
        <div class="admin-card-header"><h2>Section Header</h2></div>
        <div class="admin-card-body">
            <div class="mb-4">
                <label class="admin-form-label">Heading</label>
                <input type="text" name="heading" class="form-control" value="{{ old('heading', $settings->heading) }}">
            </div>
            <div class="mb-4">
                <label class="admin-form-label">Description</label>
                <textarea name="description" class="form-control" rows="2">{{ old('description', $settings->description) }}</textarea>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach (range(1, 6) as $n)
        <div class="col-lg-6">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h2>Benefit {{ $n }}</h2>
                    <span style="font-size:0.78rem;color:#9ca3af;">icon-benefit-{{ $n }}.svg</span>
                </div>
                <div class="admin-card-body">
                    <div class="mb-3">
                        <label class="admin-form-label">Title</label>
                        <input type="text" name="b{{ $n }}_title" class="form-control"
                               value="{{ old('b'.$n.'_title', $settings->{'b'.$n.'_title'}) }}">
                    </div>
                    <div class="mb-2">
                        <label class="admin-form-label">Description</label>
                        <textarea name="b{{ $n }}_desc" class="form-control" rows="2">{{ old('b'.$n.'_desc', $settings->{'b'.$n.'_desc'}) }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <button type="submit" class="admin-btn admin-btn-primary">
        <i class="fa-solid fa-floppy-disk"></i> Save Benefits Settings
    </button>
</form>
@endsection
