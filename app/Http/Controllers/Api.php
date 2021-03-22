<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Api extends Controller
{
    public static function get_api_info() {
        return [
            "Application" => "User Group Manager v2",
            "Available endpoints" => [
                "info",
                "next (soon)",
                "upcoming (soon)",
                "register (soon)"
            ],
            "User group" => "FileMaker Zürich"
        ];
    }
}
