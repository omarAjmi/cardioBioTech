<?php

namespace App\Http\Controllers;

use App\Event;
use App\Participation;
use Date;
use Illuminate\Http\Request;
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
//         $event = Event::latest()->first();
        return view('welcome');
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
        $participation = Participation::where('participant_id', Auth::id())->where('event_id', $event->id)->first();
        return view('public.event',[
            'event'=>$event,
            'participation' => $participation,
            'title' => $event->abbreviation .' | '. $event->title
        ]);
    }

    public function contact()
    {
        return view('public.contact', [
            'title' => env('APP_NAME').' | Contactez nous'
        ]);
    }
}
