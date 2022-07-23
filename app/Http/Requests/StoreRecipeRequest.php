<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecipeRequest extends FormRequest
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
            'type' => 'required|string',
            'batch_volume' => 'required|numeric|min:5',
            'boil_time' => 'required|numeric|min:45',
            'equipment' => 'required|integer',
            'original_gravity' => 'required|numeric',
            'bitterness'=>'required|numeric',
            'fermentables' => 'array|nullable',
            'hops' => 'array|nullable',
            'yeasts'=>'array|nullable',
            'miscs'=>'array|nullable',
            'rests'=>'array|nullable',
            'calculations'=>'json|nullable'
        ];
    }
    public function messages(){
        return [
           
            'boil_time.min'=>'the boil time must be at least 45 min.',
            'batch_volume.min'=>'The batch volume must be at least 5 liters (around 1.33 gallon).'
        ];
    }
}
