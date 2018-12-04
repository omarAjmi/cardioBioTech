<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\SponsorsRequest;
use App\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SponsorsController extends Controller
{
    public function sponsors(int $id)
    {
        $event = Event::with('sponsors')->findOrFail($id);
        return view('admin.sponsors.eventSponsors', [
            'event' => $event
        ]);
    }

    public function addSponsorForm(int $event_id)
    {
        $event = Event::findOrFail($event_id);
        return view('admin.sponsors.new', ['event'=>$event]);
    }

    public function addSponsor(int $event_id, SponsorsRequest $request)
    {
        $event = Event::findOrFail($event_id);
        $sponsor = new Sponsor();
        foreach ($request->file('sponsors') as $file) {
            Sponsor::create([
                'event_id' => $event->id,
                'name' => $request->name,
                'path' => $sponsor->uploadImage($file, $event->storage.'sponsors/')
            ]);

        }
        return redirect(route('sponsors.preview', $event_id));
    }

    public function removeSponsor(int $event_id, int $sponsor_id)
    {
        $event = Event::findOrFail($event_id);
        $sponsor = Sponsor::findorFail($sponsor_id);
        Storage::disk('public')->delete(str_replace('/storage/', '', $sponsor->path));
        $sponsor->delete();
        Session::flash('success', 'sponsor est supprimé avec succès');
        return back();
    }
}
