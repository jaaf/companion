<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFermentableRequest extends FormRequest
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


    protected function prepareForValidation()
    {
        
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|string|max:50',
            'brand_id'=>'required|integer',
            'form'=>'required|string|max:50',
            'type'=>'required|string|max:50',
            'raw_ingredient'=>'required|string|max:25',
            'potential'=>'required|numeric|max:100|min:0',
            'color'=>'required|numeric|max:5000|min:0',
            'diastatic_power'=>'nullable|numeric|max:300|min:0',
            'ph'=>'nullable|numeric|min:4|max:8',
            'link'=>'nullable|string',
            'log'=>'string|nullable'
            
        ];
    }
}
