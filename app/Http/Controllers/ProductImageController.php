<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductImagesFormRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function addImages($productId)
    {
        $product = Product::select("name", "code", "image", "price", "color", "id")->with('images')->findOrFail($productId);
        $images = $product->images;
        return view('admin.images.add', compact('product', 'images'));

    }


    public function updateImages(ProductImagesFormRequest $request, $productId)
    {
        return $request;
    }
}
