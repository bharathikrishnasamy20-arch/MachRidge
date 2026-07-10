<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'short_description' => $this->short_description,
            'category_id' => $this->category_id,
            'category' => new ProductCategoryResource($this->whenLoaded('category')),
            'image' => $this->image ? (str_starts_with($this->image, 'http') ? $this->image : Storage::url($this->image)) : null,
            'gallery' => $this->gallery ? array_map(fn($img) => (str_starts_with($img, 'http') ? $img : Storage::url($img)), is_array($this->gallery) ? $this->gallery : json_decode($this->gallery, true) ?? []) : [],
            'specifications' => $this->specifications,
            'applications' => $this->applications,
            'industries_served' => $this->industries_served,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
            'status' => $this->status,
            'featured' => $this->featured,
            'order' => $this->order,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
