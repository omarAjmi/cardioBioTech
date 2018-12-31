<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'fullname', 'commitee', 'image', 'title', 'commitee_id'
    ];

    public function commitee()
    {
        return $this->belongsTo(Commitee::class, 'commitee_id', 'id');
    }
}
