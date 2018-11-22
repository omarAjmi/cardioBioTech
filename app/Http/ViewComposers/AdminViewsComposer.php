<?php

namespace App\Http\ViewComposers;

use App\Event;
use App\Notif;
use Illuminate\View\View;
use Date;


class AdminViewsComposer
{
    public function compose(View $view)
    {
        $events = Event::all();
        foreach ($events as $event) {
            $event->start_date = new Date($event->start_date);
            $event->end_date = new Date($event->end_date);
            $event->dead_line = new Date($event->dead_line);
        }
        $notifs = Notif::where('seen', false)->get();
        foreach ($notifs as $notif) {
            $notif->created_at = new Date($notif->created_at);
        }
//        dd($notifs->count());
        return $view->with([
            'notifs' => $notifs,
            'events'=>$events->sortByDesc('start_date')
            ]);
    }
}
