<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InventoryMiscResource extends JsonResource
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
            "shared_m_id"=>$this->shared_m_id,
            "quantity"=>$this->quantity,
            "price"=>$this->price,
            "currency"=>$this->currency,
            "locked"=>$this->locked,
            "name"=> $this->name,
            "category"=>$this->category,
            "unit"=> $this->unit,
            'created_at' => (new \DateTime($this->created_at))->format('Y-m-d H:i:s'),
            'updated_at' => (new \DateTime($this->updated_at))->format('Y-m-d H:i:s')
        ];
    }
}