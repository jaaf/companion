<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryYeast extends Model
{
    use HasFactory; 
    protected $fillable =[
        "user_id",'shared_h_id',"quantity","price","currency","manufacturing_date",
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
        "link"

    ];
}
