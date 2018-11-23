<?php

namespace App\Http\Controllers;

use App\Notif;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function markSeenNotif(int $id)
    {
        $notif = Notif::findOrFail($id);
        $notif->seen = true;
        $notif->save();
        return back();
    }

    public function notifications()
    {
        $notifications = Notif::latest()->paginate(6);
        foreach ($notifications as $notif) {
            $notif->created_at = new Carbon($notif->created_at);
        }
        return view('admin.notifications', [
            'notifications' => $notifications
        ]);
    }
}
