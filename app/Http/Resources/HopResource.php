<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HopResource extends JsonResource
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
            "name"=> $this->name,
            "supplier"=>$this->supplier,
            "code"=> $this->code,
            "form"=>$this->form,
            "purpose"=>$this->purpose,
            'alpha'=>$this->alpha,
            "harvest"=>$this->harvest,
            "aromas"=>$this->aromas,
            "alternatives"=>$this->alternatives,
            "notes"=>$this->notes,
             'log'=>$this->log,
            'created_at' => (new \DateTime($this->created_at))->format('Y-m-d H:i:s'),
            'updated_at' => (new \DateTime($this->updated_at))->format('Y-m-d H:i:s')
        ];
    }
}
