<?php

namespace App;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Event extends Model
{
    use CanUpload;

    protected $fillable = [
        'title', 'abbreviation', 'about', 'start_date', 'end_date', 'address', 'storage', 'program_file', 'flyer', 'dead_line', 'organiser'
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

    public function sponsors()
    {
        return $this->hasMany(Sponsor::class, 'event_id', 'id');
    }

    public function getProgramFileName()
    {
        $fileName = $fileName = explode('/', $this->program_file);
        return $fileName[count($fileName)-1];

    }

    public function breakLongAbout()
    {
        $length = 600;
        $maxLength = 600;
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
