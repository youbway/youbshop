<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Category::with(['section', 'parentCategory'])->get();
        return view('admin.categories.index', compact('items'));

    }

    public function updateCategoryStatus(Request $request)
    {
        if ($request->ajax()) {
            $status = $request->status;
            if ($status == "active") {
                $status = 0;
            }
            if ($status == "inactive") {
                $status = 1;
            }

            $item = Category::findOrFail($request->item_id);
            $item->update(["status" => $status]);

            return response()->json(["status" => $status, "item_id" => $request->item_id]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = '' ;
        $request->validate(Category::rules());
        if (!empty($request->image)) {
            $path = saveImage('category_img', $request->image);
        }
        $request->merge(['image' => $path]);

        if (!empty($request->status)) {
            $request->merge(['status' => 1]);

        } else {
            $request->merge(['status' => 0]);

        }

        Category::insert($request->except('_token'));
        return redirect()->route('admin.category.index')->with('success', 'Category addes successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        // return $category;
        return view('admin.categories.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $catgoryId)
    {
        return $request;
        $category = Category::findOrFail($catgoryId);
        $request->validate(Category::rules());
        if (! $request->has('status')) {
            $request->request->add(['status' => 0]);
        } else {
            $request->merge([
                'status' => 1,
            ]);
        }

        $path = '';
        if (!empty($request->image)) {
            $path = $category->image;
            $path = Str::swap(['storage' => 'public'], $path);
            if($path) {
                deleteImage($path);
            }
            $path = saveImage('category_img', $request->image);
        }

        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'section_id' => $request->section_id,
            'description' => $request->description,
            'url' => $request->url,
            'discount' => $request->discount,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'status' => $request->status,
            'image' => $path,
        ]);
        return redirect()->route('admin.category.index')->with('success', 'The section wass updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $category = Category::findOrFail($request->id);
            $category->delete();
            return redirect()->route('admin.category.index')->with('success', 'The category was deleted successfully');
        }
    }
}
