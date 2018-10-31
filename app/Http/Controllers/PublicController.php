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
        return view('public.welcome');
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
