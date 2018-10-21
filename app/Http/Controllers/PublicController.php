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
        return view('welcome');
    }

    public function event(int $id)
    {
        $event = Event::findOrFail($id);
        if (!is_null($event)) {
            $event->start_date = new Carbon($event->start_date);
            $event->end_date = new Carbon($event->end_date);
            $event->address = json_decode($event->address);
        }
        $participants = $event->participants;
        return view('public.event',['event'=>$event, 'participants'=>$participants]);
    }

    public function contact(int $id)
    {
        return view('public.contact', ['event'=>Event::findOrFail($id)]);
    }
}
