<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'status',
        'user_id',
        'total_price',
        'customer_data',
        'payment_method',
        'delivery_method',
    ];

    protected $casts = [
        'customer_data' => 'array',
    ];

    public function entries()
    {
        return $this->hasMany(OrderEntry::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
