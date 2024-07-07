<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GuestController extends Controller
{
    public function index() {
        return view('guest.dashboard');
    }

    public function create_booking(Request $request) {
        $user = $request->session()->get('user');

        $validatedData = $request->validate([
            'room_id' => 'required|integer',
            'booking_date' => 'required|date',
        ]);

        $uuid = Str::uuid()->toString();
        
        $booking_id = DB::table('room_bookings')->insertGetId([
            'id_booking_room' => $uuid,
            'username' => $user->username,
            'id_kamar' => $validatedData['status'],
            'check_in' => $validatedData['check_in'],
            'check_out' => $validatedData['check_out'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect('./')->status('id', $booking_id);
    }

    public function user_feature() {
        // list kamar tersedia

        $rooms = Kamar::all();

        public function show_all_room() {
            $rooms = Kamar::all();
    
            return view("menu", [
                'rooms' => $rooms
            ]);
        }

        public function history_room_booking() {
            $rooms_booking = DB::table('room_bookings')->get();
    
            return view("menu", [
                'rooms_booking' => $rooms_booking
            ]);
        }


        // detail kamar
    }
}
