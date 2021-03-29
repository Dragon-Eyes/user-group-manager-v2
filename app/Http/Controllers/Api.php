<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public static function register() {
        return [
            "Info" => "coming soon"
        ];
    }
}
