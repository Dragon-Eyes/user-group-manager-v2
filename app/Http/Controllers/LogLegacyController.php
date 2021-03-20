<?php

namespace App\Http\Controllers;

use App\Models\LogLegacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogLegacyController extends Controller
{
    /**
     * Write Log entry to database.
     *
     * @param string $event
     * @param string $note
     */
    public static function write(string $event, string $note)
    {
        $now = new \DateTime();
        $logCreated = $now->format('Y-m-d H:i:s');
        return DB::insert('INSERT INTO log_legacies (event, note, created_at) VALUES (?, ?, ?)', [$event, $note, $logCreated]);
    }

    public static function get_pageviews_total() :int {
        $event = 'pageview';
        $sql = "SELECT COUNT(*) AS COUNT FROM log_legacies";
        $sql .= " WHERE event = ?";
        $result = DB::select($sql, [$event]) ?? 0;
        return $result[0]->COUNT;
    }

    private static function get_pageviews_day($date = '') :int {
        $day_timestamp = strtotime($date);
        $day_timestamp = date('Y-m-d', $day_timestamp);
        $timestamp_start = $day_timestamp . ' 00:00:00';
        $timestamp_end = $day_timestamp . ' 23:59:59';
        $event = 'pageview';
        $sql = "SELECT COUNT(*) AS COUNT FROM log_legacies";
        $sql .= " WHERE event = ?";
        $sql .= " AND created_at BETWEEN ? AND ?";
        $result = DB::select($sql, [$event, $timestamp_start, $timestamp_end]);
        return $result[0]->COUNT;
    }

    public static function get_pageviews($dateStart = '2020-10-26') {
        $dateFocus = $dateStart;
        $logObjectArray = [];
        while(strtotime($dateFocus) <= strtotime(date('Y-m-d'))) {
            $logObject = new \stdClass();
            $logObject->day = $dateFocus;
            $logObject->pageviews = static::get_pageviews_day($dateFocus);
            $logObjectArray[] = $logObject;
            $dateFocus = date('Y-m-d', strtotime($dateFocus) + ( 60 * 60 * 24 ));
        }
        return $logObjectArray;
    }
}
