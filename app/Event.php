<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Event extends Model
{
    protected $fillable = [
        'title', 'abbreviation', 'about', 'startDate', 'endDate', 'address', 'storage', 'program_file'
    ];

    public function participations()
    {
        return $this->hasMany(App\Participation::class, 'id', 'event_id');
    }

    public function participants()
    {
        return $this->hasMany(App\User::class, 'id', 'user_id');
    }

    public function uploadProgramFile(UploadedFile $uploadedFile)
    {
        if (!is_dir($this->storage)) {
            mkdir($this->storage);
        }
        $fileName = $this->abbreviation.'.'.$uploadedFile->getClientOriginalExtension();
        Storage::disk('public')->putFileAs($this->storage, $uploadedFile, $fileName);
        return $fileName;
    }
}
