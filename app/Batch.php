<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
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
        'date', 'pattern_id'
    ];

    public function ticket()
    {
        return $this->hasMany(Ticket::class, 'batch_id');
    }

    public function pattern()
    {
        return $this->belongsTo(Pattern::class);
    }

    public function repartition()
    {
        return $this
            ->belongsToMany('App\Repartition', 'ticket')
            ->withPivot('value')
            ->withTimestamps();
    }

    public function scopeFilter ($query, $id) {
        return $query->where('pattern_id', $id);
    }

    public function scopeLast ($query) {
        return $query->max('id');
    }
}