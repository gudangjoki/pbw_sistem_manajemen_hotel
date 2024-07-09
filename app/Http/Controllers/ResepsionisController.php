<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Hall;
use App\Models\KategoriKamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function showStatusKamar()
    {
        return view('resepsionis.list_kamar_status');
    }
    public function showRuangan()
    {
        return view('resepsionis.list_ruangan');
    }
    // public function update_kamar_status(Request $request, string $id_kamar) {
    //     if($request->off)
    //     Kamar::where('id_kamar', $id_kamar)->update(['status_kamar', 1]);
    // }

    public function set_room_active(string $id_kamar) {
        Kamar::where('id_kamar', $id_kamar)->update(['status_kamar' => 1]);

        return redirect("/resepsionis/dashboard/list_kamar_status")->with('status', 'berhasil update status kamar');
    }

    public function set_room_unactive(string $id_kamar) {
        Kamar::where('id_kamar', $id_kamar)->update(['status_kamar' => 0]);

        return redirect("/resepsionis/dashboard/list_kamar_status")->with('status', 'berhasil update status kamar');
    }

    public function resepsionis_dashboard(Request $request) {

        error_log('knt: ' . $request->fullUrl());
        $url = $request->fullUrl();
    
        $parsed_path_url = parse_url($url);
        $parsed_path_url = isset($parsed_path_url['path']) ? $parsed_path_url['path'] : '';
    
        $segments = explode('/', trim($parsed_path_url, '/'));

        // inisialisasi variabel

        $kamars = [];
        $booking_rooms = [];
        $book_verify = [];
        $kategoriKamarGroups = [];
        $halls = [];
        $booking_halls = [];

        foreach ($segments as $index => $segment) {
            $result['segment' . ($index + 1)] = $segment;
        }
        

        if (in_array('calender', $result) && in_array('dashboard', $result)) {
            $halls = Hall::all();
            $booking_halls = DB::table('booking_hall')
                ->join('hall', 'booking_hall.id_hall', '=', 'hall.id')
                ->select('booking_hall.*', 'hall.*')
                ->get();
            $kamarQuery = DB::table('kategori_kamar')
                ->leftJoin('kamar', 'kategori_kamar.id_tipe_kamar', '=', 'kamar.id_tipe_kamar')
                ->select('kategori_kamar.nama_tipe_kamar', 'kamar.nomor_kamar', 'kamar.status_kamar')
                ->orderBy('kategori_kamar.id_tipe_kamar')
                ->orderBy('kamar.id_tipe_kamar')
                ->get();

            $booking_rooms = DB::table('room_bookings as rb')
                ->join('kamar as k', 'rb.id_kamar', '=', 'k.id_kamar')
                ->join('kategori_kamar as kk', 'k.id_tipe_kamar', '=', 'kk.id_tipe_kamar')
                ->select('rb.*', 'k.*', 'kk.*')
                ->get();

            // Mengatur data dalam format yang sesuai dengan tampilan HTML yang diminta
            foreach ($kamarQuery as $kamar) {
                $namaTipeKamar = $kamar->nama_tipe_kamar;
                $nomorKamar = $kamar->nomor_kamar;
                $statusKamar = $kamar->status_kamar;

                if (!isset($kategoriKamarGroups[$namaTipeKamar])) {
                    $kategoriKamarGroups[$namaTipeKamar] = [];
                }

                $kategoriKamarGroups[$namaTipeKamar][] = [
                    'nomor_kamar' => $nomorKamar,
                    'status' => $statusKamar,
                ];
            }
        }
        else if (in_array('list_ruangan', $result) && in_array('dashboard', $result)) {
            $halls = Hall::all();
        }
        // poin 2
        else if (in_array('list_konfirmasi', $result) && in_array('dashboard', $result)) {
            $booking_rooms = DB::table('room_bookings')->whereNot('status', 'cancelled')->whereNot('status', 'pending')->get();
        }

        // poin 3
        else if (in_array('list_kamar_status', $result) && in_array('dashboard', $result)) {

            $kamars = Kamar::all();
        }

        // poin 7
        else if (in_array('list_verifikasi', $result) && in_array('dashboard', $result)) {
            $book_verify = DB::table('room_bookings')->where('status', 'pending')->where('status', 'confirmed')->get();
        }

        return view('resepsionis.dashboard', [
            'result' => $result,
            'kamars' => $kamars,
            'booking_rooms' => $booking_rooms,
            'book_verify' => $book_verify,
            'kategoriKamarGroups' => $kategoriKamarGroups,
            'halls' => $halls,
            'booking_halls' => $booking_halls,
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
