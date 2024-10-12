<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    use HasFactory;
    protected $table = 'products_options';
    protected $fillable = [
        'product_id',
        'property_id',
        'option_id',
    ];
}
