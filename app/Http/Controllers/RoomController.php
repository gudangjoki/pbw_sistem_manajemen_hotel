<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    

    // public function show_all_room() {
    //     $rooms = Kamar::all();

    //     return view("menu", [
    //         'rooms' => $rooms
    //     ]);
    // }

    public function detail_room(string $id_room) {
        $room = Kamar::where('id_kamar', $id_room)->get();

        return view("menu", [
            'room' => $room
        ]);
    }

}
