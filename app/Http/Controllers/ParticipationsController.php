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
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ParticipationRequest;

class ParticipationsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except('participate');
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

    public function participate(Request $request, int $id)
    {
        if (Auth::guest()) {
                Session::flash('registerfail');
                return back();
        } else {
            $event = Event::findOrFail($id);
            if($event->dead_line > now()) {
                $validation = new ParticipationRequest();
                $validator = Validator::make($request->toArray(), $validation->rules());
                if ($validator->fails()) {
                    Session::flash('partFail', '*');
                    $validator->errors()->add('participation', 'Champs requis');
                    return back();
                }
                $user = Auth::user();
                $fileName = $event->abbreviation.'_'.$user->first_name.'_'.$user->last_name;
                $participation = new Participation();
                $path = env('EVENT_STORAGE_PATH', '/events/').$event->abbreviation.'/participations/';  
                $participation = Participation::create([
                    'event_id' => $event->id,
                    'participant_id' => Auth::id(),
                    'file' => $participation->uploadParticipationFile($request->file('participation'), $fileName, $path)
                ]);
                Notif::create([
                    'participation_id' => $participation->id,
                    'context' => $user->first_name.' '.$user->last_name.' a demandé une participation à l\'évènement à venir'
                ]);
                Session::flash('partSuccess', 'Votre demande a été déposer');
                return back();
            } else {
                Session::flash('partFail', 'Date de participation finale est depasé');
                return back();
            }
        }
        
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
        Storage::disk('public')->delete(env('EVENT_STORAGE_PATH', '/events/').$participation->event->abbreviation.'/participations/'.$participation->file);
        $participation->delete();
        return back();
    }
}
