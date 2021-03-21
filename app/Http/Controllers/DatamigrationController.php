<?php

namespace App\Http\Controllers;

use App\Models\RegistrationLegacy;
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
}
