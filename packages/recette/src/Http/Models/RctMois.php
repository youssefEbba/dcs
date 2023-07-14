<?php

namespace Dcs\Recette\Http\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class RctMois extends \Illuminate\Database\Eloquent\Model
{

    protected $casts = [];
    protected $fillable = ['libelle', 'libelle_ar'];
    public function payements() :HasMany
    {
        return $this->hasMany(RctPayement::class);
    }
}
