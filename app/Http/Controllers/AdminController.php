<?php

namespace App\Http\Controllers;

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
        return view('admin.dashboard', compact('events'));
    }
}
