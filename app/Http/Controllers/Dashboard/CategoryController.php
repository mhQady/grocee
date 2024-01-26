<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\StoreCategoryRequest;
use App\Repositories\Contracts\CategoryContract;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CategoryController extends Controller
{
    public function __construct(protected CategoryContract $categoryRepo)
    {
    }

    public function index()
    {
        return response()->json(['data' => $this->categoryRepo->search()]);
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->validated());

        if ($request->image)
            Media::where('id', $request->image)->update(['model_id' => $category->id, 'model_type' => Category::class]);

        return response()->json([
            'message' => 'Category created successfully.',
            'data' => new CategoryResource($category),
        ]);
    }

    public function show(Category $category)
    {
        return response()->json(['data' => new CategoryResource($category)]);
    }

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

    public function destroy(Category $category)
    {
        $category->clearMediaCollection();

        $category->delete();

        return response()->json([
            'message' => __('Category deleted successfully.'),
        ]);
    }
}
