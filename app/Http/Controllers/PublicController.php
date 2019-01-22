<?php

namespace App\Http\Controllers;

use App\Event;
use App\Gallery;
use App\Member;
use App\Participation;
use Date;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PublicController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
         $event = Event::all()->sortByDesc('start_date')->first();
        if (!is_null($event)) {
            $event->start_date = new Date($event->start_date);
            $event->end_date = new Date($event->end_date);
            $event->dead_line = new Date($event->dead_line);
            $event->address = json_decode($event->address);
        }
        $scientificCommitee = Member::where('commitee', 'scientifique')->where('commitee_id', $event->commitee->id)->get();
        $organisationCommitee = Member::where('commitee', 'évaluation')->where('commitee_id', $event->commitee->id)->get();
        return view('welcome', [
            'event' => $event,
            'scientificCommitee'=>$scientificCommitee,
            'organisationCommitee'=>$organisationCommitee,
        ]);
    }

    public function loadMore(int $event_id, int $actual_count)
    {
        $more = collect();
        $event = Event::findOrFail($event_id);
        $gallery = Gallery::where('id', $event->id)->first();
        foreach ($gallery->album()->slice($actual_count+1, 8) as $media) {
            if($media instanceof \App\Image) {
                $more->push([
                    'type'=> 'image',
                    'id'=>$media->id,
                    'path'=>$media->path,
                    'created_at'=>$media->created_at->toDateString()
                ]);
            } elseif ($media instanceof \App\Video) {
                $more->push([
                    'type'=> 'video',
                    'id'=>$media->id,
                    'path'=>$media->path,
                    'thumbnail'=>$media->thumbnail,
                    'created_at'=>$media->created_at->toDateString()
                ]);
            }
        }
        return response()->json($more);
    }

    public function event(int $id)
    {
        $event = Event::with('participations')->findOrFail($id);
        foreach ($event->participations as $key => $p) {
            if (!$p->confirmation) {
                $event->participations->forget($key);
            }
        }
        if (!is_null($event)) {
            $event->start_date = new Date($event->start_date);
            $event->end_date = new Date($event->end_date);
            $event->dead_line = new Date($event->dead_line);
            $event->address = json_decode($event->address);
        }
        $scientificCommitee = Member::where('commitee', 'scientifique')->where('commitee_id', $event->commitee->id)->get();
        $organisationCommitee = Member::where('commitee', 'évaluation')->where('commitee_id', $event->commitee->id)->get();
        $participations = Participation::where('participant_id', Auth::id())->where('event_id', $event->id)->get();
        return view('public.event',[
            'event'=>$event,
            'scientificCommitee'=>$scientificCommitee,
            'organisationCommitee'=>$organisationCommitee,
            'album' => $event->gallery->album()->shuffle()->take(6),
            'participations' => $participations,
            'title' => $event->abbreviation .' | '. $event->title
        ]);
    }

    public function participation(int $event_id, int $part_id)
    {
        $event = Event::findOrFail($event_id);
        $participation = Participation::findOrFail($part_id);
        if($participation->participant_id == Auth::id()) {
            return view('public.participation', [
                'event' => $event,
                'participation' => $participation
            ]);
        } else {
            abort(403);
        }
    }

    public function contact()
    {
        return view('public.contact', [
            'title' => env('APP_NAME').' | Contactez nous'
        ]);
    }
}
