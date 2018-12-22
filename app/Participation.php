<?php

namespace App;

use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Participation extends Model
{
    use CanUpload;

    protected $fillable = [
        'participant_id', 'event_id', 'confirmation', 'file', 'title', 'authors', 'affiliation', 'file_name', 'session'
    ];

    public function participant()
    {
        return $this->belongsTo(User::class, 'participant_id', 'id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }

    public function notification()
    {
        return $this->hasOne(Notif::class, 'participation_id', 'id');
    }

    public function fetchIfExist(int $user_id, int $event_id, string $session)
    {
        return $this->where('participant_id', $user_id)->where('event_id', $event_id)->where('session', $session)->first();
    }
}
