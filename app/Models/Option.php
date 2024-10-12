<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $table = 'options';
    protected $fillable = [        
'name',
'code',
'is_active',
'value',
'value_int',
'type',
'property_id',
    ];
}
