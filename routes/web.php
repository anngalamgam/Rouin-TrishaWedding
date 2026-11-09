<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RSVPController;
use App\Models\rsvp;

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {

    $attending = RSVP::where('attendance_status', 'attending')->count();

    // Total Guests only counts attending guests
    $totalGuests = $attending;

    $notAttending = RSVP::where('attendance_status', 'not_attending')->count();

    $attendingGuests = RSVP::where('attendance_status', 'attending')
        ->latest()
        ->get();

    $notAttendingGuests = RSVP::where('attendance_status', 'not_attending')
        ->latest()
        ->get();

    return view('dashboard', compact(
        'totalGuests',
        'attending',
        'notAttending',
        'attendingGuests',
        'notAttendingGuests'
    ));

})->middleware(['auth'])->name('dashboard');

Route::post('/home', [HomeController::class, 'store']);
Route::get('/guests/bulk-send', [App\Http\Controllers\GuestInvitationController::class, 'bulkSend'])->name('guest.bulk-send');
Route::get('/guests/{guest}/message', [App\Http\Controllers\GuestInvitationController::class, 'viewMessage'])->name('guest.view-message');
Route::get('/invitation/{guest}/{name?}', [\App\Http\Controllers\InvitationController::class, 'show'])->name('invitation.show');
Route::post('/rsvp', [RSVPController::class, 'store']);