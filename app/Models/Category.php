<?php

namespace App\Models;

use App\Traits\RepoTrait;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia, RepoTrait;

    protected $guarded = ['id'];
    public $translatable = ['name'];

    protected function image(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => dd($value),
        );
    }
}
