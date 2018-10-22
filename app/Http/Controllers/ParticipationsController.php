<?php

namespace App\Http\Controllers;

use App\Event;
use App\Notif;
use Carbon\Carbon;
use App\Participation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ParticipationRequest;

class ParticipationsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except(['participation']);
    }
    
    public function participation(int $id)
    {
        $event = Event::with('participants')->findOrFail($id);
        if ($event->start_date < now()) {
            Session::flash('outdated', 'cet événement est obsolète');
            return back();
        }
        $event->start_date = new Carbon($event->start_date);
        $event->end_date = new Carbon($event->end_date);
        $event->end_date = new Carbon($event->end_date);
        $event->address = json_decode($event->address);
        return view('public.participate', [
            'event' => $event
        ]);
    }

    public function confirmedParticipants()
    {
        $participations = Participation::where('confirmation', true)->get();
        return view('admin.participations', ['participations' => $participations]);
    }

    public function postponedParticipants()
    {
        $participations = Participation::where('confirmation', false)->get();
        return view('admin.participations', ['participations' => $participations]);
    }

    public function participate(ParticipationRequest $request, int $id)
    {
        $event = Event::findOrFail($id);
        $user = Auth::user();
        $fileName = $event->abbreviation.'_'.$user->first_name.'_'.$user->last_name;
        $participation = new Participation();
        $path = env('EVENT_STORAGE_PATH').$event->abbreviation.'/participations/';  
        $participation = Participation::create([
            'event_id' => $event->id,
            'participant_id' => Auth::id(),
            'file' => $participation->uploadParticipationFile($request->file('participation'), $fileName, $path)
        ]);
        Notif::create([
            'participation_id' => $participation->id,
            'context' => $user->first_name.' '.$user->last_name.' a demandé une participation à l\'événement à venir'
        ]);
        Session::flash('success', 'Votre demande a été déposer');
        return back();
    }

    public function downloadParticipationFile(int $id)
    {
        $participation = Participation::findOrFail($id);
        $notif = $participation->notification;
        $notif->seen = true;
        $notif->save();
        return Storage::disk('public')->download('events/'.$participation->event->abbreviation.'/participations/'.$participation->file);
        return back();
    }

    public function confirm(int $id)
    {
        $participation = Participation::findOrFail($id);
        $participation->confirmation = true;
        $participation->save();
        return back();
    }

    public function refuse(int $id)
    {
        $participation = Participation::findOrFail($id);
        #or use php's unlink($filename)
        Storage::disk('public')->delete(env('EVENT_STORAGE_PATH').$participation->event->abbreviation.'/participations/'.$participation->file);
        $participation->delete();
        return back();
    }
}
