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
//        dd($this);
        return [
            'title' => 'required',
            'fullname' => 'required',
            'image' => 'required|file|mimes:png,jpg,jpeg',
            'commitee' => 'required'
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
            'title.required' => 'Champ requis',
            'fullname.required' => 'Champ requis',
            'image.required' => 'Champ requis',
            'image.mimes' => 'doit être de type:png,jpg,jpeg',
            'commitee.required' => 'Champ requis',
        ];
    }
}
