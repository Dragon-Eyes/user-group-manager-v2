<?php

namespace App\Http\Livewire;

use App\Http\Controllers\RegistrationController;
use App\Models\Event;
use Livewire\Component;

class Registration extends Component
{
    public $eventId;
    public $name;
//    public $isOnline;
//    public $isOnsite;
    public $presence;
    public $email;
    public $comment;

    public function render()
    {
        return view('livewire.registration', [
            'event' => Event::find($this->eventId),
            'registrations' => RegistrationController::get_by_event($this->eventId),
            'registrationCount' => RegistrationController::getCountForEvent($this->eventId),
        ]);
    }

    public function submit() {
        $registration = new \App\Models\Registration();
        $registration->event_id = $this->eventId;
        $registration->name = $this->name;
        $registration->is_virtual = $this->presence == 'virtual' ? 1 : 0;
        $registration->email = $this->email;
        $registration->comment = $this->comment;
        $registration->save();
        return view('livewire.registration', [
            'event' => Event::find($this->eventId),
            'registrations' => RegistrationController::get_by_event($this->eventId),
            'registrationCount' => RegistrationController::getCountForEvent($this->eventId),
        ]);
    }
}
