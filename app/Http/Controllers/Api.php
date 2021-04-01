<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class Api extends Controller
{
    public static function get_api_info() {
        return [
            "Application" => "User Group Manager v2",
            "User group" => "FileMaker Zürich",
            "Available endpoints" => [
                "info",
                "next",
                "upcoming (soon)",
                "register (soon)"
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
        return [
            "Info" => "coming soon"
        ];
    }

    public static function register(Request $request) {
        if(!$request->event_id || !$request->name) {
            return [
                "result" => "error",
                "message" => "required parameter(s) missing; event_id and name are required"
            ];
        }

        $registration = new Registration();
        $registration->id = $request->event_id;
        $registration->name = $request->name;
        $registration->email = $request->email;
        $registration->comment = $request->comment;
        $registration->is_virtual = $request->is_virtual;

        // TODO: check if event_id is valid event with registration_open

        return [
            "Info" => "coming soon / work in progress",
            "Name" => $registration->name
        ];
    }
}
