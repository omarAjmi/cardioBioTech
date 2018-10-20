<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EventsController extends Controller
{
    public function construct()
    {
        $this->middleware(['admin']);
    }
    public function events()
    {
        return view('admin.events.events');
    }

    public function new()
    {
        return view('admin.events.new');
    }

    public function create(Request $request)
    {
        $event = Event::create([
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

    public function delete(int $id)
    {
        Event::delete($id);
        Session::flash('success', 'évènnement est suprimé');
        redirect(route('admin.events'));
    }
}
