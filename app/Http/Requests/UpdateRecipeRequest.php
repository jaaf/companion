<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRecipeRequest extends FormRequest
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
    {return [
            'name'=>'required|string',
            'author'=>'required|string',
            'type'=>'required|string',
        'batch_volume'=>'required|numeric',
        'boil_time'=>'required|numeric|min:30',
        'equipment'=>'required|integer',
        'original_gravity'=>'required|numeric',
        'bitterness'=>'required|numeric',
            'fermentables'=>'array|nullable',
            'hops'=>'array|nullable',
            'yeasts'=>'array|nullable',
            'calculations'=>'json|nullable'
        ];
    }
}
