<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_active', true)
            ->orderByDesc('published_at')
            ->with('media')
            ->paginate(9);

        return view('pages.blog.index', compact('posts'));
    }

    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->where('is_active', true)->with('media')->firstOrFail();

        // Single query: prefer same category, fallback handled in collection
        $relatedPosts = Post::where('is_active', true)
            ->where('slug', '!=', $slug)
            ->with('media')
            ->orderByRaw('CASE WHEN category = ? THEN 0 ELSE 1 END', [$post->category])
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        return view('pages.blog.show', compact('post', 'relatedPosts'));
    }
}
