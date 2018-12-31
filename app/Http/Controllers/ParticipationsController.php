<?php

namespace App\Http\Controllers;

use App\Event;
use App\Notif;
use App\User;
use Carbon\Carbon;
use App\Participation;
use Chumper\Zipper\Facades\Zipper;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ParticipationRequest;
use Symfony\Component\HttpFoundation\FileBag;

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
    public function participate(Request $request, int $event_id, int $participation_id=null)
    {
        #testing if user is check()
        if (Auth::guest()) {
                Session::flash('authErr');
                return back();
        } elseif (Auth::user()->phone == '') {
            Session::flash('partFail', 'Veuillez vérifier votre numéro de téléphone pour continuer');
            return back();
        }
        $event = Event::findOrFail($event_id);
        #testing if event participation is expired
        if(!$event->dead_line > now()) {
            Session::flash('partFail', 'Date de participation finale est depasé');
            return back();
        }
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
        $notification = $participation->notification;
        $notification->seen = true;
        $notification->save();
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
        unlink(public_path($participation->file));
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
        $user = Auth::user();
        $part = new Participation();
        $fileName = str_replace(' ', '_', $user->getFullName());
        $path = $event->storage . 'participations/'.$fileName;
        $validator = $this->valideRequest($request);
        if($validator->fails()) {
            Session::flash('partFail', '*');
            return back()->withErrors($validator->errors());
        }
        #validation passes
        if($request->files->has('abstract')) {
            $part->uploadFile($request->file('abstract'), 'abstract_'.$fileName, $path);
        }
        $part->uploadFile($request->file('participation'), 'participation_'.$fileName, $path);

        $this->zipParticipationFiles($path);

        $part = Participation::create([
            'event_id' => $event->id,
            'participant_id' => $user->id,
            'title' => $request->title,
            'affiliation' => $request->affiliation,
            'session' => $request->all()['session'],
            'authors' => $request->authors,
            'file_name' => $user->getFullName(),
            'file' => $path.'.zip'
        ]);
        $this->notify('create', $part, $user);
    }

    public function updateParticipation(int $event_id, int $participation_id, Request $request) {
        $event = Event::findOrFail($event_id);
        $part = Participation::findOrFail($participation_id);
        $user = Auth::user();
        $fileName = str_replace(' ', '_', $user->getFullName());
        $path = $event->storage . 'participations/'.$fileName;
//        dd();
            if($request->files->has('abstract') or $request->files->has('participation')) {
            if($request->files->has('abstract')) {
                $part->uploadFile($request->file('abstract'), 'abstract_'.$fileName, $path);
            }
            if($request->files->has('participation')) {
                $part->uploadFile($request->file('participation'), 'participation_' . $fileName, $path);
            }

            $this->zipParticipationFiles($path);
        }
        $part->file = $path.'.zip';
        $part->confirmation = false;
        $part->title = $request->title;
        $part->authors = $request->authors;
        $part->affiliation = $request->affiliation;
        $part->session = $request->all()['session'];
        $part->file_name = $fileName;
        $part->save();
        $this->notify('update', $part, $user);

        Session::flash('partSuccess', 'Votre demande a été déposer');

        Mail::send('emails.participation_email', ['event'=>$event], function ($message) {
            $message->to(Auth::user()->email);
            $message->from(env('MAIL_USERNAME'));
            $message->subject('Mettre à jour d\'une demande de participation');
        });
        return back();
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

    private function zipParticipationFiles(string $path)
    {
        $files = glob(public_path($path.'/*'));
        Zipper::make(public_path($path).'.zip')->add($files)->close();
        foreach($files as $file ){
            unlink($file);
        }
        rmdir(public_path($path));
    }
}
