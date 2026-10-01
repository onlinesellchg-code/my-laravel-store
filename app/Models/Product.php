<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'category',
        'emoji',
        'image',
        'price',
        'old_price',
        'stock',
        'is_active',
    ];

    protected $casts = [
        'price' => 'integer',
        'old_price' => 'integer',
        'stock' => 'integer',
        'is_active' => 'boolean',
    ];
}
