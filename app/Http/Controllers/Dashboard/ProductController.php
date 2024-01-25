<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Requests\StoreProductRequest;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['data' => Product::latest()->paginate(15)]);
    }

    public function store(StoreProductRequest $request)
    {
        // return response()->json(['message' => 'Product created successfully.', 'product' => $request->all()]);
        $product = Product::create($request->validated());

        if ($request->has('image')) {
            Media::find($request->image)->update([
                'model_id' => $product->id,
                'model_type' => $product::class
            ]);
        }

        return response()->json(['message' => 'Product created successfully.', 'product' => $product]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json(['product' => new ProductResource($product)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return response()->json(['message' => 'Product updated successfully.', 'product' => $product->fresh()]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
