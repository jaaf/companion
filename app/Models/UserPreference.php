<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model
{
    use HasFactory;
      protected $casts = [
        'codes_hop'=>'array',
        'forms_hop'=>'array',
        'purposes_hop'=>'array',
        'brands_fermentable' => 'array',
        'raw_ingredients_fermentable'=>'array',
        'types_fermentable'=>'array'
    ];
    protected $fillable=[
        'user_id',
        'codes_hop',
        'forms_hop',
        'purposes_hop',
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
        'diastatic_power',
        'currency'

    ];
}
