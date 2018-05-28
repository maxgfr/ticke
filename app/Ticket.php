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
    protected $table = 'ticket';

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
        'value', 'batch_id', 'repartition_id'
    ];

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function repartition()
    {
        return $this->belongsTo(Repartition::class);
    }
}
