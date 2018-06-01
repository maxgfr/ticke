<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BigTicket extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bigticket';

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
        'bigvalue', 'batch_id'
    ];

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function repartition()
    {
        return $this
            ->belongsToMany('App\Repartition', 'ticket')
            ->withPivot('value')
            ->withTimestamps();
    }
}
