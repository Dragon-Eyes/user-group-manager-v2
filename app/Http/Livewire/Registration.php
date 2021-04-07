<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Registration extends Component
{
    public object $event;
    public function render()
    {
        return view('livewire.registration', [
            'event' => $event,
        ]);
    }
}
