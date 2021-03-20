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
}
