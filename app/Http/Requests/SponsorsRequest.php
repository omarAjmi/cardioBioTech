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
            'sponsors' => 'required',
            'sponsors.*' => 'file|mimes:png,jpeg,jpg|dimensions:max_width=250,max_height=250'
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
            'sponsors.required' => 'Champ requis',
            'sponsors.*.dimensions' => 'devrait être aux max 250/250 px',
        ];
    }


}
