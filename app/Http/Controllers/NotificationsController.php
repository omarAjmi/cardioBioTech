<?php

namespace App\Http\Controllers;

use App\Notif;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator as paginator;

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

        $notifications = Notif::all()->sortByDesc('created_at');
        $currentPage = Paginator::resolveCurrentPage();
        $collection = collect($notifications);
        $currentPageResults = $collection->slice(($currentPage - 1) * 6, 6)->all();
        $paginatedNotifs = new Paginator($currentPageResults, count($collection), 6);
        foreach ($notifications as $notif) {
            $notif->created_at = new Carbon($notif->created_at);
        }
        return view('admin.notifications', [
            'notifications' => $paginatedNotifs
        ]);
    }
}
