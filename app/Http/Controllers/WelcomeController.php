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
        $event->startDate = new Carbon($event->startDate);
        $event->endDate = new Carbon($event->endDate);
        $event->address = json_decode($event->address);
        return view('welcome')->with([
            'event' => $event
        ]);
    }
}
