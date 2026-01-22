<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'available_at',
    ];

    protected $casts = [
        'available_at' => 'date',
    ];
}
