<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    function can_register()
    {
        $event = new Event();
        $event->id = 77;
        $event->date = '2022-01-01';
        $event->title = 'test event';
        $event->is_registration_open = 1;
        $event->save();

        Livewire::test(\App\Http\Livewire\Registration::class)
            ->set('event_id', 77)
            ->set('name', 'Test Registration')
            ->set('is_virtual', 0)
            ->call('submit');

        $this->assertTrue(Registration::select('*')->where('name', 'Test Registration')->exists());

    }


}
