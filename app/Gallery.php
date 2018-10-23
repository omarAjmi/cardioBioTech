<?php

namespace App;

use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    protected $fillable = [
        'event_id'
    ];

    public function album()
    {
        return $this->hasMany(Image::class, 'gallery_id', 'id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }


    public function uploadImage(UploadedFile $file, string $path, $filename)
    {
        if(!is_dir($path)) {
            Storage::disk('public')->makeDirectory($path);
        }
        $filename = $filename.'.'.$file->getClientOriginalExtension();
        Storage::disk('public')->putFileAs($path, $file, $filename);
        return $path.$filename;
    }
}
