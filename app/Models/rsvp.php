<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rsvp extends Model
{
    protected $fillable = [
        'guest_name',
        'attendance_status',
    ];
}