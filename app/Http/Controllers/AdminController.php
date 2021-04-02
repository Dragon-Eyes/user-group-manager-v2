<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        $events = EventController::get_active_events();
        foreach($events as $event) {
            $date = new \DateTime($event->date);
            $event->dateText = $date->format('d.m.Y');
            $registrations = Registration::where('is_deleted', 0)
                ->where('event_id', $event->id)
                ->orderBy('created_at', 'desc')
                ->get();
            $event->registrations = $registrations;
        }
        $content = ContentController::get_all();
        return view('admin.dashboard', compact('events', 'content'));
    }

    public function eventcreate() {
        return view('admin.eventcreate');
    }

    public function eventsavenew(Request $request) {
        EventController::create($request);
        return redirect()->route('admin');
    }

    public function eventedit($event_id) {
        $event = EventController::get_by_id($event_id);
        return view('admin.eventedit', compact('event'));
    }

    public function eventsave(Request $request) {
        EventController::update($request);
        return redirect()->route('admin');
    }

    public function contentsave(Request $request) {
        ContentController::update($request);
        return redirect()->route('admin');
    }
}
