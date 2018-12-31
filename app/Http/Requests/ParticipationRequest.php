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
            'title' => 'required',
            'affiliation' => 'required',
            'authors' => 'required',
            'session' => 'required',
            'abstract' => 'required|file|mimes:doc,pdf,docx',
            'participation' => 'required|file|mimes:doc,pdf,docx'
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
            'title.required' => 'Champ requis',
            'affiliation.required' => 'Champ requis',
            'session.required' => 'Champ requis',
            'participation.required' => 'Champ requis',
            'participation.mimes' => 'Le fichier doit être au format: pdf, docx, doc',
            'abstract.mimes' => 'Le fichier doit être au format: pdf, docx, doc',
        ];
    }
}
