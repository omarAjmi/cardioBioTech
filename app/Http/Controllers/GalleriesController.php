<?php

namespace App\Http\Controllers;

use App\Event;
use App\Image;
use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Requests\GalleriesRequest;

class GalleriesController extends Controller
{
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
        $gallery = Gallery::create(['event_id'=> $request->category]);
        foreach ($request->file('files') as $key => $file) {
            Image::create([
                'gallery_id' => $gallery->id,
                'path' => $gallery->uploadImage($file, env('EVENT_STORAGE_PATH').$gallery->event->abbreviation.'/gallery/', $key)
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
}
