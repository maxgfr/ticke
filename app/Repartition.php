<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repartition extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'repartition';

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
        'total'
    ];

    public function enitity()
    {
        return $this->belongsTo(Pattern::class);
    }
}
