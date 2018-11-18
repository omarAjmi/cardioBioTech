<?php

namespace App\Http\Controllers;

use App\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $events = Event::all();
        return view('welcome', ['events'=> $events]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function currentEvent()
    {
        $events = Event::all();
        if($events->isNotEmpty()) {
            $events->first()->start_date = new Carbon($events->first()->start_date);
            $events->first()->end_date = new Carbon($events->first()->end_date);
            $events->first()->address = json_decode($events->first()->address);
            return view('public.news', ['events'=> $events]);
        }
        return view('public.news', ['events'=> $events]);
        
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
            $event->start_date = new Carbon($event->start_date);
            $event->end_date = new Carbon($event->end_date);
            $event->address = json_decode($event->address);
        }
        return view('public.event',['event'=>$event]);
    }

    public function contact()
    {
        return view('public.contact');
    }
}
