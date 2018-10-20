<?php

namespace App;

use Illuminate\Support\Facades\File;
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

    public function uploadProgramFile(UploadedFile $uploadedFile, string $fileName)
    {
        return $this->uploadFile($uploadedFile, $fileName, $this->storage);
    }

    public function uploadSlider(UploadedFile $uploadedFile, string $fileName)
    {
        return $this->uploadFile($uploadedFile, $fileName, $this->storage.'sliders');
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
