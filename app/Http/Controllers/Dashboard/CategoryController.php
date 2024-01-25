<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\StoreCategoryRequest;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Category::latest()->paginate(15)]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        return response()->json([
            'message' => 'Category created successfully.',
            'data' => new CategoryResource(Category::create($request->validated())),
        ]);
    }

    public function show(Category $category)
    {
        return response()->json(['data' => new CategoryResource($category)]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        if ($request->image)
            Media::where('id', $request->image)->update(['model_id' => $category->id, 'model_type' => Category::class]);



        return response()->json([
            'message' => 'Category created successfully.',
            'data' => new CategoryResource($category->fresh()),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
