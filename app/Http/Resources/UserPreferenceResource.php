<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserPreferenceResource extends JsonResource
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
            'id' => $this->id,
            'user_id'=>$this->user_id,
            'brands_fermentable'=>$this->brands_fermentable, 
            'types_fermentable'=>$this->types_fermentable,
            
            'raw_ingredients_fermentable'=>$this->raw_ingredients_fermentable,
            'fermentable_mass'=>$this->fermentable_mass,
            'hop_mass'=>$this->hop_mass,
            'volume'=>$this->volume,
            'temperature'=>$this->temperature,
            'gravity'=>$this->gravity,
            'color'=>$this->color,
            'potential'=>$this->potential,
            'diastatic_power'=>$this->diastatic_power,
            'currency'=>$this->currency,
            'created_at' => (new \DateTime($this->created_at))->format('Y-m-d H:i:s'),
            'updated_at' => (new \DateTime($this->updated_at))->format('Y-m-d H:i:s')
        ];
    }
}
