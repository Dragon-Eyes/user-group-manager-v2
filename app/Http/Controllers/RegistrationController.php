<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistrationRequest;
use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\String\s;

class RegistrationController extends Controller {

    public static function getEventnameParticipantCountForAll() :array|object {
        $events = Event::where('is_own_event', 1)->orderBy('date', 'asc')->get();
        foreach($events as $event) {
            $name = new \DateTime($event->date);
            $event->event = $name->format('Y-m');
            $event->participants = Registration::where('event_id', $event->id)->count();
        }
        return $events;
    }

    public static function getCountForEvent($event_id) :int {
//        public static function getCountForEvent(int|string $event_id) :int {
        $sql = "SELECT COUNT(*) AS COUNT FROM registrations";
        $sql .= " WHERE is_deleted = ?";
        $sql .= " AND event_id = ?";
        $result = DB::select($sql, [0, $event_id]) ?? 0;
        return $result[0]->COUNT;
    }

    public static function get_by_event($event_id) {
//        public static function get_by_event(int|string $event_id) {
        $registrations = Registration::where('event_id', $event_id)->orderBy('created_at', 'desc')->get();
        foreach($registrations as $registration) {
            $registration->placeText = $registration->is_virtual ? 'virtuell' : 'vor Ort';
        }
        return $registrations;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(StoreRegistrationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public static function destroy(int|string $event_id)
    {
        $registration = Registration::find($event_id);
        if($registration) {
            $registration->delete();
        }
        return redirect()->route('admin');
    }

    public static function insert_and_get(string|null $new = '') {
        if($new) {
            $registration = new Registration();
            $registration->event_id = 36;
            $registration->name = $new;
            $registration->is_virtual = true;
            $registration->save();
        }
        return Registration::query()->where('event_id', 36);
    }
}
