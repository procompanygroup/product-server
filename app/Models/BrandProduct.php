<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
 
class BrandProduct extends Model
{
    use HasFactory;
    protected $table = 'brands_products';
    protected $fillable = [
        'product_id',
        'brand_id',
        ];

 
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id')->withDefault();
    }
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id')->withDefault();
    }
}
