<?php

namespace Dcs\Recette\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RctPayement extends Model
{

    protected $casts = ['mois_id' => 'int',
        'contribuable_id' => 'int',
        'etat' => 'int',
        'montant' => 'float',
        'montant_arriere' => 'float'
    ];

    protected $dates = [
        'date'=>'date::d-m-Y'
    ];

    protected $fillable = [
        'libelle',
        'libelle_ar',
        'annee',
        'mois_id',
        'contribuable_id',
        'etat',
        'montant',
        'montant_arriere',
        'date'
    ];

    public function contribuable() :BelongsTo
    {
        return $this->belongsTo(RctContribuable::class,'contribuable_id');
    }

    public function mois() : BelongsTo
    {
        return $this->belongsTo(RctMois::class);
    }

    public function details_payements():HasMany
    {
        return $this->hasMany(RctDetailsPayement::class);
    }


}
