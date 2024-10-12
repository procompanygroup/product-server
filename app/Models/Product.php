<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'desc',
        'slug',
        'cost',
        'price',
        'discount',
        'discount_type',
        'code',
        'sku',
        'quantity',
        'instock',
        'rate',
        'is_new',
        'is_special',
        'hide_price',
        'is_new_enddate',
        'is_special_enddate',
        'sequence',
        'is_active',
        'keywords',

    ];
  
    public function brandsproducts(): HasMany
       {
           return $this->hasMany(BrandProduct::class,'product_id');
       }
    
}
