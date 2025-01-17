<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function login(Request $request) {
        $username = $request->username;
        $user = User::where('username', $username)->first();

            if ($user && Hash::check($request->password, $user->password)) {

                // $request->session()->put('user', $user);
                $username = $user->username;
                // $role = $user->role;
                $role_user = User::leftJoin("role_user", "users.username", "=", "role_user.username")->select('role_user.role_id', 'users.username')->where('users.username', $username)->get();

                error_log($role_user);
                // $role = $role_user->role_id;

                $admin = false;
                $roles = [];
                
                foreach ( $role_user as $user ) {
                    if ( $user->role_id == 2 ) {
                        $admin = true;
                        break;
                    }

                    array_push($roles, $user->role_id);
                    
                }

                $request->session()->put('user', [
                    'username' => $username,
                    'role_id' => $roles // bug perlu roles banyak
                ]);

                if ($admin) {
                    return redirect()->route('admin.dashboard');
                }

                $roles_tb = Role::select('id', 'name')->where('id', '>=', 3)->get();
                error_log($roles_tb);

                if (count($roles) == 1 && in_array(1, $roles)) {
                    // dd($request->session()->get('user'));

                    return redirect('/guest/dashboard/home');
                }

                foreach ($roles_tb as $role) {
                    if (in_array($role->id, $roles)) {
                        return redirect()->route($role->name . '.dashboard');
                    }
                }

                return redirect('login')->withErrors(['username' => 'no role assigned in this username']);
            } else {
                return redirect('login')->withErrors(['username' => 'Invalid username or password']);
            }
    }
}
