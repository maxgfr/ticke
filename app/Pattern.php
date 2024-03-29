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
        'nom', 'users_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function repartition()
    {
        return $this->hasMany(Repartition::class);
    }

    public function batch()
    {
        return $this
            ->belongsToMany('App\Entity', 'batch')
            ->withPivot('date')
            ->withPivot('id')
            ->withTimestamps();
    }

    public function scopeNom ($query, $nom) {
        return $query->where('nom', 'LIKE', $nom);
    }
}
