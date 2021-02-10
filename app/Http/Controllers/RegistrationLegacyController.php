<?php

namespace App\Http\Controllers;

use App\Models\RegistrationLegacy;
use Illuminate\Http\Request;

class RegistrationLegacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index() {
        $eventIds = [
            'Stammtisch 2021-02',
            'Stammtisch 2021-03'
        ];
        // get registrations per event
        // pass arrays to view
    }

    public static function pastevents() {
        $eventIds = [
            'Stammtisch 2021-01',
            'Stammtisch 2020-11',
            'Stammtisch 2020-08',
            'Stammtisch 2020-05',
            'Stammtisch 2020-04',
            'Stammtisch 2020-02',
            'Stammtisch 2020-01',
            'Stammtisch 2019-12'
        ];
    }

    private static function get_by_event(string $title) {
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
     * @param  \App\Models\RegistrationLegacy  $registrationLegacy
     * @return \Illuminate\Http\Response
     */
    public function show(RegistrationLegacy $registrationLegacy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegistrationLegacy  $registrationLegacy
     * @return \Illuminate\Http\Response
     */
    public function edit(RegistrationLegacy $registrationLegacy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegistrationLegacy  $registrationLegacy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegistrationLegacy $registrationLegacy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegistrationLegacy  $registrationLegacy
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegistrationLegacy $registrationLegacy)
    {
        //
    }
}
