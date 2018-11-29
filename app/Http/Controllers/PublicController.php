<?php

namespace App\Http\Controllers;

use App\Event;
use Date;
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
         $event = Event::latest()->first();
        return view('emails.participation', ['event'=>$event]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function currentEvent()
    {
        return view('public.news');
        
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
        return view('public.event',['event'=>$event]);
    }

    public function contact()
    {
        return view('public.contact');
    }
}
