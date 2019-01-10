<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'files' => 'required',
            'files.*' => 'file|mimes:mp4,mov,ogg|max:20480',
            'title' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'files.required' => 'Champ requis',
            'files.*.mimes' => 'devrait être de type mp4,mov,ogg',
            'files.*.max' => 'devrait être de taille aux max 20MB',
            'title.required' => 'Champ requis',
        ];
    }
}
