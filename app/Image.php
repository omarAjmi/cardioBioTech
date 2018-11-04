<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'gallery_id', 'path'
    ];

    public function gallery()
    {
        return $this->belongsTo(Event::class, 'gallery_id', 'id');
    }
}
