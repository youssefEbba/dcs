<?php

namespace Dcs\Recette\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayementRequest extends FormRequest
{
    public function authorize() :bool
    {
        return true;
    }

    public function rules() :array
    {
        return [
            'libelle' => 'required|max:255|unique:rct_payements,libelle,'.$this->id,
            'date' => 'required',
            'montant' => 'required',
        ];
    }
}
