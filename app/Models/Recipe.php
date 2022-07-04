<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory; 
    protected $casts = [
        'fermentables'=>'array',
        'hops'=>'array',
       
    ];
    protected $fillable=[
        'user_id',
        'name',
        'author',
        'type',
        'batch_volume',
        'boil_time',
        'equipment',
        'original_gravity',
        'bitterness',
        'fermentables',
        'hops',
        'calculations'

    ];
}
