<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
    public const NEW_PARTICIPATION = ' a demandé une participation à l\'évènement à venir';
    public const UPDATE_PARTICIPATION = ' a mis à jour sa demande de participation à l\'évènement à venir';
    protected $table = 'notifications';

    protected $fillable = [
        'context', 'seen', 'participation_id'
    ];

    public function participation()
    {
        return $this->belongsTo(Participation::class, 'participation_id', 'id');
    }
}
