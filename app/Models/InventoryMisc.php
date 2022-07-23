<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryMisc extends Model
{
    use HasFactory;
     protected $casts = [
        'shared_m_id' => 'integer',
        'user_id' => 'integer',
        'quantity' => 'float',
        'price' => 'float',
        'locked'=>'array',

    ];
    protected $fillable =["user_id",'shared_m_id',"quantity","price","currency","locked","name","category","unit"];
}

