<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Image extends Model
{
    protected $fillable = [
        'url',
        'alt_text',
    ];


    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'products_images');
    }
}
