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
    public function galleries()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.galleries.galleries', ['galleries'=>$galleries]);
    }

    public function new()
    {
        $events = Event::all();
        return view('admin.galleries.new', [
            'events' => $events
        ]);
    }

    public function create(GalleriesRequest $request)
    {
        $event = Event::find($request->event);
        $gallery = $event->gallery;
        foreach ($request->file('files') as $key=>$file) {
            Image::create([
                'gallery_id' => $gallery->id,
                'path' => $gallery->uploadImage($file, $event->storage.'/gallery/', $gallery->album->count()+$key+1)
            ]);
        }
        return redirect(route('galleries'));
    }

    public function preview(int $id)
    {
        $gallery = Gallery::with('album')->findOrFail($id);
        return view('admin.galleries.files', [
            'gallery' => $gallery
        ]);
    }

    public function deleteImage(int $gallery_id, int $image_id)
    {
        $image = Image::findOrFail($image_id);
        if(Storage::disk('public')->exists($image->path)) {
            Storage::disk('public')->delete($image->path);
        }
        $image->delete();
        return back();
    }
}
