<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SponsorsRequest extends FormRequest
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
            'sponsor' => 'required|file|mimes:png,jpeg,jpg|dimensions:max_width=500,max_height=500',
            'name' => 'required',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'sponsor.required' => 'Champ requis',
            'name.required' => 'Champ requis',
            'sponsor.mimes' => 'devrait être de type png, jpeg, jpg',
            'sponsor.dimensions' => 'devrait être aux max 250/250 px',
        ];
    }


}
