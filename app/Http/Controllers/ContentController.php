<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public static function get_all() {
        $content = Content::find(1);
        return $content;
    }

    public static function get_alert_html() {
        $html = Content::select(['alert'])->find(1);
        return $html;
    }

    public static function get_intro_html() {
        $html = Content::select(['intro'])->find(1);
        return $html;
    }

    public static function get_forum_html() {
        $html = Content::select(['forum'])->find(1);
        return $html;
    }

    /**
     * @return bool
     */
    public static function update(Request $request)
    {
        $content = Content::find(1);
        $content->alert = $request->input('alert');
        $content->intro = $request->input('intro');
        $content->forum = $request->input('forum');
        $content->countdown = $request->input('countdown');
        return $content->save();
    }

}
