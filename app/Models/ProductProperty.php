<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductProperty extends Model
{
    use HasFactory;
    protected $table = 'products_properties';
    protected $fillable = [
        'product_id',
'property_id',
    ];
}
