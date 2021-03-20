<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogLegacy extends Model
{
    use HasFactory;

    protected $fillable = [
        'event',
        'note'
    ];
}
