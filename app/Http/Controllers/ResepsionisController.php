<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class ResepsionisController extends Controller
{
    // public function index() {
    //     return view('resepsionis.dashboard');
    // }
    public function showListKonfirmasi()
    {
        return view('resepsionis.list_konfirmasi');
    }

    public function showListVerifikasi()
    {
        return view('resepsionis.list_verifikasi');
    }
    public function showCalender()
    {
        return view('resepsionis.calender');
    }
    public function showDetailVerifikasi()
    {
        return view('resepsionis.detail_verifikasi');
    }
    public function showDetailKonfirmasi()
    {
        return view('resepsionis.detail_konfirmasi');
    }
    public function resepsionis_dashboard(Request $request) {

        error_log('knt: ' . $request->fullUrl());
        $url = $request->fullUrl();
    
        $parsed_path_url = parse_url($url);
        $parsed_path_url = isset($parsed_path_url['path']) ? $parsed_path_url['path'] : '';
    
        $segments = explode('/', trim($parsed_path_url, '/'));

        foreach ($segments as $index => $segment) {
            $result['segment' . ($index + 1)] = $segment;
        }

        if (in_array('calender', $result) && in_array('dashboard', $result)) {
            
        }

        return view('resepsionis.dashboard', [
            'result' => $result
        ]);
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

        $validated = $request->validate([
            'tipe_kamar' => 'required|string',
            'harga_kamar' => 'required|string',
            'status_kamar' => 'required|boolean',
        ]);

        $kamar = Kamar::where('id_kamar', $intIdKamar)->first();

        // $kamar->nomor_kamar = $new_nomor_kamar;
        $kamar->tipe_kamar = $validated['tipe_kamar'];
        $kamar->harga_kamar = $validated['harga_kamar'];
        $kamar->deskripsi = $validated['deskripsi'];
        // $kamar->status_kamar = 1;

        $kamar->save();

        return redirect()->back()->with('status', 'sukses menambahkan kamar');
    }

    public function delete_room(string $id_kamar) {

    }

    public function list_all_room() {
        
    }
}
