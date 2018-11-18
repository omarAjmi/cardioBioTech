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
use App\Http\Requests\CreateEventRequest;
use Illuminate\Support\Facades\Validator;

class EventsController extends Controller
{
    /**
     * serves the Events view
     *
     * @return \Illuminate\Http\Response
     */
    public function events()
    {
        $events = Event::all()->sortByDesc('created_at');
        foreach ($events as $event) {
            $event->start_date = new Date($event->start_date);
            $event->end_date = new Date($event->end_date);
            $event->address = json_decode($event->address);
        }
        
        return view('admin.events.events', [
            'events' => $events
        ]);
    }

    /**
     * serves the new Event view
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        return view('admin.events.new');
    }

    /**
     * creates an Event
     *
     * @param CreateEventRequest $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateEventRequest $request)
    {
        $event = new Event();
        $event->title = $request->title;
        $event->abbreviation = $request->abbreviation;
        $event->about = $request->about;
        $event->organiser = $request->organiser;
        $event->start_date = $request->start_date;
        $event->dead_line = $request->dead_line;
        $event->end_date = $request->end_date;
        $event->storage = env('EVENT_STORAGE_PATH', '/events/').$request->abbreviation.'/';
        $event->program_file = $event->uploadProgramFile($request->file('program'), $event->abbreviation);
        $event->address = json_encode([
            'state' => $request->state,
            'city' => $request->city,
            'street' => $request->street
            ]);
        $event->save();
        foreach ($request->file('sliders') as $key => $sliderFile) {
            Slider::create([
                'event_id' => $event->id,
                'name'=> $event->storage.'sliders/'.$event->uploadSlider($sliderFile, $key)
            ]);
        }
        Commitee::create(['event_id'=>$event->id]);
        Gallery::create(['event_id'=>$event->id]);
        Session::flash('success', 'événement est créé avec succès');
        return redirect(route('admin.events'));
    }

    public function preview(int $id)
    {
        $event = Event::findOrFail($id);
        $event->start_date = new Date($event->start_date);
        $event->end_date = new Date($event->end_date);
        $event->address = json_decode($event->address);
        return view('admin.events.preview', ['event' => $event]);
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
            'sliders.*' => 'file|mimes:png,jpeg,jpg',
            'state' => 'required|string',
            'city' => 'required|string',
            'street' => 'required|string',
        ];
        $event = Event::findOrFail($id);
        $validator = Validator::make($request->toArray(), $rules, $messeges);
        $errros = $validator->errors();
        if ($validator->fails()) {
            return back()->with(['errors'=>$errros]);
        }
        $event->update([
            'title' => $request->title,
            'abbreviation' => $request->abbreviation,
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
            $event->program_file = $event->uploadProgramFile($request->file('program'), $event->abbreviation);
        }
        if ($request->hasFile('sliders')) {
            if (is_dir(Storage::disk('public')->path($event->storage.'sliders'))) {
                Storage::disk('public')->deleteDirectory($event->storage.'sliders');
            }
            foreach ($event->sliders as $slider) {
                $slider->delete();
            }
            foreach ($request->file('sliders') as $key => $sliderFile) {
                Slider::create([
                    'event_id' => $event->id,
                    'name'=> $event->storage.'/sliders/'.$event->uploadSlider($sliderFile, $key)
                ]);
            }
        }
        $event->save();
        Session::flash('success', 'évènnement est mis à jour');
        return redirect(route('admin.events'));
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
        return Storage::disk('public')->download($event->storage.$event->program_file);
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
        Storage::disk('public')->deleteDirectory(env('EVENT_STORAGE_PATH', '/events/').'/'.$event->abbreviation);
        $event->delete($id);
        Session::flash('success', 'évènnement est suprimé');
        return redirect(route('admin.events'));
    }
}
