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
use Image;

trait CanUpload
{
    public function uploadImage(UploadedFile $file, string $path, $id = null)
    {
        $path = str_replace('/storage', '', $path);#remove '/storage' from the path or it will create it under storage/app/public
        if(!is_dir($path)) {
            Storage::disk('public')->makeDirectory($path);
        }
        $image = Image::make($file);
        $acceptableSize = ($image->height() <= 500 or $image->width() <= 700);
        if(is_null($id)) {
			$filename = rand().'.'.$file->getClientOriginalExtension();
			if($acceptableSize){            	
				$image->save(public_path('/storage'.$path).$filename);            
			} else {
	            $image->resize(700, 500)->save(public_path('/storage'.$path).$filename);
			}
        } else {
			$filename = $id.'.'.$file->getClientOriginalExtension();
            $image->resize(204, 204)->save(public_path('/storage'.$path).$filename);
        }
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
