<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
    protected $table = 'notifications';

    protected $fillable = [
        'context', 'seen', 'participation_id'
    ];

    public function participation()
    {
        return $this->belongsTo(Participation::class, 'participation_id', 'id');
    }
}
