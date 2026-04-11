<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'is_active',
    ];

    public function images(): BelongsToMany
    {
        return $this->belongsToMany(Image::class, 'products_images');
    }
}
