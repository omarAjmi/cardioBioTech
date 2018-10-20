<?php

namespace App\Http\Controllers;

use App\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $event = Event::latest()->first();
        $event->start_date = new Carbon($event->start_date);
        $event->end_date = new Carbon($event->end_date);
        // dd($event->start_date);
        $event->address = json_decode($event->address);
        return view('welcome')->with([
            'event' => $event
        ]);
    }
}
