<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryHop extends Model
{
    use HasFactory
    ;protected $fillable =["user_id",'shared_y_id',"quantity","price","currency","name","supplier","code","form","purpose","alpha","harvest","aromas","alternatives","notes"];
}
