<?php

namespace App;

use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Participation extends Model
{
    protected $fillable = [
        'participant_id', 'event_id', 'confirmation', 'file'
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

    public function uploadParticipationFile(UploadedFile $file, string $fileName, string $path)
    {
        if (!is_dir($path)) {
            Storage::disk('public')->makeDirectory($path);
        }
        return $this->uploadFile($file, $fileName, $path);
    }

    private function uploadFile(UploadedFile $file, string $fileName, string $path)
    {
        if (!is_dir($path)) {
            Storage::disk('public')->makeDirectory($path);
        }
        $fileName = $fileName.'.'.$file->getClientOriginalExtension();
        Storage::disk('public')->putFileAs($path, $file, $fileName);
        return $fileName;
    }
}
