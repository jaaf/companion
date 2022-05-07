<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInventoryFermentableRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {

        return [
            'id' => 'integer|nullable',
            'user_id' => 'required|integer',
            'shared_f_id' => 'nullable|integer',
            'quantity' => 'numeric|required',
            'currency' => 'required|string',
            'price' => 'required|numeric',
            'name' => 'required|string|max:50',
            'brand_id' => 'required|integer',
            'form' => 'required|string|max:50',
            'type' => 'required|string|max:50',
            'raw_ingredient'=>'required|string|max:25',
            'potential' => 'required|numeric|max:100|min:1',
            'color' => 'required|numeric|max:5000|min:0',
            'diastatic_power' => 'nullable|numeric|max:300|min:0',
            'ph' => 'nullable|numeric|min:4|max:8',
            'link' => 'nullable|string',

        ];
    }
}
