<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommiteesRequest extends FormRequest
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
            'member' => 'required'
        ];
    }

    /**
     * Get the validation errors messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'member.required' => 'Champ requis'
        ];
    }
}
