<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class YeastResource extends JsonResource
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
              "id"=>$this->id,
              "name"=>$this->name, 
              "manufacturer"=>$this->manufacturer,
              "unit"=>$this->unit,
              "cells_per_unit"=>$this->cells_per_unit,
              "target"=>$this->target,
              "form"=>$this->form,
              "ideal_min_temperature"=>$this->ideal_min_temperature,
              "ideal_max_temperature"=>$this->ideal_max_temperature,
              "min_temperature"=>$this->min_temperature,
              "max_temperature"=>$this->max_temperature,
              "floculation"=>$this->floculation,
              "alcool_tolerance"=>$this->alcool_tolerance,
              "attenuation"=>$this->attenuation,
             "notes"=>$this->notes,
             "link"=>$this->link,
             "log"=>$this->log,
              'created_at' => (new \DateTime($this->created_at))->format('Y-m-d H:i:s'),
            'updated_at' => (new \DateTime($this->updated_at))->format('Y-m-d H:i:s')
        ];
    }
}
