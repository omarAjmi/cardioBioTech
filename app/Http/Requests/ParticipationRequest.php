<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParticipationRequest extends FormRequest
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
            'participation' => 'required|file|mimes:pdf,docx'
        ];
    }

    /**
     * returns the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'participation.required' => 'Champ requis',
            'participation.mimes' => 'Le fichier doit être au format: pdf, docx',
        ];
    }
}
