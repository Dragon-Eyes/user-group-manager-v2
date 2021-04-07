<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class Registration extends Component
{
    public $eventId;
    public $event = Event::find($eventId);
    public function render()
    {
        return view('livewire.registration');
    }
}
