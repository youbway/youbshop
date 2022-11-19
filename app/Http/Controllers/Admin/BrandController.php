<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Brand::all();
        return view('admin.brands.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate(Brand::rules());
        if (isset($request->status)) {
            $request->merge(['status' => 1]);
        } else {
            $request->merge(['status' => 0]);
        }
        Brand::insert($request->except('_token'));
        return redirect()->route('admin.brand.index')->with('success', 'Brand has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($brandId)
    {
        $item = Brand::findOrFail($brandId);
        return view('admin.brands.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $brandId)
    {
        $request->validate(Brand::rules());
        if (isset($request->status)) {
            $request->merge(['status' => 1]);
        } else {
            $request->merge(['status' => 0]);
        }
        $item = Brand::findOrFail($brandId);
        $item->update($request->toArray());
        return redirect()->route('admin.brand.index')->with('success', 'Brand has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $brandId)
    {
        // return $brandId;
        if ($request->ajax()) {
            $brand = Brand::findOrFail($brandId);
            $brand->delete();
            return response()->json(['id' => $brandId]);
        }
    }

    public function updateBrandStatus(Request $request)
    {
        if ($request->ajax()) {
            $status = $request->status;
            if ($status == "active") {
                $status = 0;
            }
            if ($status == "inactive") {
                $status = 1;
            }

            $item = Brand::findOrFail($request->item_id);
            $item->update(["status" => $status]);

            return redirect()->route('admin.brand.index')->with('success', 'Brand deleted successfully');
        }
    }
}
