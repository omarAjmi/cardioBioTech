<?php

namespace App\Http\ViewComposers;

use App\Notif;
use Carbon\Carbon;
use Illuminate\View\View;


class AdminViewsComposer
{
    public function compose(View $view)
    {
        $notifs = Notif::where('seen', false)->get();
        foreach ($notifs as $notif) {
            $notif->created_at = new Carbon($notif->created_at);
        }
        return $view->with(['notifs' => $notifs]);       
    }
}
