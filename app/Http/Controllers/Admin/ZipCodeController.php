<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ZipCode;
use Illuminate\Http\Request;

class ZipCodeController extends Controller
{
    public function index()
    {
        $zipCodes = ZipCode::orderBy('sort_order')->orderBy('code')->paginate(30);
        return view('admin.zipcodes.index', compact('zipCodes'));
    }

    public function create()
    {
        return view('admin.zipcodes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code'         => 'required|string|max:10|unique:zip_codes,code',
            'neighborhood' => 'nullable|string|max:100',
            'sort_order'   => 'nullable|integer|min:0',
        ]);

        ZipCode::create([
            'code'         => $request->code,
            'neighborhood' => $request->neighborhood ?? '',
            'is_active'    => $request->boolean('is_active', true),
            'sort_order'   => $request->input('sort_order', 0),
        ]);

        return redirect()->route('admin.zipcodes.index')->with('success', 'ZIP code added successfully.');
    }

    public function edit(ZipCode $zipcode)
    {
        return view('admin.zipcodes.edit', compact('zipcode'));
    }

    public function update(Request $request, ZipCode $zipcode)
    {
        $request->validate([
            'code'         => 'required|string|max:10|unique:zip_codes,code,' . $zipcode->id,
            'neighborhood' => 'nullable|string|max:100',
            'sort_order'   => 'nullable|integer|min:0',
        ]);

        $zipcode->update([
            'code'         => $request->code,
            'neighborhood' => $request->neighborhood ?? '',
            'is_active'    => $request->boolean('is_active'),
            'sort_order'   => $request->input('sort_order', 0),
        ]);

        return redirect()->route('admin.zipcodes.index')->with('success', 'ZIP code updated.');
    }

    public function destroy(ZipCode $zipcode)
    {
        $zipcode->delete();
        return redirect()->route('admin.zipcodes.index')->with('success', 'ZIP code deleted.');
    }

    public function bulkToggle(Request $request)
    {
        $request->validate(['ids' => 'required|array', 'ids.*' => 'integer']);
        ZipCode::whereIn('id', $request->ids)->update(['is_active' => $request->boolean('active')]);
        return redirect()->route('admin.zipcodes.index')->with('success', 'ZIP codes updated.');
    }
}
