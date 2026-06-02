<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->orderBy('sort_order')->with('media')->get();

        return view('pages.services.index', compact('services'));
    }

    public function show(string $slug)
    {
        $service     = Service::where('slug', $slug)->where('is_active', true)->with('media')->firstOrFail();
        $allServices = Service::where('is_active', true)->orderBy('sort_order')->with('media')->get();

        return view('pages.services.show', compact('service', 'allServices'));
    }
}
