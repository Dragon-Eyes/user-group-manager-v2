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
                "next (soon)",
                "upcoming (soon)",
                "register (soon)"
            ]
        ];
    }
}
