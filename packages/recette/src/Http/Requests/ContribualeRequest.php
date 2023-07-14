<?php

namespace Dcs\Recette\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContribualeRequest extends FormRequest
{
    public function authorize() :bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'libelle' => 'required|max:255|unique:rct_contribuables,libelle,'.$this->id,
            'emplacement' => 'required',
            'activite_id' => 'required',
            'taille' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'montant' => 'required',
            'date_mas' => 'required',
        ];
    }
}
