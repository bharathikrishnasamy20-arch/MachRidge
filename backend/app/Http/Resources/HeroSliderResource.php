<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class HeroSliderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'description' => $this->description,
            'btn_text' => $this->btn_text,
            'btn_link' => $this->btn_link,
            'btn2_text' => $this->btn2_text,
            'btn2_link' => $this->btn2_link,
            'image' => $this->image ? (str_starts_with($this->image, 'http') ? $this->image : Storage::url($this->image)) : null,
            'bg_image' => $this->bg_image ? (str_starts_with($this->bg_image, 'http') ? $this->bg_image : Storage::url($this->bg_image)) : null,
            'overlay_opacity' => $this->overlay_opacity,
            'order' => $this->order,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
