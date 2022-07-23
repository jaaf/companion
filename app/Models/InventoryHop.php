<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryHop extends Model
{
    use HasFactory
    ;
      protected $casts = [
        'shared_h_id' => 'integer',
        'user_id' => 'integer',
        'quantity' => 'float',
        'price' => 'float',
        'locked'=>'array',
        'alpha'=>'float'

    ];
    protected $fillable =["user_id",'shared_h_id',"quantity","price","currency","locked","name","supplier","code","form","purpose","alpha","harvest","aromas","alternatives","notes"];
}
