<?php

namespace Dcs\Recette\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RctcontribuablesAnnee extends Model
{
    use SoftDeletes;
    protected  $table ='rct_contribuables_annees';
    protected $casts = ['contribuable_id' => 'int',];
    protected $fillable = ['annee', 'contribuable_id'];
    public function contribuables() : BelongsTo
    {
        return $this->belongsTo(RctContribuable::class);
    }
}
