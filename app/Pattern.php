<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pattern extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pattern';

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
        'total_number', 'nom'
    ];

    public function scopeNom ($query, $nom) {
        return $query->where('nom', 'LIKE', $nom);
    }
}
