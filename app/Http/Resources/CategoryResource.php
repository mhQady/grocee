<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\File\FileResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'files' => FileResource::collection($this->getMedia())
        ];
    }
}
