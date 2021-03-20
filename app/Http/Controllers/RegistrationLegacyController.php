<?php

namespace App\Http\Controllers;

use App\Models\RegistrationLegacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationLegacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index() {
        $eventIds = [
            'Stammtisch 2021-03',
            'Stammtisch 2021-04',
            'Stammtisch 2021-05',
            'Stammtisch 2021-06',
            'Stammtisch 2021-08',
        ];
        $registrations = [];
        foreach($eventIds as $eventId) {
            $registrations[$eventId] = self::get_by_event($eventId);
        }
        return view('legacy.index', compact('registrations'));
    }

    /**
     * Store a new event registration in database and reload page.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public static function register(Request $request) {
        $requestValidated = $request->validate([
        ]);
        $registrationData = $request->post()['registration'];
        $registrationType = $registrationData['presence'] == 'onsite' ? 0 : 1;
        $now = new \DateTime();
        $registrationCreated = $now->format('Y-m-d H:i:s');
        $registration = DB::insert('INSERT INTO registration_legacies (event, participant_name, participant_email, comment, virtual_flag, created_at) VALUES (?, ?, ?, ?, ?, ?)', [$registrationData['event'], $registrationData['participant_name'], $registrationData['participant_email'], $registrationData['comment'], $registrationType, $registrationCreated]);
        header("Location: /");
        exit();
    }

    public static function pastevents() {
        $eventIds = [
            'Stammtisch 2021-02',
            'Stammtisch 2021-01',
            'Stammtisch 2020-11',
            'Stammtisch 2020-08',
            'Stammtisch 2020-05',
            'Stammtisch 2020-04',
            'Stammtisch 2020-02',
            'Stammtisch 2020-01',
            'Stammtisch 2019-12'
        ];
        $registrations = [];
        foreach($eventIds as $eventId) {
            $registrations[$eventId] = self::get_by_event($eventId);
        }
//        return $registrations;
        return view('legacy.pastevents', compact('registrations'));
    }

    public static function statistics() {

        $data = [];
        return view('legacy.statistics', compact('data'));
    }

    private static function get_by_event(string $title) :array {
        return DB::select('SELECT participant_name, comment, virtual_flag, deleted_flag FROM registration_legacies WHERE event = ? AND deleted_flag = ?', [$title, 0]) ?? [];
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
     * @param  \App\Models\RegistrationLegacy  $registrationLegacy
     * @return \Illuminate\Http\Response
     */
    public function show(RegistrationLegacy $registrationLegacy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegistrationLegacy  $registrationLegacy
     * @return \Illuminate\Http\Response
     */
    public function edit(RegistrationLegacy $registrationLegacy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegistrationLegacy  $registrationLegacy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegistrationLegacy $registrationLegacy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegistrationLegacy  $registrationLegacy
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegistrationLegacy $registrationLegacy)
    {
        //
    }
}
