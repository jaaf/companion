<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class InventoryFermentableResource extends JsonResource
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
            "id" => $this->id,
            "user_id"=>$this->user_id,
            "shared_f_id"=>$this->shared_f_id,
            "quantity"=>$this->quantity,
            "currency"=>$this->currency,
            "price"=>$this->price,
            'locked'=>$this->locked,
            "name" => $this->name,
            "brand_id" => $this->brand_id,
            "form" => $this->form,
            "type" => $this->type,
            "raw_ingredient"=>$this->raw_ingredient,
            "potential" => $this->potential,
             "color" => $this->color, 
             "diastatic_power" => $this->diastatic_power,
                          'ph'=>$this->ph,
             'link'=>$this->link,
             "created_at" => (new \DateTime($this->created_at))->format("Y-m-d H:i:s"),
            "updated_at" => (new \DateTime($this->updated_at))->format("Y-m-d H:i:s")
        ];
    }
}
