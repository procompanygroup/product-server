<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionOrderProduct extends Model
{
    use HasFactory;
    protected $table = 'options_order_product';
    protected $fillable = [
        
'option_group_id',
'property_id',
'option_id',
'name',
'code',
'value',
'value_int',
'type',
'property_id',

    ];
}
