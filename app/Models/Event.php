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
        'isOwnEvent',
        'isOnline',
        'isOnsite',
        'registrationOpen'
    ];

/*    public static function get_events_own() {
        return Event::all();
    }*/
}
