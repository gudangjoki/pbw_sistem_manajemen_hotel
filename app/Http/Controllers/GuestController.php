<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Helper {
    public static function getId() {
        // $id_tipe_kamar = [];
        $kamars = DB::table('kategori_kamar')->get(['id_tipe_kamar']);
        foreach ($kamars as $kamar) {
            $id_tipe_kamar[] = $kamar->id_tipe_kamar;
        }
        return $id_tipe_kamar;
    }    
}

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

    // public function user_feature() {
        // list kamar tersedia

    //     $rooms = Kamar::all();

    //     public function show_all_room() {
    //         $rooms = Kamar::all();
    
    //         return view("menu", [
    //             'rooms' => $rooms
    //         ]);
    //     }

    //     public function history_room_booking() {
    //         $rooms_booking = DB::table('room_bookings')->get();
    
    //         return view("menu", [
    //             'rooms_booking' => $rooms_booking
    //         ]);
    //     }


        // detail kamar
    // }

    public function show_feature(Request $request, $section) {
        error_log('knt: ' . $request->fullUrl());
        $url = $request->fullUrl();
    
        $parsed_path_url = parse_url($url);
        $parsed_path_url = isset($parsed_path_url['path']) ? $parsed_path_url['path'] : '';
    
        $segments = explode('/', trim($parsed_path_url, '/'));

        foreach ($segments as $index => $segment) {
            $result['segment' . ($index + 1)] = $segment;
        }
    
        $data_kamar_status = [];
        $id_tipe_kamar = [];
        $kategori = null;
        $ids = Helper::getId();

        // landing page
        if (in_array('home', $result)) {
        $data_kategori_kamar = DB::table('kategori_kamar')->get();
        
        // dd($data_kategori_kamar);

        // $data_kamar_status = [];
        foreach ($data_kategori_kamar as $kamar) {
            $idle_room = Kamar::where('id_tipe_kamar', $kamar->id_tipe_kamar)->where('status_kamar', 'available')->count();

            // if ($idle_room == 0) {
            //     $data_kategori_kamar[$kamar->id_tipe_kamar] = 1;
            // } else {
            //     $data_kategori_kamar[$kamar->id_tipe_kamar] = 0;
            // }
            $data_kamar_status[] = [
                'id_tipe_kamar' => $kamar->id_tipe_kamar,
                'nama_tipe_kamar' => $kamar->nama_tipe_kamar,
                'harga_kamar' => $kamar->harga_kamar,
                'cover' => $kamar->cover,
                'deskripsi' => $kamar->deskripsi,
                'idle_room' => $idle_room == 0 ? 1 : 0 // kalo 1 itu yes dia penuh, kalo 0 dia kosong
            ];

            $id_tipe_kamar[] = $kamar->id_tipe_kamar;
        }



        // dd($data_kamar_status);

        // return $data_kamar_status
        }

        else if (in_array(explode("_", $result['segment3'])[1], Helper::getId()) && in_array('dashboard', $result)) {
            // dd(Helper::getId());

            $param = explode("_", $result['segment3'])[1];

            $kategori = DB::table('kategori_kamar')->where('id_tipe_kamar', $param)->first();

            // dd($kategori);
        }

        
        return view('guest.dashboard', [
            'result' => $result,
            'tipe_kamars' => $data_kamar_status,
            'ids' => $ids,
            'detail' => $kategori,

            'id_tipe_kamar' => $id_tipe_kamar,
            // 'section' => $section,
            // 'books' => $books,
            // 'pinjam' => $pinjam,
            // 'users' => $users,
            // // 'users' => $uniqueUsers,
            // 'logs' => $logs,
            // 'categories' => $categories,
            // 'confirm' => $confirm,
            // 'reqs' => $reqs,
            // 'arrs' => $arr
            
        ]);
    }        
    
}
