<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InventoryHopResource extends JsonResource
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
            "user_id"=>$this->user_id,
            "shared_h_id"=>$this->shared_h_id,
            "quantity"=>$this->quantity,
            "price"=>$this->price,
            "currency"=>$this->currency,
            "name"=> $this->name,
            "code"=> $this->code,
            "form"=>$this->form,
            "usage"=>$this->usage,
            'alpha'=>$this->alpha,
            "harvest"=>$this->harvest,
            'created_at' => (new \DateTime($this->created_at))->format('Y-m-d H:i:s'),
            'updated_at' => (new \DateTime($this->updated_at))->format('Y-m-d H:i:s')
        ];
    }
}
