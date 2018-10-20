<?php

namespace App\Http\Controllers;

use App\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{
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

    public function new()
    {
        return view('admin.events.new');
    }

    public function create(Request $request)
    {
        // dd($request);
        $event = Event::create([
            'title' => $request->title,
            'abbreviation' => $request->abbreviation,
            'about' => $request->about,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'storage' => env('EVENT_STORAGE_PATH').$request->abbreviation.'/',
            'address' => json_encode([
                'state' => $request->state,
                'city' => $request->city,
                'street' => $request->street
                ])
        ]);
        $event->program_file = $event->uploadProgramFile($request->file('sliders'));
        Session::flash('success', 'évènnement est créé');
        return redirect(route('admin.events'));
    }

    public function edit(int $id)
    {
        return view('admin.events.edit', ['event' => Event::findOrFail($id)]);
    }

    public function update(Request $request, int $id)
    {
        $event = Event::findOrFail($id);
        $event->update([
            'title' => $request->title,
            'abbreviation' => $request->abbreviation,
            'about' => $request->about,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'storage' => env('EVENTS_STORAGE_PATH').$request->abbreviation,
            'address' => json_encode([
                'state' => $request->state,
                'city' => $request->city,
                'street' => $request->street
                ])
        ]);
        Session::flash('success', 'évènnement est mis à jour');
        return redirect(route('admin.events'));
    }

    public function downloadProgram(int $id, string $fileName)
    {
        $event = Event::findOrFail($id);
        return Storage::disk('public')->download("events/$event->abbreviation/".$event->program_file);
    }

    public function delete(int $id)
    {
        Event::delete($id);
        Session::flash('success', 'évènnement est suprimé');
        redirect(route('admin.events'));
    }
}
