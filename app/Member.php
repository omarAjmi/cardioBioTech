<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'user_id', 'commitee_id'
    ];

    public function data()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function commitee()
    {
        return $this->belongsTo(Commetee::class, 'commitee_id', 'id');
    }
}
