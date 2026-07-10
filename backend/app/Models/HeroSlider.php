<?php

namespace App\Models;

use Database\Factories\HeroSliderFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSlider extends Model
{
    /** @use HasFactory<HeroSliderFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'btn_text',
        'btn_link',
        'btn2_text',
        'btn2_link',
        'image',
        'bg_image',
        'overlay_opacity',
        'order',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'overlay_opacity' => 'decimal:2',
            'order' => 'integer',
            'status' => 'boolean',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
