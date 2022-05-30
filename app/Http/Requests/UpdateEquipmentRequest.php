<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEquipmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
       return [ 
           'id' => 'required|integer',
            'user_id'=>'required|integer',
            'name'=>'required|string',
            "type"=>'required|string',
            "hop_absorption"=>'required|numeric',
            "altitude"=>'required|numeric',
            "grain_absorption"=>'required|numeric',
            "mash_tun_capacity"=>'required|numeric',
            "mash_tun_undergrain_volume"=>'required|numeric',
            "mash_tun_retention"=>'required|numeric',
            "mash_tun_thermal_losses"=>'required|numeric',
            "mash_thickness"=>'required|numeric',
            "mash_efficiency"=>'required|numeric',
            "boiler_capacity"=>'required|numeric',
            "boiler_retention"=>'required|numeric',
            "boiler_evaporation_rate"=>'required|numeric',

            "fermenter_capacity"=>'required|numeric',
            "fermenter_retention"=>'required|numeric',
            "k_mash_hopping"=>'numeric|nullable',
            "k_first_wort_hopping"=>'numeric|nullable',
            "k_boil_hopping"=>'numeric|nullable',
            "k_hop_stand_hopping"=>'numeric|nullable',
            "k_dry_hopping"=>'numeric|nullable'

        ];
    }
}
