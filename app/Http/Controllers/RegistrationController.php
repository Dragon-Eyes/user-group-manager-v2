<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller {

    public static function getEventnameParticipantCountForAll() :array {

        // TODO: fix eloquent query


        $events = Event::where('isOwnEvent', 1)->get();
//        $events = self::getEventNames();
        foreach($events['items'] as $event) {
            $eventObject = new \stdClass();
            $eventObject->id = $event->attributes['id'];
            $eventObject->participants = self::getCountForEvent($eventObject->id);
            $eventArray[] = $eventObject;
        }
        return $eventArray;
    }

    private static function getCountForEvent(int|string $event_id) :int {
        $sql = "SELECT COUNT(*) AS COUNT FROM registrations";
        $sql .= " WHERE is_deleted = ?";
        $sql .= " AND event_id = ?";
        $result = DB::select($sql, [0, $event_id]) ?? 0;
        return $result[0]->COUNT;
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
    public function store(Request $request)
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
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registration $registration)
    {
        //
    }
}
