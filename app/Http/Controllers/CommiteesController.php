<?php

namespace App\Http\Controllers;

use App\User;
use App\Event;
use App\Member;
use App\Commitee;
use Illuminate\Http\Request;
use App\Http\Requests\CommiteesRequest;
use Illuminate\Support\Facades\Session;

class CommiteesController extends Controller
{
    public function commitees()
    {
        $commitees = Commitee::all();
        return view('admin.commitees.commitees', [
            'commitees' => $commitees
        ]);
    }

    public function addMember()
    {
        return view('admin.commitees.new', [
            'events' => Event::all(),
            'members' => User::all()
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

    public function create(CommiteesRequest $request)
    {
        $event = Event::find($request->event);
        $commitee = Commitee::where('event_id', $event->id)->first();
        Member::create([
            'user_id' => $request->member,
            'commitee_id' => $commitee->id
        ]);
        Session::flash('success', 'Membre ajouté avec succées');
        return back();
    }

    public function members(int $id)
    {
        return view('admin.commitees.members', [
            'commitee' => Commitee::findOrFail($id)
        ]);
    }
}
