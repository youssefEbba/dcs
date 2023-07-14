<?php

namespace Dcs\Recette\Http\Models;

use Dcs\Ref\Models\RefCommune;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class RctContribuable extends Model
{
    use SoftDeletes;


    protected $casts = [
        'activite_id' => 'int',
        'ref_emplacement_activite_id' => 'int',
        'ref_taille_activite_id' => 'int',
        'telephone' => 'int'
    ];
    protected $dates = [
        'date_mas'=>'date::d-m-Y'
    ];
    protected $fillable = [
        'activite_id',
        'ref_emplacement_activite_id',
        'ref_taille_activite_id',
        'libelle',
        'libelle_ar',
        'representant',
        'adresse',
        'telephone',
        'date_mas',
        'montant'
    ];
    public function ref_taille_activite(): BelongsTo
    {
        return $this->belongsTo(RctTailleActivite::class);
    }
    public function activite(): BelongsTo
    {
        return $this->belongsTo(RctActivite::class);
    }
    public function ref_emplacement_activite() :BelongsTo
    {
        return $this->belongsTo(RctEmplacementActivite::class);
    }


    public function mois_services() : HasMany
    {
        return $this->hasMany(RctMoisService::class);
    }
    public function payements() : HasMany
    {
        return $this->hasMany(RctPayement::class);
    }
    public function contribuables_annees() : HasMany
    {
        return $this->hasMany(RctcontribuablesAnnee::class);
    }

    public function ref_commune() {
        return $this->belongsTo(RefCommune::class);
    }
}
