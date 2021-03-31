<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public static function get_alert_text() {
        $text = Content::select(['alert'])->find(1);
        return $text;
    }

    public static function get_intro_html() {
        $html = Content::select(['intro'])->find(1);
        return $html;
    }
}
