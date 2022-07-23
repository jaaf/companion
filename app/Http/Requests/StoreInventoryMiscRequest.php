<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventoryMiscRequest extends FormRequest
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
         'shared_m_id' => 'nullable|integer',
            'quantity' => 'numeric|required',
            'currency' => 'required|string',
            'price' => 'required|numeric',
            "locked"=>'array|nullable',
            "name"=> 'required|string|max:50',
            "category"=> 'required|string|max:25',
            "unit"=> 'required|string|max:10'
        ];
    }
}
