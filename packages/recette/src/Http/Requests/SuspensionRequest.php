<?php

namespace Dcs\Recette\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuspensionRequest extends FormRequest {
    public function authorize() : bool
    {
        return true;
    }

    public function rules() : array
    {
        return [
            'mois1' => 'required',
            'mois2' => 'required'
        ];
    }
}
