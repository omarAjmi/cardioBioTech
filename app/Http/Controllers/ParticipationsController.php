<?php

namespace App\Http\Controllers;

use App\Event;
use App\Notif;
use App\User;
use Carbon\Carbon;
use App\Participation;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

    /**
     * fetches all participations of a given event
     * @param int $event_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function participations(int $event_id)
    {
        $event = Event::findOrFail($event_id);
        return view('admin.participations', [
            'participations'=>$event->participations,
            'title' => "Panel | $event->abbreviation | Participations"
        ]);
    }

    /**
     * participates the Auth user to a given event
     * @param Request $request
     * @param int $event_id
     * @throws
     * @return \Illuminate\Http\RedirectResponse
     */
    public function participate(Request $request, int $event_id)
    {
        #testing if user is check()
        if (Auth::guest()) {
                Session::flash('authErr');
                return back();
        }
        $event = Event::findOrFail($event_id);
        #testing if event participation is expired
        if(!$event->dead_line > now()) {
            Session::flash('partFail', 'Date de participation finale est depasé');
            return back();
        }
        #validating the request
        $validator = $this->valideRequest($request);
        if($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        #validation passes
        $this->createParticipation($event, $request);

        Session::flash('partSuccess', 'Votre demande a été déposer');

        Mail::send('emails.participation_email', ['event'=>$event], function ($message) {
            $message->to(Auth::user()->email);
            $message->from(env('MAIL_USERNAME'));
            $message->subject('Soumission d\'une demande de participation');
        });
        return back();
        
    }

    /**
     * responds to download participation file request
     * @param int $event_id
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function downloadParticipationFile(int $event_id, int $id)
    {
        $event = Event::findOrFail($event_id);
        $participation = Participation::findOrFail($id);
        $notif = $participation->notification;
        $notif->seen = true;
        $notif->save();

        return Storage::disk('public')->download(str_replace('/storage', '',$participation->file));
        return back();
    }

    /**
     * confirm a participation of a given event
     * @param int $event_id
     * @param int $part_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function confirm(int $event_id, int $part_id)
    {
        $event = Event::findOrFail($event_id);
        $participation = Participation::findOrFail($part_id);
        Mail::send('emails.confirmation_email', ['event'=>$event], function ($message) use ($participation) {
            $message->to($participation->participant->email);
            $message->from(env('MAIL_USERNAME'));
            $message->subject('Acceptation d\'une demande de participation');
        });
        $participation->confirmation = true;
        $participation->save();
        return back();
    }

    /**
     * refuse a participation of a given event
     * @param int $event_id
     * @param int $part_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function refuse(int $event_id, int $part_id)
    {
        $event = Event::findOrFail($event_id);
        $participation = Participation::findOrFail($part_id);
        Mail::send('emails.refuse_email', ['event'=>$event], function ($message) use ($participation) {
            $message->to($participation->participant->email);
            $message->from(env('MAIL_USERNAME'));
            $message->subject('refus d\'une demande de participation');
        });
        #or use php's unlink($filename)
        Storage::disk('public')->delete($event->storage.'participations/'.$participation->file);
        $participation->delete();
        return back();
    }

    /**
     * validates a participation request
     * @param Request $request
     * @return bool
     */
    private function valideRequest(Request $request)
    {
        $participationRequest = new ParticipationRequest();
        return $validator = Validator::make($request->toArray(), $participationRequest->rules());
    }

    /**
     * persists a participation to the database
     * @param Event $event
     * @param Request $request
     * @throws \Exception
     */
    private function createParticipation(Event $event, Request $request)
    {
        $part = new Participation();
        $existing = $part->fetchIfExist(Auth::id(), $event->id);
        $user = Auth::user();
        $fileName = str_replace(' ', '_', $event->abbreviation . '_' . $user->getFullName());
        $path = $event->storage . 'participations/';
        if (is_null($existing)) {
            $existing = Participation::create([
                'event_id' => $event->id,
                'participant_id' => $user->id,
                'title' => $request->title,
                'affiliation' => $request->affiliation,
                'authors' => $request->authors,
                'file_name' => $fileName,
                'file' => $part->uploadFile($request->file('participation'), $fileName, $path)
            ]);
            $this->notify('create', $existing, $user);
        } else {
            $existing->file = $existing->uploadFile($request->file('participation'), $fileName, $path);
            $existing->confirmation = false;
            $existing->title = $request->title;
            $existing->authors = $request->authors;
            $existing->affiliation = $request->affiliation;
            $existing->file_name = $fileName;
            $existing->save();
            $this->notify('update', $existing, $user);
        }
    }

    /**
     * notify the admin about the new participation
     * @param string $type
     * @param Participation $existing
     * @param User $user
     * @throws \Exception
     */
    private function notify(string $type, Participation $existing, User $user)
    {
        if (str_is('create', $type)) {
            Notif::create([
                'participation_id' => $existing->id,
                'context' => $user->getFullName() .Notif::NEW_PARTICIPATION
            ]);
        } else if (str_is('update', $type)){
            Notif::create([
                'participation_id' => $existing->id,
                'context' => $user->getFullName() .Notif::UPDATE_PARTICIPATION
            ]);
        } else {
            throw new \Exception('participation notification accepts update or create as parameters');
        }
    }
}
