<?php

namespace Dcs\Recette\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForchetRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules() : array
    {
        return [
            'categorie' => 'required',
            'taille' => 'required',
            'emplacement' => 'required',
            'montant' => 'required'

        ];
    }
}
