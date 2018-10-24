<?php

namespace App\Http\Controllers;

use App\Event;
use App\Slider;
use App\Gallery;
use App\Commitee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateEventRequest;

class EventsController extends Controller
{
    /**
     * serves the Events view
     *
     * @return \Illuminate\Http\Response
     */
    public function events()
    {
        $events = Event::all()->sortByDesc('created_at');
        foreach ($events as $event) {
            $event->start_date = new Carbon($event->start_date);
            $event->end_date = new Carbon($event->end_date);
            $event->address = json_decode($event->address);
        }
        
        return view('admin.events.events', [
            'events' => $events
        ]);
    }

    /**
     * serves the new Event view
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        return view('admin.events.new');
    }

    /**
     * creates an Event
     *
     * @param CreateEventRequest $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateEventRequest $request)
    {
        $event = new Event();
        $event->title = $request->title;
        $event->abbreviation = $request->abbreviation;
        $event->about = $request->about;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->storage = env('EVENT_STORAGE_PATH').$request->abbreviation.'/';
        $event->program_file = $event->uploadProgramFile($request->file('program'), $event->abbreviation);
        $event->address = json_encode([
            'state' => $request->state,
            'city' => $request->city,
            'street' => $request->street
            ]);
        $event->save();
        foreach ($request->file('sliders') as $key => $sliderFile) {
            Slider::create([
                'event_id' => $event->id,
                'name'=> $event->uploadSlider($sliderFile, $key)
            ]);
        }
        Commitee::create(['event_id'=>$event->id]);
        Gallery::create(['event_id'=>$event->id]);
        Session::flash('success', 'événement est créé avec succès');
        return redirect(route('admin.events'));
    }

    public function preview(int $id)
    {
        $event = Event::findOrFail($id);
        $event->start_date = new Carbon($event->start_date);
        $event->end_date = new Carbon($event->end_date);
        $event->address = json_decode($event->address);
        return view('admin.events.preview', ['event' => $event]);
    }

    /**
     * updates an Event
     *
     * @param Request $request
     * @param integer $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $event = Event::findOrFail($id);
        $event->update([
            'title' => $request->title,
            'abbreviation' => $request->abbreviation,
            'about' => $request->about,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'storage' => env('EVENT_STORAGE_PATH').$request->abbreviation,
            'address' => json_encode([
                'state' => $request->state,
                'city' => $request->city,
                'street' => $request->street
                ])
        ]);
        Session::flash('success', 'évènnement est mis à jour');
        return redirect(route('admin.events'));
    }

    /**
     * let client download Event program file
     *
     * @param integer $id
     * @param string $fileName
     * @return \Illuminate\Http\Response
     */
    public function downloadProgram(int $id, string $fileName)
    {
        $event = Event::findOrFail($id);
        return Storage::disk('public')->download("events/$event->abbreviation/".$event->program_file);
    }

    /**
     * deletes an Event
     *
     * @param integer $id
     * @return \Illuminate\Http\Response
     */
    public function delete(int $id)
    {
        $event = Event::findOrFail($id);
        Storage::disk('public')->deleteDirectory(env('EVENT_STORAGE_PATH').'/'.$event->abbreviation);
        $event->delete($id);
        Session::flash('success', 'évènnement est suprimé');
        return redirect(route('admin.events'));
    }
}
