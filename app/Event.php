<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'abbreviation', 'about', 'startDate', 'endDate', 'address', 'storage',
    ];

    public function participations()
    {
        return $this->hasMany(App\Participation::class, 'id', 'event_id');
    }

    public function participants()
    {
        return $this->hasMany(App\User::class, 'id', 'user_id');
    }
}
