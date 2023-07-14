<?php

namespace Dcs\Recette\Http\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class RctTailleActivite extends \Illuminate\Database\Eloquent\Model
{
use SoftDeletes;
    protected $fillable = [
        'libelle',
        'libelle_ar'
    ];

    public function contribuables(): HasMany
    {
        return $this->hasMany(RctContribuable::class ,'ref_taille_activite_id');
    }

    public function forchette_taxes():HasMany
    {
        return $this->hasMany(RctForchetteTax::class);
    }
}
