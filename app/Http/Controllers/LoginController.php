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
        $email_req = $request->email;
        $user = User::where('email', $email_req)->first();

            if ($user && Hash::check($request->password, $user->password)) {

                // $request->session()->put('user', $user);
                $email = $user->email;
                // $role = $user->role;
                $role_user = User::leftJoin("role_user", "users.email", "=", "role_user.email")->select('role_user.role_id', 'users.email')->where('users.email', strval($email))->get();

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

                if ($admin) {
                    return redirect()->route('admin.dashboard');
                }

                $roles_tb = Role::select('id', 'name')->where('id', '>=', 3)->get();
                error_log($roles_tb);

                if (count($roles) == 1 && in_array(1, $roles)) {
                    return redirect()->route('guest.dashboard');
                }

                foreach ($roles_tb as $role) {
                    if (in_array($role->id, $roles)) {
                        return redirect()->route($role->name . '.dashboard');
                    }
                }

                return redirect('login')->withErrors(['email' => 'no role assigned in this email']);
            } else {
                return redirect('login')->withErrors(['email' => 'Invalid email or password']);
            }
    }
}
