<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderP extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_image',
        'product_price',
        'product_stock',
        'user_id',
        'email',
        'shipping_method',
        'payment_method',
        'address',
    ];
}
