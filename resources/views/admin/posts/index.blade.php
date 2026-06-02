@extends('layouts.admin')

@section('title', 'Blog Posts')
@section('page_title', 'Blog Posts')

@section('content')

<div class="admin-card">
    <div class="admin-card-header">
        <h2><i class="fa-solid fa-newspaper" style="margin-right:8px;color:var(--accent-color);"></i>All Posts</h2>
        <a href="{{ route('admin.posts.create') }}" class="admin-btn admin-btn-primary">
            <i class="fa-solid fa-plus"></i> New Post
        </a>
    </div>
    <div class="admin-card-body" style="padding:0;">
        @if ($posts->isEmpty())
            <div style="padding:28px 24px;text-align:center;color:#9ca3af;">No posts found.</div>
        @else
        <table class="admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Published</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td style="color:#9ca3af;">{{ $post->id }}</td>
                    <td>
                        <strong>{{ $post->title }}</strong><br>
                        <code style="font-size:0.75rem;background:#f3f4f6;padding:1px 5px;border-radius:3px;">{{ $post->slug }}</code>
                    </td>
                    <td>{{ $post->category }}</td>
                    <td>{{ $post->date }}</td>
                    <td>
                        <span class="badge-status {{ $post->is_active ? 'badge-active' : 'badge-inactive' }}">
                            {{ $post->is_active ? 'Active' : 'Draft' }}
                        </span>
                    </td>
                    <td style="text-align:right;">
                        <a href="{{ route('blog.show', $post->slug) }}" target="_blank"
                           class="admin-btn admin-btn-secondary admin-btn-sm" title="View on site">
                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        </a>
                        <a href="{{ route('admin.posts.edit', $post) }}"
                           class="admin-btn admin-btn-secondary admin-btn-sm">
                            <i class="fa-solid fa-pencil"></i> Edit
                        </a>
                        <form method="POST" action="{{ route('admin.posts.destroy', $post) }}"
                              style="display:inline;" onsubmit="return confirm('Delete this post?')">
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
