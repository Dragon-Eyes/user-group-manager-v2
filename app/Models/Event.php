<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'title',
        'description',
        'is_own_event',
        'is_online',
        'is_onsite',
        'is_registration_open'
    ];

/*    public static function get_events_own() {
        return Event::all();
    }*/
}
