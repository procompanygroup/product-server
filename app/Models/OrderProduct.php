<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $table = 'orders_products';
    protected $fillable = [
        'product_id',
        'order_id',
        'option_group_id',
        'quantity',
        'unit_price',
        'amount',
        'discount',
        'discount_type',
    ];
}
