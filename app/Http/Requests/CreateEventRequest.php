<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEventRequest extends FormRequest
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
            'title' => 'required|string',
            'abbreviation' => 'required|string',
            'about' => 'required|string',
            'start_date' => 'required|date|after_or_equal:tomorrow',
            'organiser' => 'required|string',
            'dead_line' => 'required|date|after_or_equal:tomorrow',
            'end_date' => 'required|date|after_or_equal:start_date',
            'storage' => 'string',
            'program' => 'required|file|mimes:pdf,docx,txt',
            'sliders' => 'required|max:5',
            'sliders.*' => 'required|file|mimes:png,jpeg,jpg|dimensions:min_width=700,min_height=500',
            'state' => 'required|string',
            'city' => 'required|string',
            'street' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Champ requis',
            'abbreviation.required' => 'Champ requis',
            'about.required' => 'Champ requis',
            'organiser.required' => 'Champ requis',
            'start_date.required' => 'Champ requis',
            'start_date.date' => 'devrait être une date valide (A-M-J H: M: S)',
            'start_date.after_or_equal' => 'Ne devrait pas être moins que demain',
            'dead_line.required' => 'Champ requis',
            'dead_line.date' => 'devrait être une date valide (A-M-J H: M: S)',
            'dead_line.after_or_equal' => 'Ne devrait pas être moins que demain',
            'end_date.required' => 'Champ requis',
            'end_date.date' => 'devrait être une date valide (A-M-J H: M: S)',
            'end_date.after_or_equal' => 'Ne devrait pas être moins que demain',
            'program.required' => 'Champ requis',
            'program.mimes' => 'devrait être une fichier(pdf, docx, txt)',
            'sliders.required' => 'Champ requis',
            'sliders.max' => 'max 5 images',
            'sliders.*.mimes' => 'devrait être une fichier(png, jpeg, jpg)',
            'sliders.*.dimensions' => 'devrait être aux min 700/500 px',
            'state.required' => 'Champ requis',
            'city.required' => 'Champ requis',
            'street.required' => 'Champ requis',
        ];
    }
}
