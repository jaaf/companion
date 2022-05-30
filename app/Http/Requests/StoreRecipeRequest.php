<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecipeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|string',
            'author'=>'string|nullable',
            'fermentables'=>'array|nullable',
            'hops'=>'array|nullable'
        ];
    }
}
