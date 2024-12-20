<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cropping extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'item_id',
        'field_id',
        'planting_date',
        'expected_yield',
        'yield_unit',
        'color',
    ];
}
