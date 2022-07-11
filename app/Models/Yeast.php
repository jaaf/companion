<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yeast extends Model
{
    use HasFactory;
    protected $fillable =[
        
        "name",
        "manufacturer",
        "unit",
        "cells_per_unit",
        "target",
        "form",
        "ideal_min_temperature",
        "ideal_max_temperature",
        "min_temperature",
        "max_temperature",
        "floculation",
        "alcool_tolerance",
        "attenuation",
        "notes",
        "link",
        "log"

    ];
}
