<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Post;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $services    = Service::where('is_active', true)->orderBy('sort_order')->with('media')->get();
        $latestPosts = Post::where('is_active', true)->orderByDesc('published_at')->with('media')->take(3)->get();
        $faqs        = Faq::where('is_active', true)->orderBy('sort_order')->get();

        return view('pages.home', compact('services', 'latestPosts', 'faqs'));
    }
}
