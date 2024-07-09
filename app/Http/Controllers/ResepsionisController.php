<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

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
    // public function update_kamar_status(Request $request, string $id_kamar) {
    //     if($request->off)
    //     Kamar::where('id_kamar', $id_kamar)->update(['status_kamar', 1]);
    // }

    public function check_in_room_booking(string $id_booking_room) {
        $data = DB::table('room_bookings')->where('id_booking_room', $id_booking_room)->first();
        $timeNow = Carbon::now()->toDateString();
        if ($timeNow != $data->check_in) {
            // dd($timeNow == $data->check_in);
            return redirect()->back()->withErrors('error', 'failed to post');
        }

        DB::table('room_bookings')->where('id_booking_room', $id_booking_room)->update(['status' => 'checked_in']);
        return redirect()->back()->with('status', 'sukses check in');
    }

    public function check_out_room_booking(string $id_booking_room) {
        $data = DB::table('room_bookings')->where('id_booking_room', $id_booking_room)->first();
        $timeNow = Carbon::now()->toDateString();
        if ($timeNow != $data->check_out) {
            // dd($data);
            return redirect()->back()->withErrors('error', 'failed to post');
        }

        DB::table('room_bookings')->where('id_booking_room', $id_booking_room)->update(['status' => 'checked_out']);
        return redirect()->back()->with('status', 'sukses check out');
    }

    public function set_room_active(string $id_kamar) {
        Kamar::where('id_kamar', $id_kamar)->update(['status_kamar' => 1]);

        return redirect("/resepsionis/dashboard/list_kamar_status")->with('status', 'berhasil update status kamar');
    }

    public function set_room_unactive(string $id_kamar) {
        Kamar::where('id_kamar', $id_kamar)->update(['status_kamar' => 0]);

        return redirect("/resepsionis/dashboard/list_kamar_status")->with('status', 'berhasil update status kamar');
    }

    public function update_id_room(Request $request, string $id_verifikasi) {
        // dd($request->all());
        $description = $request->description;
        $id_kamar = $request->id_kamar;

        $verified = $request->button;
        

        DB::table('room_bookings')->where('id_booking_room', $id_verifikasi)->update([
            'id_kamar' => $id_kamar,
            'catatan_verifikasi' => $description,
            'status' => $verified == 'accept' ? 'confirmed' : 'cancelled'
        ]);

        return redirect()->back()->with('status', 'sukses update data booking');
    }

    public function resepsionis_dashboard(Request $request, string $id_booking_room=null) {

        error_log('knt: ' . $request->fullUrl());
        $url = $request->fullUrl();
    
        $parsed_path_url = parse_url($url);
        $parsed_path_url = isset($parsed_path_url['path']) ? $parsed_path_url['path'] : '';
    
        $segments = explode('/', trim($parsed_path_url, '/'));

        // inisialisasi variabel

        $kamars = [];
        $booking_rooms = [];
        $book_verify = [];
        $kamar_options = [];
        $book_db = null;
        $beds = [];
        $rooms_tbl = [];
        $id_booking = null;
        $bookings = [];

        foreach ($segments as $index => $segment) {
            $result['segment' . ($index + 1)] = $segment;
        }

        if (in_array('calender', $result) && in_array('dashboard', $result)) {
            
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
            $book_verify = DB::table('room_bookings')->where('status', 'pending')->get();
        }

        else if (in_array($id_booking_room, $result) && in_array('detail_verifikasi', $result) && in_array('dashboard', $result)) {
            $segments = $request->segments();
            $id_booking = $request->segment(count($segments));
        
            $book_verify = DB::table('room_bookings')->where('id_booking_room', $id_booking)->first();
        
            if ($book_verify) {
                $kamars = Kamar::where('id_tipe_kamar', $book_verify->id_tipe_kamar)->where('status_kamar', 1)->get();

                $count_kamar = Kamar::where('id_tipe_kamar', $book_verify->id_tipe_kamar)->where('status_kamar', 1)->count();

                // dd($count_kamar);

                $kamarIds = $kamars->pluck('id_kamar')->toArray();

                // $otherBookings = DB::table('room_bookings')
                //     ->whereIn('id_kamar', $kamarIds)
                //     ->where('status', 'checked_in')
                //     // ->get();
                //     // ->whereBetween('check_in', [$book_verify->check_in, $book_verify->check_out])
                //     ->count();

                // foreach($otherBookings as $otherBooking) {
                //     DB::table('room_bookings')
                //         ->where('id_kamar', $otherBooking->id_kamar)
                //         ->whereBetween('check_in', [$book_verify->check_in, $book_verify->check_out]);
                //         // ->where('status', 'checked_in');
                // }

                $book = DB::table('room_bookings')
                    ->where('id_kamar', $kamarIds)
                    ->whereNotBetween('check_in', [$book_verify->check_in, $book_verify->check_out]);
                    // ->orWhereNotBetween('check_out', [$book_verify->check_in, $book_verify->check_out]);
                    // ->orWhere('check_out' > $book_verify->check_in)
                    // ->orWhere('check_out' < $book_verify->check_out);
                    
                // $count_book = $book->count();
                // $book_db = $book->get();

                $bookings = DB::select( 'SELECT * FROM room_bookings WHERE id_kamar IN ('.implode(',', $kamarIds).') AND (check_in NOT BETWEEN ? AND ?) AND (check_out NOT BETWEEN ? AND ?)', [$book_verify->check_in, $book_verify->check_out, $book_verify->check_in, $book_verify->check_out] );


                if ($count_kamar <= count($bookings)) {
                    // return error
                }
                
                // send ke view

                foreach ($bookings as $booking) {
                    array_push($beds, $booking->id_kamar);
                }

                $rooms_tbl = Kamar::whereIn('id_kamar', $beds)->get();

                // dd($rooms_tbl);
                // dd($otherBookings);
            } else {
                return redirect()->withErrors('error', 'error data');
            }
        }
        
        return view('resepsionis.dashboard', [
            'result' => $result,
            'kamars' => $kamars,
            // 'booking_rooms' => $booking_rooms,
            // 'book_verify' => $book_verify,
            'id_booking_room' => $id_booking_room,
            // 'booked_beds' => $book_db,
            'id_verifikasi' => $id_booking,
            'rooms' => $rooms_tbl,
            'bookings' => $bookings
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
