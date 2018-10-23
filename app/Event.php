<?php

namespace App;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Event extends Model
{
    protected $fillable = [
        'title', 'abbreviation', 'about', 'startDate', 'endDate', 'address', 'storage', 'program_file'
    ];

    public function participations()
    {
        return $this->hasMany(Participation::class, 'event_id', 'id');
    }

    public function participants()
    {
        return $this->hasManyThrough(User::class, Participation::class, 'event_id', 'id', 'id', 'participant_id');
    }

    public function sliders()
    {
        return $this->hasMany(Slider::class, 'event_id', 'id');
    }

    public function gallery()
    {
        return $this->hasOne(Gallery::class, 'event_id', 'id');
    }

    public function commitee()
    {
        return $this->hasOne(Commitee::class, 'event_id', 'id');
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

    public function breakLongAbout()
    {
        $length = 300;
        $maxLength = 300;
        $paragraphs = [];
        //Text length
        $textLength = strlen($this->about);
        //return without breaking if text is already short
        if (!($textLength > $maxLength)){
            $splitText[] = $this->about;
            return $splitText;
        }
        //Guess sentence completion
        $needle = '.';

        /*iterate over $this->about length 
        as substr_replace deleting it*/  
        while (strlen($this->about) > $length){
            $end = strpos($this->about, $needle, $length);
            if ($end === false){
                //Returns FALSE if the needle (in this case ".") was not found.
                $splitText[] = substr($this->about,0);
                $this->about = '';
                break;
            }
            $end++;
            $splitText[] = substr($this->about,0,$end);
            $this->about = substr_replace($this->about,'',0,$end);
        }
        
        if ($this->about){
            $splitText[] = substr($this->about,0);
        }

        return $splitText;
    }
}
