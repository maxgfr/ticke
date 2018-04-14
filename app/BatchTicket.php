<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BatchTicket extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'batchtickets';

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
        'date', 'envoye', 'paye', 'restaurant_id'
    ];

    public function tickets()
    {
        return $this->hasMany(Tickets::class);
    }

    public function scopeFilter ($query, $id) {
        return $query->where('restaurant_id', $id);
    }

    public function scopeLast ($query) {
        return $query->max('id');
    }
}
