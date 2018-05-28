<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'entity';

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
        'nom', 'adr', 'users_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pattern()
    {
        return $this->hasMany(Pattern::class, 'entity_id');
    }
}
