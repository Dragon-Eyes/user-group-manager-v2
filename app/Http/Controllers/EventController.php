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

    public static function get_next_own_event() :object {
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
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
