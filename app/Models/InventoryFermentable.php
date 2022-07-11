<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryFermentable extends Model
{
   protected $casts = [
    'brand_id'=>'integer',
    'shared_f_id'=>'integer',
    'user_id'=>'integer',
        'quantity'=>'float',
        'price'=>'float',
        'potential'=>'float',
        'color'=>'float',
        'diastatic_power'=>'float',
        'ph'=>'float'
       
    ];

    use HasFactory;
    protected $fillable =['user_id','shared_f_id',"quantity","price","currency","locked","name","brand_id","form","type","raw_ingredient","potential","color","diastatic_power","ph","link"];
}
