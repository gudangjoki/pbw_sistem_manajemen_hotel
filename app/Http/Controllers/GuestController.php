<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class Helper {
    public static function getId() {
        // $id_tipe_kamar = [];
        $kamars = DB::table('kategori_kamar')->get(['id_tipe_kamar']);
        foreach ($kamars as $kamar) {
            $id_tipe_kamar[] = $kamar->id_tipe_kamar;
        }
        return $id_tipe_kamar;
    }

    public static function generateVA() {
        // Generate the first digit (1-9) to ensure it's not zero
        $firstDigit = mt_rand(1, 9);
        
        // Generate the remaining 5 digits (0-9)
        $remainingDigits = mt_rand(10000, 99999);
        
        // Combine the first digit with the remaining 5 digits
        $randomNumber = $firstDigit . str_pad($remainingDigits, 5, '0', STR_PAD_LEFT);
        
        // Convert to string
        $randomString = strval($randomNumber);
        
        return $randomString;
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

    public function send_to_payment(Request $request) {
        // dd($request->all());
        // dd(Cache::get('status_data'));
        $date_request = $request->all();
    
        $data_cache = Cache::get('status_data');
    
        if ($data_cache && $data_cache['check_in'] == $date_request['check_in'] && $data_cache['check_out'] == $date_request['check_out']) {
            return redirect('/guest/dashboard/pembayaran');
        } else {
            Cache::put('status_data', $date_request, now()->addMinutes(60));
            
            return redirect('/guest/dashboard/pembayaran')->with('status', json_encode($date_request));
        }
    }

    public function create_pay_booking(Request $request) {
        $data_cache = Cache::get('status_data');
        $user = $request->session()->get('user');

        // dd($data_cache);

        if (!$user) {
            return redirect('/login')->withErrors('error', 'silahkan login terlebih dahulu');
        }

        if (!$data_cache) {
            return redirect('/guest/dashboard/home')->withErrors('error', 'virtual account sudah kedaluarsa, silahkan pilih ulang kamar');
        }

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $coverFilePath = 'covers/' . time() . '_' . $cover->getClientOriginalName();
            $cover->move(public_path('covers'), $coverFilePath);

            $uuid = Str::uuid()->toString();
            
            $check_in_date = Carbon::createFromFormat('m/d/Y', $data_cache['check_in'])->format('Y-m-d');
            $check_out_date = Carbon::createFromFormat('m/d/Y', $data_cache['check_out'])->format('Y-m-d');

            $booking_room = DB::table('room_bookings')->insert([
                'id_booking_room' => $uuid,
                'username' => $user['username'],
                // 'id_kamar' => $data_cache['id'],
                'id_tipe_kamar' => $data_cache['id'],
                'status' => 'pending',
                'harga_kamar' => $data_cache['harga'],
                'check_in' => $check_in_date,
                'check_out' => $check_out_date,
                'virtual_account' => $data_cache['virtual_account'],
                'foto_bukti_bayar' => $coverFilePath,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            if (!$booking_room) {
                return redirect()->back()->withErrors('error', 'service error');
            }

            return redirect('/guest/dashboard/home')->with('status', 'sukses melakukan booking, silahkan menunggu resepsionis untuk memverifikasi pesanan anda');
        }
    }

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
        $status = null;
        $va = null;

        // landing page
        if (in_array('home', $result) && in_array('dashboard', $result)) {
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

        else if (in_array('pembayaran', $result) && in_array('dashboard', $result)) {

            if (Cache::has('status_data')) {

                $status = Cache::get('status_data');
            } else {
                return redirect()->back()->withErrors(['error' => 'silahkan booking tanggal kamar terlebih dahulu']);
            }
        }

        else if (in_array('history', $result) && in_array('dashboard', $result)) {
            
        }

        else if (($result['segment3']) !== null && in_array(array_key_exists(1, explode("_", $result['segment3'])) ? explode("_", $result['segment3'])[1] : "", $ids) && in_array('dashboard', $result)) {
            // dd(Helper::getId());
            // dd($result['segment3'])[1];

            $param = explode("_", $result['segment3'])[1];

            $kategori = DB::table('kategori_kamar')->where('id_tipe_kamar', $param)->first();

            $va = Helper::generateVA();
            

            // dd($kategori);
        }

        
        return view('guest.dashboard', [
            'result' => $result,
            'tipe_kamars' => $data_kamar_status,
            'ids' => $ids,
            'va' => $va,
            'detail' => $kategori,
            'status' => $status,
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
