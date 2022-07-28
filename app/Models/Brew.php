<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brew extends Model
{
    use HasFactory;
    protected $casts = [
        'fermentables'=>'array',
        'hops'=>'array',
        'yeasts'=>'array',
        'miscs'=>'array',
        'rests'=>'array'
       
    ];
    protected $fillable=[
        'user_id',
        'name',
        'author',
        'state',
        'type',
        'batch_volume',
        'boil_time',
        'equipment',
        'temperature_transition',
        'decoction_fraction',
        'grain_temperature',
        'added_water_temperature',
        'original_gravity',
        'bitterness',
        'fermentables',
        'hops',
        'yeasts',
        'miscs',
        'rests',
        'calculations',
        'achievements'

    ];
}
