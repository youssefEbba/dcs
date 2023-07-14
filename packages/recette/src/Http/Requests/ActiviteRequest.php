<?php

namespace Dcs\Recette\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActiviteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'libelle' => 'required|max:255|unique:rct_activites,libelle,'.$this->id,
            'libelle_ar' => 'required',
            'categorie' => 'required',

        ];
    }
}
