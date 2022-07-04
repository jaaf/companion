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
       
    ];
    protected $fillable=[
        'user_id',
        'name',
        'author',
        'state',
        'fermentables_checked',
        'hops_checked',
        'type',
        'batch_volume',
        'boil_time',
        'equipment',
        'original_gravity',
        'bitterness',
        'fermentables',
        'hops',
        'calculations',
        'achievements'

    ];
}
