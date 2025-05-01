<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use MongoDB\Laravel\Eloquent\Model;

class Order extends Model
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'customer_id',
        'products',
        'total_amount',
        'status'
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', '_id');
    }
}
