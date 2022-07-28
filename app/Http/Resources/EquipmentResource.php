<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EquipmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            
            'id'=>$this->id,
            'user_id'=>$this->user_id,
            "name"=>$this->name,
            "type"=>$this->type,
            "hop_absorption"=>$this->hop_absorption,
            "altitude"=>$this->altitude,
            "grain_absorption"=>$this->grain_absorption,
            "mash_tun_capacity"=>$this->mash_tun_capacity,
            "mash_tun_undergrain_volume"=>$this->mash_tun_undergrain_volume,
            "mash_tun_retention"=>$this->mash_tun_retention,
            "mash_tun_thermal_losses"=>$this->mash_tun_thermal_losses,
            "mash_tun_heat_capacity_equiv"=>$this->mash_tun_heat_capacity_equiv,
            "mash_thickness"=>$this->mash_thickness,
            "mash_efficiency"=>$this->mash_efficiency,
            "boiler_capacity"=>$this->boiler_capacity,
            "boiler_retention"=>$this->boiler_retention,
            "boiler_evaporation_rate"=>$this->boiler_evaporation_rate,
            "fermenter_capacity"=>$this->fermenter_capacity,
            "fermenter_retention"=>$this->fermenter_retention,
            "k_mash_hopping"=>$this->k_mash_hopping,
            "k_first_wort_hopping"=>$this->k_first_wort_hopping,
            "k_boil_hopping"=>$this->k_boil_hopping,
            "k_hop_stand_hopping"=>$this->k_hop_stand_hopping,
            "k_dry_hopping"=>$this->k_dry_hopping,
            'created_at' => (new \DateTime($this->created_at))->format('Y-m-d H:i:s'),
            'updated_at' => (new \DateTime($this->updated_at))->format('Y-m-d H:i:s')

        ];
    }
}
