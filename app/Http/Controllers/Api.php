<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Registration;
use phpDocumentor\Reflection\Types\Boolean;

class Api extends Controller
{
    public static function get_api_info() {
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
            "version" => "0.9.0",
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
                "next",
                "upcoming",
                "register"
            ],
            "templates" => [
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
