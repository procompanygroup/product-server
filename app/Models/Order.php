<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'num',
        'status_id',
        'client_id',
        'address_id',
        'amount',
        'discount',
        'discount_type',
        'payment_id',
    ];
}
