<?php

namespace Dcs\Recette\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RctDetailsPayement extends Model
{
    use SoftDeletes;

    protected $table ='rct_details_payements';
    protected $casts = [
        'payement_id' => 'int',
        'montant' => 'float'
    ];

    protected $fillable = [
        'payement_id',
        'montant',
        'description'
    ];

    public function payement() :BelongsTo
    {
        return $this->belongsTo(RctPayement::class);
    }
}
