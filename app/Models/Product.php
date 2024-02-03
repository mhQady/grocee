<?php

namespace App\Models;

use App\Traits\RepoTrait;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Product\ProductStatusEnum;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia, RepoTrait;

    protected $guarded = ['id'];

    protected $casts = [
        'status' => ProductStatusEnum::class
    ];
    public $filters = ['categoryBelong'];
    public $translatable = ['name', 'slug', 'description'];

    public function mainImage(): MorphOne
    {
        return $this->morphOne(Media::class, 'model')->oldestOfMany();
    }

    public function scopeOfCategoryBelong($query, $categoryId = null)
    {
        if ($categoryId)
            return $query->where('category_id', $categoryId);

        return $query;
    }
}
