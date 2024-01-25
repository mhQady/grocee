<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\Product\ProductStatusEnum;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia;

    protected $guarded = ['id'];

    protected $casts = [
        'status' => ProductStatusEnum::class
    ];
    public $translatable = ['name', 'slug', 'description'];
}