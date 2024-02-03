<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\CategoryResource;
use App\Http\Controllers\ApiBaseController;
use App\Http\Requests\StoreCategoryRequest;
use App\Repositories\Contracts\CategoryContract;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CategoryController extends ApiBaseController
{
    public function __construct(protected CategoryContract $categoryRepo)
    {
        parent::__construct($categoryRepo, CategoryResource::class);
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = $this->categoryRepo->create($request->validated());

        if ($request->image)
            Media::where('id', $request->image)->update(['model_id' => $category->id, 'model_type' => Category::class]);

        return response()->json([
            'message' => 'Category created successfully.',
            'data' => new CategoryResource($category),
        ]);
    }

    public function show($id)
    {
        return $this->respondWithModel(new CategoryResource($this->categoryRepo->retrieve('id', $id)));
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

    public function getFeatureCategories()
    {
        $featureCategories = DB::select('
            SELECT categories.id, JSON_UNQUOTE(JSON_EXTRACT(categories.name, "$.' . app()->getLocale() . '")) as name, COUNT(products.id) as products_count, media.id as image_id, media.file_name as image_name
            FROM categories
            LEFT JOIN products ON categories.id = products.category_id
            LEFT JOIN (
                SELECT * FROM media WHERE media.model_type = "App\\\Models\\\Category"
            ) as media ON categories.id = media.model_id
            GROUP BY categories.id, categories.name, media.id
            ORDER BY products_count DESC
            LIMIT 15
        ');


        return response()->json(data: [
            'feature_categories' => $featureCategories,
        ]);
    }

    public function getCategoriesHasNewestProducts()
    {
        $categories = DB::select('
            SELECT categories.id, JSON_UNQUOTE(JSON_EXTRACT(categories.name, "$.' . app()->getLocale() . '")) as name FROM categories
                JOIN products ON categories.id = products.category_id
                GROUP BY categories.id
                ORDER BY MAX(products.created_at) DESC
                LIMIT 5
        ');


        return response()->json(data: [
            'categories' => $categories,
        ]);
    }
}
