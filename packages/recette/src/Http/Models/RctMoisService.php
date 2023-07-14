<?php

namespace Dcs\Recette\Http\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Mpdf\Tag\B;

class RctMoisService extends \Illuminate\Database\Eloquent\Model
{

    protected $casts = ['mois_id' => 'int', 'contribuable_id' => 'int'];
    protected $fillable = ['mois_id', 'contribuable_id'];
    public function contribuable() : BelongsTo
    {
        return $this->belongsTo(RctContribuable::class);
    }

    public function mois():BelongsTo
    {
        return $this->belongsTo(RctMois::class);
    }
}
