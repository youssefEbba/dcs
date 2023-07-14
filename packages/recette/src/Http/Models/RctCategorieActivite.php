<?php

namespace Dcs\Recette\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class RctCategorieActivite extends  Model
{
use SoftDeletes;
    protected $fillable = [
        'libelle',
        'libelle_ar',
        'montant'
    ];

    public function contribuables(): HasMany
    {
        return $this->hasMany(RctContribuable::class ,'');
    }

    public function forchette_taxes():HasMany
    {
        return $this->hasMany(RctForchetteTax::class);
    }
}
