<?php

namespace Dcs\Recette\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RctForchetteTax extends Model
{
use SoftDeletes;
    protected $table ='rct_forchette_taxes';
    protected $casts = [
        'ref_emplacement_activite_id' => 'int',
        'ref_taille_activite_id' => 'int',
        'ref_categorie_activite_id' => 'int'
    ];

    protected $fillable = [
        'ref_emplacement_activite_id',
        'ref_taille_activite_id',
        'ref_categorie_activite_id'
    ];
    public function ref_categorie_activite(): BelongsTo
    {
        return $this->belongsTo(RctCategorieActivite::class);
    }

    public function ref_emplacement_activite() :BelongsTo
    {
        return $this->belongsTo(RctEmplacementActivite::class);
    }

    public function ref_taille_activite():BelongsTo
    {
        return $this->belongsTo(RctTailleActivite::class);
    }
    
}
