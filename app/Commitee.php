<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commitee extends Model
{
    protected $fillable = [
        'event_id', 'user_id'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }

    public function members()
    {
        return $this->hasMany(Member::class, 'commitee_id', 'id');
    }
}
