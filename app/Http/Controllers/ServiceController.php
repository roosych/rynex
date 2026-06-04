<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Service;
use App\Models\ZipCode;

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
        $zipCodes    = ZipCode::where('is_active', true)->orderBy('sort_order')->orderBy('code')->get();
        $brands      = Brand::where('is_active', true)->orderBy('sort_order')->orderBy('name')->get();

        return view('pages.services.show', compact('service', 'allServices', 'zipCodes', 'brands'));
    }
}
