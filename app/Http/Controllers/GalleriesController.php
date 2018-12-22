<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\VideosRequest;
use App\Image;
use App\Gallery;
use App\Video;
use Illuminate\Http\Request;
use App\Http\Requests\ImagesRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Pawlox\VideoThumbnail\Facade\VideoThumbnail;

class GalleriesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function addImagesForm(int $event_id)
    {
        $event = Event::findOrFail($event_id);
        return view('admin.galleries.new_image',['event'=>$event]);
    }

    public function addVideosForm(int $event_id)
    {
        $event = Event::findOrFail($event_id);
        return view('admin.galleries.new_video',['event'=>$event]);
    }

    public function addVideos(int $event_id, VideosRequest $request)
    {
        $event = Event::findOrFail($event_id);
        $gallery = $event->gallery;
        foreach ($request->file('files') as $file) {
            $video = Video::create([
                'gallery_id' => $gallery->id,
                'title' => $request->title,
                'path' => $gallery->uploadFile($file, $request->title,$event->storage.'gallery/')
            ]);
            try {
                VideoThumbnail::createThumbnail(public_path($video->path), public_path($event->storage.'gallery'), $video->title.'.jpg', 60);
                $video->thumbnail = substr($video->path, 0, -4).'.jpg';
                $video->save();
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        }
        return redirect(route('galleries.preview', $event_id));
    }

    public function addImages(int $event_id, ImagesRequest $request)
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
        $gallery = Gallery::where('id', $event->id)->first();
        return view('admin.galleries.files', [
            'gallery' => $gallery
        ]);
    }

    public function deleteImage(int $event_id, int $image_id)
    {
        Event::findOrFail($event_id);
        $image = Image::findOrFail($image_id);
        $imagePath = str_replace('/storage', '',$image->path);
        if(Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
        $image->delete();
        return back();
    }

    public function deleteVideo(int $event_id, int $video_id)
    {
        Event::findOrFail($event_id);
        $video = Video::findOrFail($video_id);
        $videoPath = str_replace('/storage', '',$video->path);
        $videoTumbnailPath = str_replace('/storage', '',$video->thumbnail);
        if(Storage::disk('public')->exists($videoPath)) {
            Storage::disk('public')->delete($videoPath);
            Storage::disk('public')->delete($videoTumbnailPath);
        }
        $video->delete();
        return back();
    }
}
