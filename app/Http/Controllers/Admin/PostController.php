<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderByDesc('published_at')->get();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'slug'             => 'required|string|max:255|unique:posts,slug',
            'category'         => 'required|string|max:100',
            'published_at'     => 'required|date',
            'meta_description' => 'nullable|string|max:320',
            'image'            => 'nullable|string|max:500',
            'image_file'       => 'nullable|image|max:4096',
            'content'          => 'nullable|string',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        unset($validated['image_file']);

        $post = Post::create($validated);

        if ($request->hasFile('image_file')) {
            $post->addMediaFromRequest('image_file')->toMediaCollection('image');
        }

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'slug'             => ['required', 'string', 'max:255', Rule::unique('posts', 'slug')->ignore($post->id)],
            'category'         => 'required|string|max:100',
            'published_at'     => 'required|date',
            'meta_description' => 'nullable|string|max:320',
            'image'            => 'nullable|string|max:500',
            'image_file'       => 'nullable|image|max:4096',
            'content'          => 'nullable|string',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        unset($validated['image_file']);

        $post->update($validated);

        if ($request->hasFile('image_file')) {
            $post->clearMediaCollection('image');
            $post->addMediaFromRequest('image_file')->toMediaCollection('image');
        }

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post deleted.');
    }
}
