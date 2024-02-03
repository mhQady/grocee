<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Requests\StoreProductRequest;
use App\Http\Controllers\ApiBaseController;
use App\Repositories\Contracts\ProductContract;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductController extends ApiBaseController
{
    public function __construct(protected ProductContract $productRepo)
    {
        parent::__construct($productRepo, ProductResource::class);
    }

    public function store(StoreProductRequest $request)
    {
        $product = $this->productRepo->create($request->validated());

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
        return $this->respondWithSuccess(
            data: ['product' => new ProductResource($product->fresh())]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return $this->respondWithSuccess('Product updated successfully.', ['product' => $product->fresh()]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function getLatestProducts(Request $request)
    {
        $products = $this->productRepo->search(
            filters: ['categoryBelong' => $request->category],
            relations: ['mainImage'],
            page: false,
            fields: ['id', 'name'],
            orderBy: 'created_at',
            limit: 6
        );

        return $this->respondWithSuccess(data: [
            'products' => ProductResource::collection($products)
        ]);
    }
}
