<?php

namespace App\Http\Controllers;

use App\Event;
use App\Image;
use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Requests\GalleriesRequest;
use Illuminate\Support\Facades\Storage;

class GalleriesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function addImagesForm(int $event_id)
    {
        $event = Event::findOrFail($event_id);
        return view('admin.galleries.new',['event'=>$event]);
    }

    public function addImages(int $event_id, GalleriesRequest $request)
    {
        $event = Event::findOrFail($event_id);
        $gallery = $event->gallery;
        foreach ($request->file('files') as $file) {
            Image::create([
                'gallery_id' => $gallery->id,
                'path' => $gallery->uploadImage($file, $event->storage.'gallery/')
            ]);
            
        }
        return redirect(route('galleries.preview', $event_id));
    }

    public function preview(int $event_id)
    {
        $event = Event::findOrFail($event_id);
        $gallery = Gallery::with('album')->where('id', $event->id)->first();
        return view('admin.galleries.files', [
            'gallery' => $gallery
        ]);
    }

    public function deleteImage(int $event_id, int $image_id)
    {
        Event::findOrFail($event_id);
        $image = Image::findOrFail($image_id);
        if(Storage::disk('public')->exists($image->path)) {
            Storage::disk('public')->delete($image->path);
        }
        $image->delete();
        return back();
    }
}
