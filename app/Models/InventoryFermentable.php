<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryFermentable extends Model
{
    use HasFactory;
    protected $fillable =['user_id','shared_f_id',"quantity","price","currency","name","brand_id","form","type","raw_ingredient","potential","color","diastatic_power","ph","link"];
}
