<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketEntity extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ticket_entity';

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
        'value'
    ];

    public function repartition()
    {
        return $this->belongsTo(RepartitionEntity::class);
    }
}
