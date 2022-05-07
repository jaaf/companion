<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model
{
    use HasFactory;
      protected $casts = [
        'brands_fermentable' => 'array',
        'raw_ingredients_fermentable'=>'array',
        'types_fermentable'=>'array'
    ];
    protected $fillable=[
        'user_id',
        'brands_fermentable',
        'types_fermentable',
        'raw_ingredients_fermentable',
        'fermentable_mass',
        'hop_mass',
        'volume',
        'temperature',
        'gravity',
        'color',
        'potential',
        'currency'

    ];
}
