<?php
/**
 * Created by PhpStorm.
 * User: xenomium
 * Date: 12/2/18
 * Time: 4:28 PM
 */

namespace App;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait CanUpload
{
    public function uploadImage(UploadedFile $file, string $path)
    {
        $path = str_replace('/storage', '', $path);#remove '/storage' from the path or it will create it under storage/app/public
        if(!is_dir($path)) {
            Storage::disk('public')->makeDirectory($path);
        }
        $filename = rand().'.'.$file->getClientOriginalExtension();
        Storage::disk('public')->putFileAs($path, $file, $filename);
        return '/storage'.$path.$filename;
    }

    public function uploadFile(UploadedFile $file, string $fileName, string $path)
    {
        $path = str_replace('/storage', '', $path);#remove '/storage' from the path or it will create it under storage/app/public
        if(!is_dir($path)) {
            Storage::disk('public')->makeDirectory($path);
        }
        $fileName = $fileName.'.'.$file->getClientOriginalExtension();
        Storage::disk('public')->putFileAs($path, $file, $fileName);
        return '/storage'.$path.$fileName;
    }

}