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




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LogLegacy  $logLegacy
     * @return \Illuminate\Http\Response
     */
    public function show(LogLegacy $logLegacy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LogLegacy  $logLegacy
     * @return \Illuminate\Http\Response
     */
    public function edit(LogLegacy $logLegacy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LogLegacy  $logLegacy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LogLegacy $logLegacy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LogLegacy  $logLegacy
     * @return \Illuminate\Http\Response
     */
    public function destroy(LogLegacy $logLegacy)
    {
        //
    }
}
