<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrewRequest extends FormRequest
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
            'name' => 'required|string',
            'author' => 'string|nullable',
            'state'=>'required|string',
            'fermentables_withdrawn'=>'required|boolean',
            'hops_withdrawn'=>'required|boolean',
            'type' => 'required|string',
            'batch_volume' => 'required|numeric',
            'boil_time' => 'required|numeric',
            'equipment' => 'required|integer',
            'mash_efficiency' => 'required|numeric',
            'original_gravity' => 'required|numeric',
        'bitterness'=>'required|numeric',
            'fermentables' => 'array|nullable',
            'hops' => 'array|nullable'
        ];
    }
}
