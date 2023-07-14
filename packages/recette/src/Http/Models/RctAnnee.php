<?php

namespace Dcs\Recette\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RctAnnee extends  Model
{
    use SoftDeletes;


    protected $casts = [
        'etat' => 'int'
    ];

    protected $fillable = [
        'annee',
        'etat'
    ];
}
