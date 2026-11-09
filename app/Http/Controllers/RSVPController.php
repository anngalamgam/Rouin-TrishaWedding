<?php

namespace App\Http\Controllers;

use App\Models\rsvp;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class RSVPController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'guest_name'        => 'required|string|max:255',
            'attendance_status' => 'required|in:attending,not_attending',
        ]);

        rsvp::create($validated);

        return back()->with('success', 'Thank you for your response!');
    }

    public function dashboard()
    {
        $attendingGuests    = rsvp::where('attendance_status', 'attending')->latest()->get();
        $notAttendingGuests = rsvp::where('attendance_status', 'not_attending')->latest()->get();

        return view('dashboard', [
            'attendingGuests'    => $attendingGuests,
            'notAttendingGuests' => $notAttendingGuests,
            'attending'          => $attendingGuests->count(),
            'notAttending'       => $notAttendingGuests->count(),
            'totalGuests'        => $attendingGuests->count() + $notAttendingGuests->count(),
        ]);
    }

    public function exportAttending(): StreamedResponse
    {
        $guests = rsvp::where('attendance_status', 'attending')
            ->orderBy('created_at')
            ->get();

        $filename = 'attending-guests-' . now()->format('Y-m-d') . '.csv';

        // Stops names starting with = + - @ from running as Excel formulas
        $safe = fn ($v) => preg_match('/^[=+\-@]/', (string) $v) ? "'" . $v : $v;

        return response()->streamDownload(function () use ($guests, $safe) {
            $out = fopen('php://output', 'w');
            fwrite($out, "\xEF\xBB\xBF"); // UTF-8 BOM so Excel shows accents correctly

            fputcsv($out, ['#', 'Guest Name', 'Date']);

            foreach ($guests as $i => $guest) {
                fputcsv($out, [
                    $i + 1,
                    $safe($guest->guest_name),
                    $guest->created_at->format('M d, Y'),
                ]);
            }

            fclose($out);
        }, $filename, ['Content-Type' => 'text/csv; charset=UTF-8']);
    }
}