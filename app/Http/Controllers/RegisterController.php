<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index() {
        return view('register');
    }

    public function register(Request $request)
    {

        DB::beginTransaction();
        
        try {
            $validate = $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users',
                'password' => 'required|string',
            ]);
        
            $new_user = new User;
            $new_user->name = $validate['name'];
            $new_user->username  = $validate['username'];
            $new_user->password = bcrypt($validate['password']);
            $new_user->save();
    
            // DB::table('role_user')->insert([
            //     'email' => $new_user->email,
            //     'role_id' => 1,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ]);
            $new_user->roles()->attach([1]);
            DB::commit();

            return redirect('register')->with('status', 'Your account has been created');

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to register user', 'message' => $e->getMessage()], 500);
        }

    
    }
}
