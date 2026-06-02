@extends('layouts.admin')
@section('title', 'About Settings')
@section('page_title', 'Settings — About Section')

@section('content')
@include('admin.settings._tabs', ['active' => 'about'])

<form method="POST" action="{{ route('admin.settings.update', 'about') }}">
    @csrf
    <div class="row">
        <div class="col-lg-7">
            <div class="admin-card">
                <div class="admin-card-header"><h2>About Section Text</h2></div>
                <div class="admin-card-body">
                    <div class="mb-4">
                        <label class="admin-form-label">Heading</label>
                        <input type="text" name="heading" class="form-control"
                               value="{{ old('heading', $settings->heading) }}">
                    </div>
                    <div class="mb-4">
                        <label class="admin-form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description', $settings->description) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="admin-card">
                <div class="admin-card-header"><h2>Mission / Vision / Values</h2></div>
                <div class="admin-card-body">
                    @foreach ([
                        ['mission_title', 'mission_text', 'Mission'],
                        ['vision_title',  'vision_text',  'Vision'],
                        ['values_title',  'values_text',  'Values'],
                    ] as [$titleKey, $textKey, $label])
                    <div class="mb-4">
                        <label class="admin-form-label">{{ $label }} Title</label>
                        <input type="text" name="{{ $titleKey }}" class="form-control mb-2"
                               value="{{ old($titleKey, $settings->$titleKey) }}">
                        <label class="admin-form-label">{{ $label }} Text</label>
                        <textarea name="{{ $textKey }}" class="form-control" rows="2">{{ old($textKey, $settings->$textKey) }}</textarea>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="admin-card">
                <div class="admin-card-header"><h2>Counter Numbers</h2></div>
                <div class="admin-card-body">
                    @foreach ([
                        ['technicians',         'Certified Technicians'],
                        ['satisfaction_rate',   'Customer Satisfaction Rate (%)'],
                        ['years_experience',    'Years of Experience'],
                        ['appliances_repaired', 'Appliances Repaired'],
                        ['cities_served',       'Cities & Zip Codes Served'],
                    ] as [$key, $label])
                    <div class="mb-4">
                        <label class="admin-form-label">{{ $label }}</label>
                        <input type="number" name="{{ $key }}" class="form-control"
                               value="{{ old($key, $settings->$key) }}" min="0">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="admin-btn admin-btn-primary">
        <i class="fa-solid fa-floppy-disk"></i> Save About Settings
    </button>
</form>
@endsection
