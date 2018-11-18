<?php

namespace App\Http\ViewComposers;

use App\Event;
use Carbon\Carbon;
use Illuminate\View\View;
use Jenssegers\Date\Date;


class PublicViewComposer
{
    public function compose(View $view)
    {
        Date::setLocale('FR');
        $events = Event::latest()->get();
        if (!is_null($events->first())) {
            $events->first()->start_date = new Date($events->first()->start_date);
            $events->first()->end_date = new Date($events->first()->end_date);
            $events->first()->address = json_decode($events->first()->address);
        }    
        return $view->with(['events' => $events]);       
    }
}
