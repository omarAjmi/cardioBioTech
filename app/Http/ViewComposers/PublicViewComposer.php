<?php

namespace App\Http\ViewComposers;

use App\Event;
use Illuminate\View\View;
use Date;


class PublicViewComposer
{
    public function compose(View $view)
    {
        $events = Event::latest()->get();
        if (!is_null($events->first())) {
            $events->first()->start_date = new Date($events->first()->start_date);
            $events->first()->end_date = new Date($events->first()->end_date);
            $events->first()->address = json_decode($events->first()->address);
        }    
        return $view->with(['events' => $events]);       
    }
}
