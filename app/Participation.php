<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    protected $fillable = [
        'participant_id', 'event_id', 'confirmation'
    ];

    public function participant()
    {
        return $this->belongsTo(App\User::class, 'user_id', 'id');
    }

    public function event()
    {
        return $this->belongsTo(App\Event::class, 'event_id', 'id');
    }
}
