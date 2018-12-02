<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\SponsorsRequest;
use App\Sponsor;
use Illuminate\Http\Request;

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
//        dd($request);
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
}
