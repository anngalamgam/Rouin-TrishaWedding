<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rsvp;

class RSVPController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'guest_name' => 'required|string|max:255',
            'attendance_status' => 'required|in:attending,not_attending',
        ]);

        rsvp::create($validated);

        return back()->with('success', 'Thank you for your response!');
    }
}