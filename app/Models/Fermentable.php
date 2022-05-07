<?php

namespace App\Models;

use App\Models\FermentableBrand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fermentable extends Model
{
    use HasFactory;
    protected $fillable =["name","brand_id","form","type","raw_ingredient","potential","color","diastatic_power",'ph','link','log'];

    public function fermentable_brand(){
        return $this->hasOne(FermentableBrand::class,'id','brand_id');
    }
}
