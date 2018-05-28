<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BatchPattern extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'batch';

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
        'date'
    ];

    public function ticket()
    {
        return $this->hasMany(TicketEntity::class, 'batch_pattern_id');
    }

    public function pattern()
    {
        return $this->belongsTo(Pattern::class);
    }

    public function scopeFilter ($query, $id) {
        return $query->where('pattern_id', $id);
    }

    public function scopeLast ($query) {
        return $query->max('id');
    }
}
