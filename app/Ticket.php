<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tickets';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'numero_titre', 'cle_cryptage', 'valeur',
        'emetteur', 'cle_controle', 'code_famille',
        'produit', 'millesime', 'batchticket_id', 'ligne'
    ];

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function scopeFilter ($query, $id) {
        return $query->where('batchticket_id', $id);
    }

    public function scopeLigne ($query, $ligne) {
        return $query->where('ligne', 'LIKE', $ligne);
    }
}
