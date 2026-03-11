<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'date' => 'required|date',
            'time' => 'required|string',
        ]);

        DB::table('bookings')->insert([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'date' => $validated['date'],
            'time' => $validated['time'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Бронирование успешно отправлено!');
    }
}