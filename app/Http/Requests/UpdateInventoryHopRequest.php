<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInventoryHopRequest extends FormRequest
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
            'user_id' => 'required|integer',
            'shared_h_id' => 'nullable|integer',
            'quantity' => 'numeric|required',
            'currency' => 'required|string',
            'price' => 'required|numeric',
            "locked"=>'array|nullable',
            "name"=> 'required|string|max:50',
              "supplier"=> 'required|string|max:50',
            "code"=> 'required|string|max:10',
            "form"=> 'required|string|max:25',
            "purpose"=>'required|string|max:25',
            'alpha'=>'required|numeric|max:100|min:0',
            "harvest"=>'required|integer|min:2020',
            "aromas"=>'string|nullable',
            "alternatives"=>'string|nullable',
            "notes"=>'string|nullable',
            'log'=>'string|nullable'
        ];
    }
}
