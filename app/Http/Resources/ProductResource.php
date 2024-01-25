<?php

namespace App\Http\Resources;

use App\Http\Resources\File\FileResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,

            'name' => $this->name,
            'name_ar' => $this->getTranslation('name', 'ar'),
            'name_en' => $this->getTranslation('name', 'en'),

            'slug' => $this->slug,
            'slug_ar' => $this->getTranslation('slug', 'ar'),
            'slug_en' => $this->getTranslation('slug', 'en'),


            'description' => $this->description,
            'description_ar' => $this->getTranslation('description', 'ar'),
            'description_en' => $this->getTranslation('description', 'en'),

            'price' => $this->price,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'file' => FileResource::collection($this->getMedia()),
        ];
    }
}
