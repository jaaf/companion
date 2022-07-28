<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    protected $fillable=['user_id',"name","type","hop_absorption","altitude","grain_absorption","mash_tun_capacity","mash_tun_undergrain_volume","mash_tun_retention","mash_tun_thermal_losses","mash_tun_heat_capacity_equiv","mash_thickness","mash_efficiency","boiler_capacity","boiler_retention","boiler_evaporation_rate","fermenter_capacity","fermenter_retention","k_mash_hopping","k_first_wort_hopping","k_boil_hopping","k_hop_stand_hopping","k_dry_hopping"];
}
