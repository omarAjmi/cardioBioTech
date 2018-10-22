<?php

namespace App;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'first_name', 'last_name', 'photo', 'phone', 'address', 'storage'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function participations()
    {
        return $this->hasMany(App\Participations::class, 'id', 'user_id');
    }

    public function uploadAvatar(UploadedFile $file)
    {
        $path = env('USER_STORAGE_PATH').'avatars/';
        return $this->uploadFile($file, $path, $this->id);
    }

    public function uploadFile(UploadedFile $file, string $path, string $fileName)
    {
        if(!is_dir($path)) {
            Storage::disk('public')->makeDirectory($path);
        }
        $fileName = $fileName.'.'.$file->getClientOriginalExtension();
        Storage::disk('public')->putFileAs($path, $file, $fileName);
        return $fileName;
    }

    public function getFullName()
    {
        return $this->last_name.' '.$this->first_name;
    }
}
