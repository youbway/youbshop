<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Product::with(['section' => function($query){
            $query->select('id', 'name');
        }, 'category' => function($query){
            $query->select('id', 'name');
        }])->get();
        return view('admin.products.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Section::with('categories')->get();
        $brands = Brand::where('status', 1)->select('id', 'name')->get();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {

        $categoryDetails  = Category::findOrFail($request->category_id);
        $product = new Product($request->toArray());
        if (isset($request->status)) {
            $product->status = 1;
        } else {
            $product->status = 0;
        }
        if (isset($request->is_featured)) {
            $product->is_featured = "yes";
        } else {
            $product->is_featured = "no";
        }

        $product->section_id =$categoryDetails->section_id;
        $product->category_id = $categoryDetails->id;
        $product->vendor_id = Auth::guard('admin')->user()->vendor_id;
        $product->admin_id = Auth::guard('admin')->user()->id;
        $product->admin_type = Auth::guard('admin')->user()->type;

 
        $product->save();
        return redirect()->route('admin.product.index')->with('success' , 'product added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $productId)
    {
        if ($request->ajax()) {
            $brand = Product::findOrFail($productId);
            $brand->delete();
            return response()->json(['id' => $productId]);
        }
    }

    public function updateProductStatus(Request $request)
    {
        if ($request->ajax()) {
            $status = $request->status;
            if ($status == "active") {
                $status = 0;
            }
            if ($status == "inactive") {
                $status = 1;
            }

            $item = Product::findOrFail($request->item_id);
            $item->update(["status" => $status]);

            return response()->json(['item_id' => $request->item_id, "status" => $status]);;
        }
    }
}
