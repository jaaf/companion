<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hop extends Model
{
    use HasFactory; 
    protected $fillable =["name","supplier","code","form","purpose","alpha","harvest","aromas","alternatives","notes","log"];
}
