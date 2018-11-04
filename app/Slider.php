<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Slider extends Model
{
    protected $fillable = [
        'event_id', 'name'
    ];
}
