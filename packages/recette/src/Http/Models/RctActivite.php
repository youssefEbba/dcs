<?php

namespace Dcs\Recette\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class RctActivite extends Model
{
    use SoftDeletes;
protected  $table = 'rct_activites';
    protected $casts = [
        'ref_categorie_activite_id' => 'int'
    ];

    protected $fillable = [
        'ref_categorie_activite_id',
        'libelle',
        'libelle_ar'
    ];
    public function ref_categorie_activite(): BelongsTo
    {
        return $this->belongsTo(RctCategorieActivite::class, 'ref_categorie_activite_id');
    }

    public function  contribuables() :HasMany
    {
        return $this->hasMany(RctContribuable::class,'activite_id');
    }
}
