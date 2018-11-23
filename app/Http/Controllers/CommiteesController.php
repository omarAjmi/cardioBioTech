<?php

namespace App\Http\Controllers;

use App\Event;
use App\Member;
use App\Commitee;
use App\Http\Requests\CommiteesRequest;
use Illuminate\Support\Facades\Session;

class CommiteesController extends Controller
{
    public function addMember(int $event_id)
    {
        $event = Event::findOrFail($event_id);
        $event->commitee;
        $participants = collect();
        foreach ($event->participations as $participation) {
            $existingMember = Member::where('user_id', $participation->participant_id)->where('commitee_id', $event->commitee->id)->first();
            if($participation->confirmation and is_null($existingMember)) {
                $participants->push($participation->participant);
            }
        }
        return view('admin.commitees.new', [
            'event' => $event,
            'members' => $participants
        ]);
    }

    public function removeMember(int $commitee_id, int $member_id)
    {
        $commitee = Commitee::findOrFail($commitee_id);
        $member = $commitee->members->where('user_id', $member_id)->first();
        $member->where('user_id', $member_id)->where('commitee_id', $commitee_id)->delete();
        Session::flash('success', 'Membre supprimé avec succès');
        return back();
    }

    public function createMember(int $event_id, CommiteesRequest $request)
    {
        $event = Event::find($event_id);
        $commitee = $event->commitee;
        Member::create([
            'user_id' => $request->member,
            'commitee_id' => $commitee->id
        ]);
        Session::flash('success', 'Membre ajouté avec succées');
        return redirect(route('commitees.preview', $commitee->event_id));
    }

    public function members(int $event_id)
    {
        $event = Event::findOrFail($event_id);
        return view('admin.commitees.members', [
            'commitee' => $event->commitee
        ]);
    }
}
