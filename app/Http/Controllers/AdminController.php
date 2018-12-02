<?php

namespace App\Http\Controllers;

use App\Event;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function welcome()
    {
        $events = Event::all()->sortByDesc('created_at');
        foreach ($events as $event) {
            $event->start_date = new Carbon($event->start_date);
            $event->end_date = new Carbon($event->end_date);
            $event->address = json_decode($event->address);
        }

        return view('admin.events.events', [
            'events' => $events,
            'title' => 'Panel | Évènements'
        ]);
    }
}
