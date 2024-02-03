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

            'name' => [
                'ar' => $this->getTranslation('name', 'ar'),
                'en' => $this->getTranslation('name', 'en'),
            ],

            'slug' => [
                'ar' => $this->getTranslation('slug', 'ar'),
                'en' => $this->getTranslation('slug', 'en'),
            ],

            'description' => [
                'ar' => $this->getTranslation('description', 'ar'),
                'en' => $this->getTranslation('description', 'en'),
            ],

            'price' => $this->price,
            'old_price' => $this->old_price,
            'sale_ends_at' => $this->sale_ends_at,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'category_id' => $this->category_id,

            'main_image' => new FileResource($this->whenLoaded('mainImage')),
            'file' => FileResource::collection($this->whenLoaded('media')),
        ];
    }
}
