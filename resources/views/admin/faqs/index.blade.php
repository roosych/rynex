@extends('layouts.admin')

@section('title', 'FAQs')
@section('page_title', 'FAQs')

@section('content')

<div class="admin-card">
    <div class="admin-card-header">
        <h2><i class="fa-solid fa-circle-question" style="margin-right:8px;color:var(--accent-color);"></i>All FAQs</h2>
        <a href="{{ route('admin.faqs.create') }}" class="admin-btn admin-btn-primary">
            <i class="fa-solid fa-plus"></i> Add FAQ
        </a>
    </div>
    <div class="admin-card-body" style="padding:0;">
        @if ($faqs->isEmpty())
            <div style="padding:28px 24px;text-align:center;color:#9ca3af;">No FAQs found.</div>
        @else
        <table class="admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Status</th>
                    <th>Order</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($faqs as $faq)
                <tr>
                    <td style="color:#9ca3af;">{{ $faq->id }}</td>
                    <td>
                        <strong>{{ Str::limit($faq->question, 80) }}</strong>
                        <br><span style="font-size:0.78rem;color:#9ca3af;">{{ Str::limit($faq->answer, 70) }}</span>
                    </td>
                    <td>
                        <span class="badge-status {{ $faq->is_active ? 'badge-active' : 'badge-inactive' }}">
                            {{ $faq->is_active ? 'Active' : 'Hidden' }}
                        </span>
                    </td>
                    <td>{{ $faq->sort_order }}</td>
                    <td style="text-align:right;">
                        <a href="{{ route('admin.faqs.edit', $faq) }}" class="admin-btn admin-btn-secondary admin-btn-sm">
                            <i class="fa-solid fa-pencil"></i> Edit
                        </a>
                        <form method="POST" action="{{ route('admin.faqs.destroy', $faq) }}"
                              style="display:inline;" onsubmit="return confirm('Delete this FAQ?')">
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

@endsection
