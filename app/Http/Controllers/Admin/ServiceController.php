<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->get();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'slug'             => 'required|string|max:255|unique:services,slug',
            'excerpt'          => 'nullable|string|max:500',
            'meta_description' => 'nullable|string|max:320',
            'image'            => 'nullable|string|max:500',
            'image_file'       => 'nullable|image|max:4096',
            'content'          => 'nullable|string',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        unset($validated['image_file']);

        $service = Service::create($validated);

        if ($request->hasFile('image_file')) {
            $service->addMediaFromRequest('image_file')->toMediaCollection('image');
        }

        return redirect()->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'slug'             => ['required', 'string', 'max:255', Rule::unique('services', 'slug')->ignore($service->id)],
            'excerpt'          => 'nullable|string|max:500',
            'meta_description' => 'nullable|string|max:320',
            'image'            => 'nullable|string|max:500',
            'image_file'       => 'nullable|image|max:4096',
            'content'          => 'nullable|string',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        unset($validated['image_file']);

        $service->update($validated);

        if ($request->hasFile('image_file')) {
            $service->clearMediaCollection('image');
            $service->addMediaFromRequest('image_file')->toMediaCollection('image');
        }

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function reorder(Request $request)
    {
        $request->validate(['ids' => 'required|array', 'ids.*' => 'integer']);

        foreach ($request->ids as $position => $id) {
            Service::where('id', $id)->update(['sort_order' => $position]);
        }

        return response()->json(['ok' => true]);
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted.');
    }
}
