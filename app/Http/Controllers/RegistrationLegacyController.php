<?php

namespace App\Http\Controllers;

use App\Models\RegistrationLegacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationLegacyController extends Controller
{
    /**
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
        return view('legacy.pastevents', compact('registrations'));
    }

    public static function statistics() {

        $data = [];
        return view('legacy.statistics', compact('data'));
    }

    private static function get_by_event(string $title) :array {
        return DB::select('SELECT participant_name, comment, virtual_flag, deleted_flag FROM registration_legacies WHERE event = ? AND deleted_flag = ? ORDER BY created_at DESC', [$title, 0]) ?? [];
    }

    public static function getEventnameParticipantCountForAll() :array {
        $events = self::getEventNames();
        foreach($events as $event) {
            $eventObject = new \stdClass();
            $eventObject->event = substr($event->event, 11);
            $count = self::getCountForEvent($event->event);
            $eventObject->participants = self::getCountForEvent($event->event);
            $eventArray[] = $eventObject;
        }
        return $eventArray;
    }

    private static function getEventNames() :array {
        $sql = "SELECT DISTINCT event FROM registration_legacies";
        $sql .= " WHERE deleted_flag = ?";
        $sql .= " ORDER BY event ASC";
        return DB::select($sql, [0]) ?? [];
    }

    private static function getCountForEvent(string $event) :int {
        $sql = "SELECT COUNT(*) AS COUNT FROM registration_legacies";
        $sql .= " WHERE deleted_flag = ?";
        $sql .= " AND event = ?";
        $result = DB::select($sql, [0, $event]) ?? 0;
        return $result[0]->COUNT;
    }
}
