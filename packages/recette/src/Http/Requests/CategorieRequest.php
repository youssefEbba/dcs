<?php

namespace Dcs\Recette\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategorieRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'libelle' => 'required|max:255|unique:rct_categorie_activites,libelle,'.$this->id,
            'libelle_ar' => 'required',
            'montant' => 'required',

        ];
    }
}
