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

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'products_categories');
    }

        public function tags()
    {
        return $this->belongsToMany(Tag::class, 'products_tags');
    }
}
