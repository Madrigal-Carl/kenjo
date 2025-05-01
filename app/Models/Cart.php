<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Cart extends Model
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'customer_id',
        'products'
    ];

    protected $casts = [
        'products' => 'array',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', '_id');
    }
}
