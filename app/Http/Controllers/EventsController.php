<?php

namespace App\Http\Controllers;

use App\Event;
use App\Slider;
use App\Gallery;
use App\Commitee;
use Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EventsRequest;
use Illuminate\Support\Facades\Validator;

class EventsController extends Controller
{
    /**
     * renders the new Event view
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        return view('admin.events.new', [
            'title' => "Panel | Évènements | Tous"
        ]);
    }

    /**
     * creates an Event
     *
     * @param EventsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function create(EventsRequest $request)
    {
        $event = new Event();
        $event->title = $request->title;
        $event->abbreviation = strtoupper($request->abbreviation);
        $event->about = $request->about;
        $event->organiser = $request->organiser;
        $event->start_date = $request->start_date;
        $event->dead_line = $request->dead_line;
        $event->end_date = $request->end_date;
        $event->storage = env('EVENT_STORAGE_PATH', '/storage/events/').$event->abbreviation.'/';
        $event->program_file = $event->uploadFile($request->file('program'), $event->abbreviation, $event->storage);
        $event->flyer = $event->uploadImage($request->file('flyer'), $event->storage.'flyer/');
        $event->address = json_encode([
            'state' => $request->state,
            'city' => $request->city,
            'street' => $request->street
            ]);
        $event->save();
        foreach ($request->file('sliders') as $sliderFile) {
            Slider::create([
                'event_id' => $event->id,
                'name'=> $event->uploadImage($sliderFile, $event->storage.'sliders/')
            ]);
        }
        Commitee::create(['event_id'=>$event->id]);
        Gallery::create(['event_id'=>$event->id]);
        Session::flash('success', 'évènement est creé avec succès');
        return redirect(route('admin'));
    }

    /**
     * renders the event preview view
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function preview(int $id)
    {
        $event = Event::findOrFail($id);
        $event->start_date = new Date($event->start_date);
        $event->end_date = new Date($event->end_date);
        $event->address = json_decode($event->address);
        return view('admin.events.preview', [
            'event' => $event,
            'title' => "Panel | $event->abbreviation | $event->title"
            ]);
    }

    /**
     * updates an Event
     *
     * @param Request $request
     * @param integer $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $event = $this->validateUpdateRequest($request, $id);
        if(!($event instanceof Event)) {
            return back()->with(['errors' => $event]);
        }
        $event->update([
            'title' => $request->title,
            'abbreviation' => strtoupper($request->abbreviation),
            'about' => $request->about,
            'organiser' => $request->organiser,
            'dead_line' => $request->dead_line,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'address' => json_encode([
                'state' => $request->state,
                'city' => $request->city,
                'street' => $request->street
                ])
        ]);
        if ($request->hasFile('program')) {
            $event->program_file = $event->uploadFile($request->file('program'), $event->abbreviation, $event->storage);
        }
        if ($request->hasFile('flyer')) {
            $event = $this->deleteFlyerAndUpdate($event, $request);
        }
        if ($request->hasFile('sliders')) {
            $event = $this->deleteSlidersAndUpdate($event, $request);
        }
        $event->save();
        Session::flash('success', 'évènnement est mis à jour');
        return redirect(route('admin'));
    }

    /**
     * let client download Event program file
     *
     * @param integer $id
     * @param string $fileName
     * @return \Illuminate\Http\Response
     */
    public function downloadProgram(int $id, string $fileName)
    {
        $event = Event::findOrFail($id);
        $path = str_replace('/storage', '', $event->program_file);
        return Storage::disk('public')->download($path);
    }

    /**
     * deletes an Event
     *
     * @param integer $id
     * @return \Illuminate\Http\Response
     */
    public function delete(int $id)
    {
        $event = Event::findOrFail($id);
        Storage::disk('public')->deleteDirectory($event->storage);
        $event->delete($id);
        Session::flash('success', 'évènnement est suprimé');
        return redirect(route('admin.events'));
    }

    /**
     * deletes the event sliders then update 'em with new values
     * @param Event $event
     * @param Request $request
     * @return Event
     */
    private function deleteSlidersAndUpdate(Event $event, Request $request)
    {
        foreach ($event->sliders as $slider) {
            Storage::disk('public')->delete(str_replace('/storage', '', $slider->name));
            $slider->delete();
        }
        foreach ($request->file('sliders') as $sliderFile) {
            Slider::create([
                'event_id' => $event->id,
                'name'=> $event->uploadImage($sliderFile, $event->storage.'sliders/')
            ]);
        }
        return $event;
    }

    /**
     * deletes event flyer the updates it with new value
     * @param Event $event
     * @param Request $request
     * @return Event
     */
    private function deleteFlyerAndUpdate(Event $event, Request $request)
    {
        Storage::disk('public')->delete(str_replace('/storage', '', $event->flyer));
        $event->flyer = $event->uploadImage($request->file('flyer'), $event->storage.'flyer/');
        return $event;
    }

    /**
     * validates update Request
     * @param Request $request
     * @return \Illuminate\Support\MessageBag | Event
     */
    private function validateUpdateRequest(Request $request, int $id)
    {
        $messeges = [
            'title.required' => 'Champ requis',
            'abbreviation.required' => 'Champ requis',
            'about.required' => 'Champ requis',
            'start_date.required' => 'Champ requis',
            'start_date.date' => 'devrait être une date valide (A-M-J H: M: S)',
            'start_date.after_or_equal' => 'Ne devrait pas être moins que demain',
            'dead_line.required' => 'Champ requis',
            'dead_line.date' => 'devrait être une date valide (A-M-J H: M: S)',
            'dead_line.after_or_equal' => 'Ne devrait pas être moins que demain',
            'end_date.required' => 'Champ requis',
            'end_date.date' => 'devrait être une date valide (A-M-J H: M: S)',
            'end_date.after_or_equal' => 'Ne devrait pas être moins que demain',
            'program.mimes' => 'devrait être une fichier(pdf, docx, txt)',
            'sliders.*.mimes' => 'devrait être une fichier(png, jpeg, jpg)',
            'flyer.mimes' => 'devrait être une fichier(png, jpeg, jpg)',
            'sliders.*.dimensions' => 'devrait être aux min 700/500 px',
            'sliders.max' => 'max 5 images',
            'state.required' => 'Champ requis',
            'city.required' => 'Champ requis',
            'street.required' => 'Champ requis',
        ];
        $rules = [
            'title' => 'required|string',
            'abbreviation' => 'required|string',
            'about' => 'required|string',
            'start_date' => 'required|date|after_or_equal:tomorrow',
            'dead_line' => 'required|date|after_or_equal:tomorrow',
            'end_date' => 'required|date|after_or_equal:start_date',
            'storage' => 'string',
            'program' => 'file|mimes:pdf,docx,txt',
            'flyer' => 'file|mimes:png,jpg,jpeg',
            'sliders.*' => 'file|mimes:png,jpeg,jpg|dimensions:min_width=700,min_height=500',
            'sliders' => 'max:5',
            'state' => 'required|string',
            'city' => 'required|string',
            'street' => 'required|string',
        ];
        $event = Event::findOrFail($id);
        $validator = Validator::make($request->toArray(), $rules, $messeges);
        $errros = $validator->errors();
        if ($validator->fails()) {
            return $errros;
        }
        return $event;
    }

}
