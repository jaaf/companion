<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hop extends Model
{
    use HasFactory; 
    protected $fillable =["name","code","form","usage","alpha","harvest","log"];
}
