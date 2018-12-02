<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Sponsor extends Model
{
    use CanUpload;
    /**
     * mass assignement fields
     * @var array
     */
    protected $fillable = [
        'event_id', 'path', 'name'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }
}
