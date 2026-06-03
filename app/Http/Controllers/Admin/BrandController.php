<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('sort_order')->orderBy('name')->get();

        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:brands,name',
            'image'       => 'nullable|string|max:500',
            'image_file'  => 'nullable|image|max:4096',
            'sort_order'  => 'nullable|integer|min:0',
        ]);

        $validated['is_active']  = $request->boolean('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        unset($validated['image_file']);

        $brand = Brand::create($validated);

        if ($request->hasFile('image_file')) {
            $brand->addMediaFromRequest('image_file')->toMediaCollection('logo');
        }

        return redirect()->route('admin.brands.index')
            ->with('success', 'Brand created successfully.');
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255', Rule::unique('brands', 'name')->ignore($brand->id)],
            'image'       => 'nullable|string|max:500',
            'image_file'  => 'nullable|image|max:4096',
            'sort_order'  => 'nullable|integer|min:0',
        ]);

        $validated['is_active']  = $request->boolean('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        unset($validated['image_file']);

        $brand->update($validated);

        if ($request->hasFile('image_file')) {
            $brand->clearMediaCollection('logo');
            $brand->addMediaFromRequest('image_file')->toMediaCollection('logo');
        }

        return redirect()->route('admin.brands.index')
            ->with('success', 'Brand updated successfully.');
    }

    public function toggle(Brand $brand)
    {
        $brand->update(['is_active' => ! $brand->is_active]);

        return response()->json(['ok' => true, 'is_active' => $brand->is_active]);
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('admin.brands.index')
            ->with('success', 'Brand deleted.');
    }
}
