<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BrewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *savesavesave
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       return [
         'id' => $this->id,
        'user_id'=>$this->user_id,
        'name'=>$this->name,
        'author'=>$this->author,
        'state'=>$this->state,
        'type'=>$this->type,
        'batch_volume'=>$this->batch_volume,
        'boil_time'=>$this->boil_time,
        'equipment'=>$this->equipment,
        'temperature_transition'=>$this->temperature_transition,
        'decoction_fraction'=>$this->decoction_fraction,
        'grain_temperature'=>$this->grain_temperature,
        'added_water_temperature'=>$this->added_water_temperature,
        'original_gravity'=>$this->original_gravity,
        'bitterness'=>$this->bitterness,
        'fermentables'=>$this->fermentables,
        'hops'=>$this->hops,
        'yeasts'=>$this->yeasts,
        'miscs'=>$this->miscs,
        'rests'=>$this->rests,
        'calculations'=>$this->calculations,
        'achievements'=>$this->achievements,

            'created_at' => (new \DateTime($this->created_at))->format('Y-m-d H:i:s'),
            'updated_at' => (new \DateTime($this->updated_at))->format('Y-m-d H:i:s')
        ];
    }
}
