<?php

namespace App\Http\Controllers;

use App\Models\Registration;
// not RegistrationLegacy !!!

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatamigrationController extends Controller {

    /*
    public static function registrations() {
        $registrations = DB::select('SELECT * FROM registrations_v1');
        foreach($registrations as $registration) {
            if(!$registration->virtual_flag) {
                $registration->virtual_flag = 0;
            }
            if(!$registration->participant_email) {
                $registration->participant_email = null;
            }
            $registrationNew = DB::insert('INSERT INTO registration_legacies (event, participant_name, participant_email, comment, virtual_flag, deleted_flag, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)', [$registration->event, $registration->participant_name, $registration->participant_email, $registration->comment, $registration->virtual_flag, $registration->deleted_flag, $registration->creation_timestamp, null]);
//            echo $registrationNew . '<br>';
        }
    }
    */

    public static function registrations() {
        $registrations = DB::select('SELECT * FROM registration_legacies');
        foreach($registrations as $registration) {
            $registrationObject = new Registration();
            $registrationObject->name = $registration->participant_name;
            $registrationObject->email = $registration->participant_email;
            $registrationObject->comment = $registration->comment;
            $registrationObject->is_virtual = $registration->virtual_flag ?? 0;
            $registrationObject->is_deleted = $registration->deleted_flag ?? 0;
            $registrationObject->created_at = $registration->created_at;
            $registrationObject->updated_at = $registration->updated_at;

            switch($registration->event) {
                case 'Stammtisch 2019-12':
                    $registrationObject->event_id = 1;
                    break;
                case 'Stammtisch 2020-01':
                    $registrationObject->event_id = 2;
                    break;
                case 'Stammtisch 2020-02':
                    $registrationObject->event_id = 3;
                    break;
                case 'Stammtisch 2020-04':
                    $registrationObject->event_id = 4;
                    break;
                case 'Stammtisch 2020-05':
                    $registrationObject->event_id = 5;
                    break;
                case 'Stammtisch 2020-08':
                    $registrationObject->event_id = 6;
                    break;
                case 'Stammtisch 2020-11':
                    $registrationObject->event_id = 7;
                    break;
                case 'Stammtisch 2021-01':
                    $registrationObject->event_id = 8;
                    break;
                case 'Stammtisch 2021-02':
                    $registrationObject->event_id = 9;
                    break;
                case 'Stammtisch 2021-04':
                    $registrationObject->event_id = 10;
                    break;
                case 'Stammtisch 2021-05':
                    $registrationObject->event_id = 11;
                    break;
                default:
                    $registrationObject->event_id = 0;
            }
            $query = 'INSERT INTO registrations';
            $query .= ' (name, email, comment, is_virtual, is_deleted, created_at, updated_at, event_id)';
            $query .= ' VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
            $values = [
                $registrationObject->name,
                $registrationObject->email,
                $registrationObject->comment,
                $registrationObject->is_virtual,
                $registrationObject->is_deleted,
                $registrationObject->created_at,
                $registrationObject->updated_at,
                $registrationObject->event_id
            ];
            $registrationNew = DB::insert($query, $values);
        }
    }
}
