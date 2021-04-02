<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Registration;
use phpDocumentor\Reflection\Types\Boolean;

class ApiController extends Controller
{
    public static function get_api_info() {
        return [
            "Application" => "User Group Manager v2",
            "User group" => "FileMaker Zürich",
            "Available endpoints" => [
                "info",
                "next",
                "upcoming",
                "register"
            ],
            "Templates" => [
                "Postman collection" => "https://test.fmzuerich.ch/api_vorlagen/UserGroupManager.postman_collection.json",
                "FileMaker file" => "https://test.fmzuerich.ch/api_vorlagen/UserGroupManager_API_Client.fmp12"
            ]
        ];
    }

    public static function get_next_own_event() {
        $event = EventController::get_next_own_event();
        return $event;
    }

    public static function get_list_future_event() {
        $events = EventController::get_future_events();
        return $events;
    }

    public static function register(Request $request) {
        if(!$request->event_id || !$request->name) {
            return [
                "result" => "error",
                "message" => "required parameter(s) missing; event_id and name are required"
            ];
        }
        $event = Event::find((int)$request->event_id);
        if(!$event) {
            return [
                "result" => "error",
                "message" => "invalid event_id"
            ];
        } elseif(!$event->is_registration_open) {
            return [
                "result" => "error",
                "message" => "registration not possible for this event"
            ];
        }
        $registration = new Registration();
        $registration->event_id = $request->event_id;
        $registration->name = $request->name;
        $registration->email = $request->email;
        $registration->comment = $request->comment;
        $registration->is_virtual = $request->boolean('is_virtual');
        $result = $registration->save();
        if($result === true) {
            return [
                "result" => "success",
                "message" => "registration saved"
            ];
        } else {
            return [
                "result" => "error",
                "message" => "something went wrong"
            ];
        }
    }
}
