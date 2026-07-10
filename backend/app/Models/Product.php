<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'category_id',
        'image',
        'gallery',
        'specifications',
        'applications',
        'industries_served',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
        'featured',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'gallery' => 'array',
            'specifications' => 'array',
            'status' => 'boolean',
            'featured' => 'boolean',
            'order' => 'integer',
        ];
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
