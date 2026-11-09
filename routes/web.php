<?php

use App\Http\Controllers\GuestInvitationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\RSVPController;
use App\Models\rsvp;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {

        $attending = rsvp::where('attendance_status', 'attending')->count();

        // Total Guests only counts attending guests
        $totalGuests = $attending;

        $notAttending = rsvp::where('attendance_status', 'not_attending')->count();

        $attendingGuests = rsvp::where('attendance_status', 'attending')
            ->latest()
            ->get();

        $notAttendingGuests = rsvp::where('attendance_status', 'not_attending')
            ->latest()
            ->get();

        return view('dashboard', compact(
            'totalGuests',
            'attending',
            'notAttending',
            'attendingGuests',
            'notAttendingGuests'
        ));

    })->name('dashboard');

    // Download attending guests as an Excel-readable CSV
    Route::get('/rsvp/attending/export', [RSVPController::class, 'exportAttending'])
        ->name('rsvp.export.attending');
});

Route::post('/home', [HomeController::class, 'store']);
Route::post('/rsvp', [RSVPController::class, 'store']);

Route::get('/guests/bulk-send', [GuestInvitationController::class, 'bulkSend'])->name('guest.bulk-send');
Route::get('/guests/{guest}/message', [GuestInvitationController::class, 'viewMessage'])->name('guest.view-message');
Route::get('/invitation/{guest}/{name?}', [InvitationController::class, 'show'])->name('invitation.show');