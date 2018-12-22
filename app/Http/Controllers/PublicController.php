<?php

namespace App\Http\Controllers;

use App\Event;
use App\Participation;
use Date;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
         $event = Event::latest()->first();
        if (!is_null($event)) {
            $event->start_date = new Date($event->start_date);
            $event->end_date = new Date($event->end_date);
            $event->dead_line = new Date($event->dead_line);
            $event->address = json_decode($event->address);
        }
        return view('welcome', [
            'event' => $event
        ]);
    }

    public function event(int $id)
    {
        $event = Event::with('participations')->findOrFail($id);
        foreach ($event->participations as $key => $p) {
            if (!$p->confirmation) {
                $event->participations->forget($key);
            }
        }
        if (!is_null($event)) {
            $event->start_date = new Date($event->start_date);
            $event->end_date = new Date($event->end_date);
            $event->dead_line = new Date($event->dead_line);
            $event->address = json_decode($event->address);
        }
        $participations = Participation::where('participant_id', Auth::id())->where('event_id', $event->id)->get();
        return view('public.event',[
            'event'=>$event,
            'album' => $event->gallery->album()->shuffle(),
            'participations' => $participations,
            'title' => $event->abbreviation .' | '. $event->title
        ]);
    }

    public function participation(int $event_id, int $part_id)
    {
        $event = Event::findOrFail($event_id);
        $participation = Participation::findOrFail($part_id);
        if($participation->participant_id == Auth::id()) {
            return view('public.participation', [
                'event' => $event,
                'participation' => $participation
            ]);
        } else {
            abort(403);
        }
    }

    public function contact()
    {
        return view('public.contact', [
            'title' => env('APP_NAME').' | Contactez nous'
        ]);
    }
}
