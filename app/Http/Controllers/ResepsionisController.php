<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class ResepsionisController extends Controller
{
    public function index() {
        return view('resepsionis');
    }

    public function assign_new_room(Request $request) {
        $validated = $request->validate([
            // 'room_id' => 'required|exists:rooms,id',
            'tipe_kamar' => 'required|string',
            'harga_kamar' => 'required|string',
            'status_kamar' => 'required|boolean',
            // 'check_in' => 'required|date',
            // 'check_out' => 'required|date|after:check_in_date',
        ]);

        $new_nomor_kamar = Kamar::get(['nomor_kamar'])->last();

        $kamar = new Kamar();

        $kamar->nomor_kamar = $new_nomor_kamar;
        $kamar->tipe_kamar = $validated['tipe_kamar'];
        $kamar->harga_kamar = $validated['harga_kamar'];
        $kamar->deskripsi = $validated['deskripsi'];
        $kamar->status_kamar = 1;

        $kamar->save();

        return redirect()->back()->with('status', 'sukses menambahkan kamar');
    }

    public function edit_room(Request $request, string $id_kamar) {
        $intIdKamar = strval($id_kamar);

        
    }
}
