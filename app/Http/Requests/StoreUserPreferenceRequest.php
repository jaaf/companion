<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserPreferenceRequest extends FormRequest
{


   protected function prepareForValidation()
    {
        $user=auth('sanctum')->user();
         $this->merge([
            'user_id' => $user->id// $this->user()->id
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
     * @return array
     */
    public function rules()
    {
        return [
            'codes_hop'=>'array|nullable',
            'forms_hop'=>'array|nullable',
            'usages_hop'=>'array|nullable',
            'brands_fermentable'=>'array|nullable',
            'types_fermentable'=>'array|nullable',
            'raw_ingredients_fermentable'=>'array|nullable',
            'fermentable_mass'=>'string|nullable',
            'hop_mass'=>'string|nullable',
            'volume'=>'string|nullable',
            'temperature'=>'string|nullable',
             'gravity'=>'string|nullable',
             'color'=>'string|nullable',
             'potential'=>'string|nullable',
             'diastatic_power'=>'string|nullable',
             'currency'=>'string|nullable'

        ];
    }
}
