<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImagesRequest extends FormRequest
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
            'files' => 'required',
            'files.*' => 'file|mimes:png,jpeg,jpg|dimensions:min_width=700,min_height=500'
        ];
    }

    public function messages()
    {
        return [
            'files.required' => 'Champ requis',
            'files.*.dimensions' => 'devrait être aux min 700/500 px',
        ];
    }
}
