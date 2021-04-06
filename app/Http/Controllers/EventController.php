<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller {

    public function pasteventsnew() {
        $eventsPast = DB::select('SELECT * FROM events WHERE is_own_event = 1 AND date < (SELECT DATE_ADD(CURRENT_DATE, INTERVAL 0 DAY )) ORDER BY date DESC');
        foreach($eventsPast as $event) {
            $date = new \DateTime($event->date);
            $event->dateText = $date->format('d.m.Y');
            $event->attachments = DB::select('SELECT * FROM attachments WHERE event_id = ?', [$event->id]);
            $event->registrations = DB::select('SELECT * FROM registrations WHERE event_id = ? ORDER BY created_at DESC', [$event->id]);
        }
        return view('legacy.pasteventsnew', compact('eventsPast'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $eventsFuture = DB::select('SELECT * FROM events WHERE date > (SELECT DATE_ADD(CURRENT_DATE, INTERVAL -1 DAY )) ORDER BY date ASC');
        foreach($eventsFuture as $event) {
            $date = new \DateTime($event->date);
            $event->dateText = $date->format('d.m.Y');
            $event->registrations = DB::select('SELECT * FROM registrations WHERE event_id = ? ORDER BY created_at DESC', [$event->id]);
            foreach($event->registrations as $registration) {
                $registration->placeText = $registration->is_virtual ? 'virtuell' : 'vor Ort';
            }
        }
        return view('legacy.indexcomponents', compact('eventsFuture'));
    }

    public static function get_next_own_event() :object|bool {
        $today = new \DateTime();
        $todayText = $today->format('Y-m-d');
        $event = Event::select('id', 'date', 'title', 'description', 'is_onsite', 'is_online', 'is_registration_open', 'updated_at')
            ->where('is_own_event', 1)
            ->where('date', '>', $todayText)
            ->orderBy('date', 'asc')
            ->take(1)
            ->get();
        return $event;
    }

    public static function get_future_events() :object|bool {
        $today = new \DateTime();
        $todayText = $today->format('Y-m-d');
        $events = Event::select('id', 'date', 'title', 'is_online', 'is_online')
                ->where('date', '>', $todayText)
                ->orderBy('date', 'asc')
                ->get();
        return $events;
    }

    public static function get_active_events() :array {
        $events = DB::select('SELECT * FROM events WHERE date > (SELECT DATE_ADD(CURRENT_DATE, INTERVAL -1 DAY )) ORDER BY date ASC');
        return $events;
    }

    public static function get_by_id($id) {
        $event = Event::find($id);
        return $event;
    }

    /**
     * @return bool
     */
    public static function create(Request $request)
    {
        $event = new Event();
        $event->date = $request->input('date');
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->is_own_event = $request->has('is_own_event') ? 1 : 0;
        $event->is_online = $request->has('is_online') ? 1 : 0;
        $event->is_onsite = $request->has('is_onsite') ? 1 : 0;
        $event->is_registration_open = $request->has('is_registration_open') ? 1 : 0;
        $event->created_by = auth()->id();
        return $event->save();
    }

    /**
     * @return bool
     */
    public static function update(Request $request)
    {
        $event = Event::find($request->input('event_id'));
        $event->date = $request->input('date');
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->is_own_event = $request->has('is_own_event') ? 1 : 0;
        $event->is_online = $request->has('is_online') ? 1 : 0;
        $event->is_onsite = $request->has('is_onsite') ? 1 : 0;
        $event->is_registration_open = $request->has('is_registration_open') ? 1 : 0;
        $event->updated_by = auth()->id();
        return $event->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
