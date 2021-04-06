<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistrationRequest;
use App\Models\Event;
use App\Models\RegistrationLegacy;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\DB;

class RegistrationLegacyController extends Controller
{
    /**
     * Store a new event registration in database and reload page.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public static function register(StoreRegistrationRequest $request) {
//        $registrationData = $request->post()['registration'];
        $registrationData = $request->post();
        $event = Event::find((int)$registrationData['event_id']);
        if(!$event || !$event->is_registration_open) {
            header("Location: /");
            exit();
        }
        $registrationType = $registrationData['presence'] == 'onsite' ? 0 : 1;
        $now = new \DateTime();
        $registrationCreated = $now->format('Y-m-d H:i:s');
//        $registrationOld = DB::insert('INSERT INTO registration_legacies (event, participant_name, participant_email, comment, virtual_flag, created_at) VALUES (?, ?, ?, ?, ?, ?)', [$registrationData['event'], $registrationData['participant_name'], $registrationData['participant_email'], $registrationData['comment'], $registrationType, $registrationCreated]);
        $registration = DB::insert('INSERT INTO registrations (event_id, name, email, comment, is_virtual, created_at) VALUES (?, ?, ?, ?, ?, ?)', [$registrationData['event_id'], $registrationData['name'], $registrationData['email'], $registrationData['comment'], $registrationType, $registrationCreated]);
        header("Location: /");
        exit();
    }

    public static function statistics() {
        $data = [];
        return view('legacy.statistics', compact('data'));
    }

    private static function get_by_event_title(string $title) :array {
        return DB::select('SELECT participant_name, comment, virtual_flag, deleted_flag FROM registration_legacies WHERE event = ? AND deleted_flag = ? ORDER BY created_at DESC', [$title, 0]) ?? [];
    }

    private static function get_by_event_id(int|string $id) :array {
        // TODO: switch to event_id
        return DB::select('SELECT participant_name, comment, virtual_flag, deleted_flag FROM registration_legacies WHERE id = ? AND deleted_flag = ? ORDER BY created_at DESC', [$id, 0]) ?? [];
    }

    private static function getEventNames() :array {
        $sql = "SELECT DISTINCT event FROM registration_legacies";
        $sql .= " WHERE deleted_flag = ?";
        $sql .= " ORDER BY event ASC";
        return DB::select($sql, [0]) ?? [];
    }
}
