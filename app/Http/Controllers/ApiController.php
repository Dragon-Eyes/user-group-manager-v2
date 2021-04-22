<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Registration;
use phpDocumentor\Reflection\Types\Boolean;

class ApiController extends Controller
{
    public static function get_api_info() {
        $log = \App\Http\Controllers\LogLegacyController::write('apirequest', "/info");
        return [
            "title" => "User Group Manager v2",
            "description" => "API of the user group FileMaker Zürich",
            "contact" => [
                "name" => "FM Zürich",
                "email" => "stammtisch@fmzuerich.ch"
            ],
            "license" => [
                "name" => "MIT",
                "url" => "https://github.com/Dragon-Eyes/user-group-manager-v2/blob/main/LICENSE"
            ],
            "version" => "0.9.3",
            "servers" => [
                [
                    "url" => "https://test.fmzuerich.ch/api/",
                    "description" => "Test server"
                ],
                [
                    "url" => "https://fmzuerich.ch/api/",
                    "description" => "Production server"
                ]
            ],
            "available endpoints" => [
                "info",
                "next-event",
                "event/{id}",
                "upcoming-events",
                "register"
            ],
            "templates" => [
                "Postman collection" => "https://test.fmzuerich.ch/api_vorlagen/UserGroupManager.postman_collection.json",
                "FileMaker file" => "https://test.fmzuerich.ch/api_vorlagen/UserGroupManager_API_Client.fmp12"
            ]
        ];
    }

    public static function get_next_own_event() {
        $log = \App\Http\Controllers\LogLegacyController::write('apirequest', "/next-event");
        $event = EventController::get_next_own_event();
        return $event;
    }

    public static function get_list_future_event() {
        $log = \App\Http\Controllers\LogLegacyController::write('apirequest', "/upcoming-events");
        $events = EventController::get_future_events();
        return $events;
    }

    public static function get_by_id($id) {
        $log = \App\Http\Controllers\LogLegacyController::write('apirequest', "/event/" . $id);
        $event = Event::find((int)$id);
        if(!$event) {
            return [
                "result" => "error",
                "message" => "event not found"
            ];
        }
        return $event;
    }

    public static function register(Request $request) {
        $log = \App\Http\Controllers\LogLegacyController::write('apirequest', "/register | " . $request->event_id . " | " . $request->name);
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
        $new_id = $registration->id;
        if($result === true) {
            return [
                "result" => "success",
                "message" => "registration saved",
                "registration_id" => $new_id
            ];
        } else {
            return [
                "result" => "error",
                "message" => "something went wrong"
            ];
        }
    }
}
