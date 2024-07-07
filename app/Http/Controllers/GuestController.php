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
    
        $books = [];
    
        // if (in_array('buku', $result)) {

        // }


        // if (in_array('denda', $result)) {
        //     $currTimeSec = Carbon::now()->timestamp;
        
        //     $dateDay = Carbon::now()->addDays(3)->timestamp;
        
        //     $distinctUsernames = RentLog::whereNull('actual_return_date')
        //         ->distinct()
        //         ->pluck('username');
        
        //     $forfeitIds = [];
        
        //     foreach ($distinctUsernames as $username) {
        //         $logs = RentLog::where('username', $username)
        //             ->whereNull('actual_return_date')
        //             ->get(['id']);
                
        //         foreach ($logs as $log) {
        //             $forfeitIds[] = $log->id;
        //         }
        //     }
        
        //     $users = RentLog::leftJoin('users', 'rent_logs.username', '=', 'users.username')
        //         ->whereIn('users.username', $distinctUsernames)
        //         ->whereNotNull('rent_logs.rent_date')
        //         ->whereNotNull('rent_logs.return_date')
        //         ->distinct('users.username')
        //         ->get(['users.username', 'users.phone']);
            
        //     $arr = [];
        //     foreach ($users as $user) {
        //         foreach ($forfeitIds as $id) {
        //             $rentLog = RentLog::where('id', $id)
        //                 ->where('username', $user->username)
        //                 ->whereNotNull('rent_date')
        //                 ->whereNotNull('return_date')
        //                 ->where('return_date', '<', Carbon::now()->toDateTimeString())
        //                 ->first();
                    
        //             if ($rentLog) {
        //                 if (!isset($arr[$user->username])) {
        //                     $arr[$user->username] = [];
        //                 }
        //                 $book_code = $rentLog->book_code;
        //                 // join rentlog dan book get id dan data buku
        //                 $book = Book::where('book_code', $book_code)->get();
        //                 if (!in_array($book, $arr[$user->username])) {
        //                     $arr[$user->username][] = $book;
        //                 }
        //             }
        //         }
        //     }

        //     $uniqueUsers = [];
        //     foreach ($users as $user) {
        //         if (!isset($uniqueUsers[$user->username])) {
        //             $uniqueUsers[$user->username] = $user;
        //         }
        //     }
        
        //     $categories = Category::all();
        // }
        
        return view('guest.dashboard', [
            'result' => $result,
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
