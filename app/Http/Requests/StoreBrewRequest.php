<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrewRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $user = auth('sanctum')->user();
        $this->merge([
            'user_id' => $user->id // $this->user()->id
        ]);
    }
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
            'name' => 'required|string',
            'author' => 'string|nullable',
            'state'=>'required|string',
            'type' => 'required|string',
            'batch_volume' => 'required|numeric',
            'boil_time' => 'required|numeric',
            'equipment' => 'required|json',
            'temperature_transition'=>'string|max:15|nullable',
            'decoction_fraction'=>'numeric|max:0.5|min:0|nullable',
            'grain_temperature'=>'numeric|min:0|max:50|nullable',
            'added_water_temperature'=>'numeric|min:40|max:102|nullable',
            'original_gravity' => 'required|numeric',
        'bitterness'=>'required|numeric',
            'fermentables' => 'array|nullable',
            'hops' => 'array|nullable',
            'yeasts'=>'array|nullable',
             'miscs'=>'array|nullable',
             'rests'=>'array|nullable',
            'calculations'=>'json|nullable',
            'achievements'=>'json|nullable'
        ];
    }
}
