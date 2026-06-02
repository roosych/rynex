@extends('layouts.admin')

@section('title', 'Services')
@section('page_title', 'Services')

@section('content')

<div class="admin-card">
    <div class="admin-card-header">
        <h2><i class="fa-solid fa-wrench" style="margin-right:8px;color:var(--accent-color);"></i>All Services</h2>
        <a href="{{ route('admin.services.create') }}" class="admin-btn admin-btn-primary">
            <i class="fa-solid fa-plus"></i> Add Service
        </a>
    </div>
    <div class="admin-card-body" style="padding:0;">
        @if ($services->isEmpty())
            <div style="padding:28px 24px;text-align:center;color:#9ca3af;">No services found.</div>
        @else
        <table class="admin-table">
            <thead>
                <tr>
                    <th style="width:36px;"></th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody id="services-sortable">
                @foreach ($services as $service)
                <tr data-id="{{ $service->id }}">
                    <td class="drag-handle" title="Drag to reorder">
                        <i class="fa-solid fa-grip-vertical" style="color:#d1d5db;cursor:grab;"></i>
                    </td>
                    <td>
                        <strong>{{ $service->title }}</strong>
                        @if ($service->excerpt)
                            <br><span style="font-size:0.78rem;color:#9ca3af;">{{ Str::limit($service->excerpt, 60) }}</span>
                        @endif
                    </td>
                    <td><code style="font-size:0.78rem;background:#f3f4f6;padding:2px 6px;border-radius:4px;">{{ $service->slug }}</code></td>
                    <td>
                        <span class="badge-status {{ $service->is_active ? 'badge-active' : 'badge-inactive' }}">
                            {{ $service->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td style="text-align:right;">
                        <a href="{{ route('services.show', $service->slug) }}" target="_blank"
                           class="admin-btn admin-btn-secondary admin-btn-sm" title="View on site">
                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        </a>
                        <a href="{{ route('admin.services.edit', $service) }}"
                           class="admin-btn admin-btn-secondary admin-btn-sm">
                            <i class="fa-solid fa-pencil"></i> Edit
                        </a>
                        <form method="POST" action="{{ route('admin.services.destroy', $service) }}"
                              style="display:inline;" onsubmit="return confirm('Delete this service?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="admin-btn admin-btn-danger admin-btn-sm">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>

@push('styles')
<style>
#services-sortable tr.sortable-ghost { opacity: 0.4; background: #f0f9ff; }
#services-sortable tr.sortable-chosen { background: #f8fafc; }
.drag-handle { cursor: grab; padding-left: 16px !important; }
.drag-handle:active { cursor: grabbing; }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
<script>
(function () {
    var tbody = document.getElementById('services-sortable');
    if (!tbody) return;

    Sortable.create(tbody, {
        handle: '.drag-handle',
        animation: 150,
        ghostClass: 'sortable-ghost',
        chosenClass: 'sortable-chosen',
        onEnd: function () {
            var ids = Array.from(tbody.querySelectorAll('tr[data-id]'))
                          .map(function (tr) { return tr.dataset.id; });

            fetch('{{ route('admin.services.reorder') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ ids: ids })
            });
        }
    });
})();
</script>
@endpush

@endsection
