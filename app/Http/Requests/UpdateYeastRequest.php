<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateYeastRequest extends FormRequest
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
        "id"=>'required|integer',   
        "name"=>'required|string|max:50',
        "manufacturer"=>'required|string|max:50',
        "unit"=>'required|string|max:25',
        "cells_per_unit"=>'required|numeric',
        "target"=>'required|string|max:50',
        "form"=>'required|string|max:25',
        "ideal_min_temperature"=>'required|numeric|min:2|max:40',
        "ideal_max_temperature"=>'required|numeric|min:2|max:40',
        "min_temperature"=>'required|numeric|min:2|max:40',
        "max_temperature"=>'required|numeric|min:2|max:40',
        "floculation"=>'required|string',
        "alcool_tolerance"=>'required|string',
        "attenuation"=>'required|numeric|max:100',
        "notes"=>'string|nullable',
        "link"=>'string|nullable',
        "log"=>'string|nullable'
        ];
    }
}
