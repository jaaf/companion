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
        'fermentables_withdrawn',
        'hops_withdrawn',
        'type',
        'batch_volume',
        'boil_time',
        'equipment',
        'mash_efficiency',
        'original_gravity',
        'bitterness',
        'fermentables',
        'hops'

    ];
}
