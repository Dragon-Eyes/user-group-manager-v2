<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationLegacy extends Model
{
    use HasFactory;

    protected $fillable = [
        'event',
        'participant_name',
        'participant_email',
        'comment',
        'virtual_flag',
        'deleted_flag'
    ];
}
