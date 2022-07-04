<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BrewResource extends JsonResource
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
        'name'=>$this->name,
        'author'=>$this->author,
        'state'=>$this->state,
        'fermentables_checked'=>$this->fermentables_checked,
        'hops_checked'=>$this->hops_checked,
        'type'=>$this->type,
        'batch_volume'=>$this->batch_volume,
        'boil_time'=>$this->boil_time,
        'equipment'=>$this->equipment,
        'original_gravity'=>$this->original_gravity,
        'bitterness'=>$this->bitterness,
        'fermentables'=>$this->fermentables,
        'hops'=>$this->hops,
        'calculations'=>$this->calculations,
        'achievements'=>$this->achievements,

            'created_at' => (new \DateTime($this->created_at))->format('Y-m-d H:i:s'),
            'updated_at' => (new \DateTime($this->updated_at))->format('Y-m-d H:i:s')
        ];
    }
}
