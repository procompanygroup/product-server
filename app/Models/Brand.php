<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';
    protected $fillable = [
        'name',
        'image',
    ];
    public function brandsproducts(): HasMany
    {
        return $this->hasMany(BrandProduct::class,'product_id');
    }
}
