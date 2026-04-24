<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'sort_order', 'tier', 'name', 'tagline',
        'price_min', 'price_max', 'delivery',
        'features', 'is_featured', 'button_text', 'is_active',
    ];

    protected $casts = [
        'features'    => 'array',
        'is_featured' => 'boolean',
        'is_active'   => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }
}
